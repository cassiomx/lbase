<?php

namespace App\Services\Sistema;

use App\Services\NewBaseService;
use App\Repositories\Interfaces\Sistema\UsuarioRepositoryInterface;
use App\Repositories\Interfaces\Sistema\PerfilRepositoryInterface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Cassio
 */
class UsuariosService extends NewBaseService
{
    /**
     * Inicializa a referência ao Repository
     */
    protected $repository;
    protected $perfil;
	public function __construct(UsuarioRepositoryInterface $repository, PerfilRepositoryInterface $perfil)
	{
        $this->repository = $repository;
        $this->perfil = $perfil;
        //parent::__construct( $repository );
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return [
            'perfil' => $this->perfil->pluck('name','id'),
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Recebe dados a serem salvos como novo registro
     * Altera os dados recebidos conforme necessário
     * Envia dados ao parent
     * Retorna resultado ao controller
     *
     * @param Array $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store( $request )
    {
        $request['password'] = Hash::make( $request['password'] );
        return parent::store( $request );
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
            'perfil' => $this->perfil->pluck('name','id'),
            'result' => $this->repository->findById($id),
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }

    public function perfil_update( $request, $id )
    {
        return [
            'result' => $this->repository->perfil_update( $request, $id )
        ];
    }
    
}