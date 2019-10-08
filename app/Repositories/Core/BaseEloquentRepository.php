<?php

namespace App\Repositories\Core;

use App\Log\LogEngine;
use App\Repositories\Exceptions\NoEntityDefined;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\Facades\Auth;

Class BaseEloquentRepository implements RepositoryInterface
{
    protected $entity; // objeto referência a camada de Model
    protected $log; // objeto referência a camada de Log

    public function __construct() {
        $this->entity = $this->resolveEntity();
        $this->log = new LogEngine();
    }
    public function getAll()
    {
        return $this->entity->all();
    }
    public function findById($id)
    {
        return $this->entity->find($id);
    }
    public function findWhere($column,$valor)
    {
        return $this->entity->where($column,$valor)->get();
    }
    public function findWhereFirst($column,$valor)
    {
        return $this->entity->where($column,$valor)->first();
    }
    public function pluck($field,$valor)
    {
        return $this->entity->pluck($field,$valor);
    }
    public function paginate($totalPage = 10)
    {
        return $this->entity->paginate($totalPage);
    }
    public function store(array $data)
    {
        $registro = $this->entity->create($data);
        $this->log->registro([
            'tabela'        => $this->entity->getTable(),
            'operacao'      => 'create',
            'dado_anterior' => '',
            'dado_posterior'=> collect($data)->toJson(),
            'chave'         => $registro->id,
            'usuario'       => Auth::user()->id
        ]);
        return $registro;

    }
    public function update($id,array $data)
    {
        //$entity = $this->findById($id);
        //return $entity->update($data);


        $registro = $this->findById( $id );
        $dados_anterior = $registro->toJson();
        $registro->update( $data );
        $dados_posterior = $registro->toJson();
        $this->log->registro([
            'tabela'        => $this->entity->getTable(),
            'operacao'      => 'update',
            'dado_anterior' => $dados_anterior,
            'dado_posterior'=> $dados_posterior,
            'chave'         => $registro->id,
            'usuario'       => Auth::user()->id
        ]);
        return $registro;


    }
    public function delete($id, $permanent = false)
    {
        $registro = $this->findById($id);
        $registro->delete();
        $dados_anterior = $registro->toJson();
        $this->log->registro([
            'tabela'        => $this->entity->getTable(),
            'operacao'      => 'delete',
            'dado_anterior' => $dados_anterior,
            'dado_posterior'=> '',
            'chave'         => $registro->id,
            'usuario'       => Auth::user()->id
        ]);
        return ($permanent) ? $registro->forceDelete() : $registro->delete() ;

    }
    public function orderBy($column,$order = 'DESC')
    {
        $this->entity = $this->entity->orderBy($column,$order);
        return $this;
    }
    public function relationships(...$relationships)
    {
        $this->entity = $this->entity->with($relationships);
        return $this;
    }

    public function softDelete()
    {
        $this->entity = $this->entity->withTrashed();
        return $this;
    }
    public function resolveEntity()
    {
        if(!method_exists($this, 'entity')){
            throw new NoEntityDefined;
        }

        return app($this->entity());
    }
}