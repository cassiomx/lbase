<?php

namespace App\Repositories\Core\Eloquent\Sistema;

use App\Models\Sistema\Permission;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\Sistema\PermissaoRepositoryInterface;

Class EloquentPermissaoRepository extends BaseEloquentRepository implements PermissaoRepositoryInterface
{
    public function entity()
    {
        return Permission::class;
    }
}