<?php

namespace App\Repositories\Core\Eloquent\Sistema;

use App\Models\Sistema\User;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\Sistema\UsuarioRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
Class EloquentUsuarioRepository extends BaseEloquentRepository implements UsuarioRepositoryInterface
{
    public function entity()
    {
        return User::class;
    }

    public function store($request)
    {
        // dd($request);
        $registro = $this->entity->create( $request );
        $registro->roles()->sync( $request['role_id'] );
        return $registro;
    }

    public function update($id,$request )
    {
        if( !empty( $request['password'] ) ){
            $request['password'] = Hash::make( $request['password'] );
        }else{
            $model = parent::findById( $id );
            $request['password'] = $model->password;
        }
        $registro = parent::update( $id, $request );
        $registro->roles()->sync([]);
        $registro->roles()->sync( $request['role_id'] );
        return $registro;
    }

    public function perfil_update( $request, $id )
    {
        $registro = parent::findById( $id );

        if( !empty( $request['password'] ) ){
            $request['password'] = Hash::make( $request['password'] );
        }else{
            $request['password'] = $registro->password;
        }
        
        $dados_anterior = $registro->toJson();
        $registro->update( $request );
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
}