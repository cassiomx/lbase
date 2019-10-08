<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Rotas de Login
 */
Route::get('/', function () {
    return view('auth.login');
})->name('inicial');
Auth::routes();

/**
 * Rotas que necessitam de autenticação
 */
Route::middleware(['auth','access'])->group(function(){
    /** Módulo Dashboard */
    Route::name('dashboard.')->group(function(){
        Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('index'); // tela inicial
    });
    /** Módulo Sistema */
    Route::name('sistema.')->group(function(){
        Route::get('/sistema', 'Sistema\SistemaController')->name('index'); // tela inicial
        Route::resource('/acoes', 'Sistema\AcaoController'); // acoes
        Route::resource('/modulos', 'Sistema\ModuloController'); // modulos
        Route::resource('/perfis', 'Sistema\PerfilController'); // perfis
        Route::resource('/permissoes', 'Sistema\PermissaoController'); // permissoes
        Route::resource('/submodulos', 'Sistema\SubModuloController'); // sub-modulos
        Route::resource('/usuarios', 'Sistema\UsuarioController'); // usuários
        Route::get('/perfil', 'Sistema\UsuarioController@perfil')->name('perfil.usuario'); // Perfil do Usuário
        Route::match(['put', 'patch'], '/perfil/{usuario}', 'Sistema\UsuarioController@perfil_update')->name('perfil.update'); // Atualizar Perfil
        Route::match(['post','patch'],'/assinatura/assinar', 'Sistema\AssinaturaController@assinar')->name('assinatura.assinar'); // Assinaturas
    });
});