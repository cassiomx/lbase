<?php

namespace App\Services\Dashboard;

use App\Services\BaseService;
use App\Repositories\Dashboard\DashboardRepository;
use Illuminate\Http\Request;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Cassio
 */
class DashboardService extends BaseService
{
    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(DashboardRepository $repository)
	{
        parent::__construct( $repository );
    }
    
}