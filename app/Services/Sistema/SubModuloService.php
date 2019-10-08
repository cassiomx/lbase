<?php

namespace App\Services\Sistema;

use App\Repositories\Interfaces\Sistema\ModuloRepositoryInterface;
use App\Repositories\Interfaces\Sistema\SubModuloRepositoryInterface;
use App\Services\NewBaseService;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Cassio
 */
class SubModuloService extends NewBaseService
{

    /**
     * Inicializa a referência ao Repository
     */
    protected $repository;
    protected $modulo;
	public function __construct(SubModuloRepositoryInterface $repository, ModuloRepositoryInterface $modulo)
	{
        //parent::__construct( $repository );
        $this->repository = $repository;
        $this->modulo = $modulo;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return [
            'modulo' => $this->modulo->pluck('nome','id'),
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        // $data = $this->repository->edit( $id );
        return [
            'modulo' => $this->modulo->pluck('nome','id'),
            'result' => $this->repository->findById($id),
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }
    
}