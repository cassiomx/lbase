<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\NewBaseController;
use App\Services\Sistema\UsuariosService;
use App\Validators\Sistema\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/**
 * Classe para operações da camada de Controller em Usuários
 * 
 * @author Cassio
 */
class UsuarioController extends NewBaseController
{
    protected $validator;

    /**
     * Cria uma instância do controller e inicializa as referências necessárias
     * Inicializa todos os valores a serem compartilhados entre todas as controllers e views 
     *
     * @author Cassio
     * @return void
     */
    public function __construct(UsuariosService $service)
    {
        $this->validator = new UserValidator();
        parent::__construct( $service );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $view = 'pages.sistema.usuarios.index')
    {
        return parent::index($request, $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($view = 'pages.sistema.usuarios.create')
    {
        return parent::create($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $route = 'sistema.usuarios.index')
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
    public function show($id, $view = 'pages.sistema.usuarios.show')
    {
        return parent::show($id, $view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $view = 'pages.sistema.usuarios.edit')
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
    public function update(Request $request, $id, $route = 'sistema.usuarios.index')
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
    public function destroy($id, $route = 'sistema.usuarios.index')
    {
        return parent::destroy($id, $route);
    }

    public function perfil()
    {
        return view('pages.sistema.usuarios.perfil', ['result' => Auth::user()]);
    }

    public function perfil_update(Request $request, $id, $route = 'dashboard.index')
    {
        $validData = $this->validator->perfil_update( $request );
        if( Route::has( $route ) ){
            $data = $this->service->perfil_update( $request->all(), $id );
            return redirect()->route( $route )->with('success','Seu perfil foi atualizado.');
        }else{
            abort(404);
        }
        return parent::perfil_update($request, $id, $route);
    }
}
