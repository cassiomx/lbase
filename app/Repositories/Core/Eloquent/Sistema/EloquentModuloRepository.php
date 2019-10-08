<?php

namespace App\Repositories\Core\Eloquent\Sistema;

use App\Models\Sistema\Modulo;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\Sistema\ModuloRepositoryInterface;

Class EloquentModuloRepository extends BaseEloquentRepository implements ModuloRepositoryInterface
{
    public function entity()
    {
        return Modulo::class;
    }
}