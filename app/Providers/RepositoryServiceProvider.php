<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Repositories\Core\Eloquent\Sistema\{
    EloquentModuloRepository,
    EloquentSubModuloRepository,
    EloquentAcaoRepository,
    EloquentPermissaoRepository,
    EloquentPerfilRepository,
    EloquentUsuarioRepository
};

use App\Repositories\Interfaces\Sistema\{
    ModuloRepositoryInterface,
    SubModuloRepositoryInterface,
    AcaoRepositoryInterface,
    PermissaoRepositoryInterface,
    PerfilRepositoryInterface,
    UsuarioRepositoryInterface
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            ModuloRepositoryInterface::class,
            EloquentModuloRepository::class
        );
        $this->app->bind(
            SubModuloRepositoryInterface::class,
            EloquentSubModuloRepository::class
        );
        $this->app->bind(
            AcaoRepositoryInterface::class,
            EloquentAcaoRepository::class
        );
        $this->app->bind(
            PermissaoRepositoryInterface::class,
            EloquentPermissaoRepository::class
        );
        $this->app->bind(
            PerfilRepositoryInterface::class,
            EloquentPerfilRepository::class
        );
        $this->app->bind(
            UsuarioRepositoryInterface::class,
            EloquentUsuarioRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
    }
}
