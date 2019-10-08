<?php

namespace App\Services\Sistema;

use App\Services\NewBaseService;
use App\Repositories\Interfaces\Sistema\PermissaoRepositoryInterface;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Permissao
 * 
 * @author Cassio
 */
class PermissaoService extends NewBaseService
{

    /**
     * Inicializa a referência ao Repository
     */
    protected $repository;
	public function __construct(PermissaoRepositoryInterface $repository)
	{
        $this->repository = $repository;
        // parent::__construct( $repository );
    }
    
}