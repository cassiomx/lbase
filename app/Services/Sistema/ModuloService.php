<?php

namespace App\Services\Sistema;

use App\Services\BaseService;
use App\Services\NewBaseService;
use Illuminate\Support\Facades\Route;
use App\Repositories\Interfaces\Sistema\ModuloRepositoryInterface;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Cassio
 */
class ModuloService extends NewBaseService
{
    private $cores;
    private $temas;
    protected $repository;
    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(ModuloRepositoryInterface $repository)
	{
        $this->cores = [
            'blue'      => 'Azul',
            'indigo'    => 'Azul Anil',
            'blue-grey' => 'Cinza',
            'orange'    => 'Laranja',
            'purple'    => 'Magenta',
            'brown'     => 'Marrom',
            'cyan'      => 'Turquesa',
            'green'     => 'Verde',
            'teal'      => 'Verde Azulado',
            'red'       => 'Vermelho'
        ];
        $this->temas = [
            'blue'      => 'Azul',
            'indigo'    => 'Azul Anil',
            'blue-grey' => 'Cinza',
            'orange'    => 'Laranja',
            'purple'    => 'Magenta',
            'brown'     => 'Marrom',
            'cyan'      => 'Turquesa',
            'green'     => 'Verde',
            'teal'      => 'Verde Azulado',
            'red'       => 'Vermelho'
        ];
        $this->repository = $repository;
        //parent::__construct($this->repository);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return [
            'cores' => $this->cores,
            'route' => ( $this->prefix( Route::currentRouteName() ) ),
            'temas' => $this->temas
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
            'cores' => $this->cores,
            'result' => $this->repository->findById( $id ),
            'route' => ( $this->prefix( Route::currentRouteName() ) ),
            'temas' => $this->temas
        ];
    }
    
}