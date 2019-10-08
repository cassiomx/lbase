<?php

namespace App\Services\Sistema;
use App\Repositories\Interfaces\Sistema\AcaoRepositoryInterface;
use App\Repositories\Interfaces\Sistema\SubModuloRepositoryInterface;
use App\Services\NewBaseService;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Cassio
 */
class AcaoService extends NewBaseService
{

    /**
     * Inicializa a referência ao Repository
     */
    protected $repository;
    protected $submodulo;
	public function __construct(AcaoRepositoryInterface $repository, SubModuloRepositoryInterface $submodulo)
	{
        // parent::__construct( $repository );
        $this->repository = $repository;
        $this->submodulo = $submodulo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return [
            'submodulo' => $this->submodulo->pluck('nome','id'),
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
            'submodulo' => $this->submodulo->pluck('nome','id'),
            'result' => $this->repository->findById($id),
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }
    
}