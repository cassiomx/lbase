<?php

namespace App\Repositories\Core\Eloquent\Sistema;

use App\Models\Sistema\Role;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\Sistema\PerfilRepositoryInterface;

Class EloquentPerfilRepository extends BaseEloquentRepository implements PerfilRepositoryInterface
{
    public function entity()
    {
        return Role::class;
    }

    public function store($request)
    {
        // dd($request);
        $registro = $this->entity->create( $request );
        $registro->attachPermissions( $request['permission_id'] );
        return $registro;
    }

    public function update($id,$request )
    {
        $registro = parent::update( $id, $request );
        $registro->perms()->sync([]);
        $registro->attachPermissions( $request['permission_id'] );
        return $registro;
    }
}