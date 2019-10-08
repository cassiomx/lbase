<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\NewBaseController;
use App\Services\Sistema\AcaoService;
use App\Validators\Sistema\AcaoValidator;

use Illuminate\Http\Request;

/**
 * Classe para operações da camada de Controller em Usuários
 * 
 * @author Cassio
 */
class AcaoController extends NewBaseController
{
    protected $validator;

    /**
     * Cria uma instância do controller e inicializa as referências necessárias
     * Inicializa todos os valores a serem compartilhados entre todas as controllers e views 
     *
     * @author Cassio
     * @return void
     */
    public function __construct(AcaoService $service)
    {
        $this->validator = new AcaoValidator();
        parent::__construct( $service );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $view = 'pages.sistema.acoes.index')
    {
        return parent::index($request, $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($view = 'pages.sistema.acoes.create')
    {
        return parent::create($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $route = 'sistema.acoes.index')
    {
        $validData = $this->validator->store( $request );
        return parent::store($request, $route);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $view = 'pages.sistema.acoes.show')
    {
        return parent::show($id, $view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $view = 'pages.sistema.acoes.edit')
    {
        return parent::edit($id, $view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $route = 'sistema.acoes.index')
    {
        $validData = $this->validator->update( $request );
        return parent::update($request, $id, $route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $route = 'sistema.acoes.index')
    {
        return parent::destroy($id, $route);
    }
}
