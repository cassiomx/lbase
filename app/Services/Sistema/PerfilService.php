<?php

namespace App\Services\Sistema;

use App\Services\NewBaseService;
use App\Repositories\Interfaces\Sistema\PerfilRepositoryInterface;
use App\Repositories\Interfaces\Sistema\PermissaoRepositoryInterface;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Perfil
 * 
 * @author Cassio
 */
class PerfilService extends NewBaseService
{

    /**
     * Inicializa a referência ao Repository
     */

    protected $repository;
    protected $permissao;
	public function __construct(PerfilRepositoryInterface $repository, PermissaoRepositoryInterface $permissao)
	{
        $this->repository = $repository;
        $this->permissao = $permissao;
        // parent::__construct( $repository );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = $this->repository->create();
        return [
            'permissao' => $this->permissao->pluck('name','id'),
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
        
        return [
            'permissao' => $this->permissao->pluck('name','id'),
            'result' => $this->repository->findById($id),
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }
    
}