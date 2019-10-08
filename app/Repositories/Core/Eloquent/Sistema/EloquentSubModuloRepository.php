<?php

namespace App\Repositories\Core\Eloquent\Sistema;

use App\Models\Sistema\SubModulo;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\Sistema\SubModuloRepositoryInterface;

Class EloquentSubModuloRepository extends BaseEloquentRepository implements SubModuloRepositoryInterface
{
    public function entity()
    {
        return SubModulo::class;
    }
}