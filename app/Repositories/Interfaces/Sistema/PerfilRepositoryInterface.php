<?php

namespace App\Repositories\Interfaces\Sistema;

Interface PerfilRepositoryInterface
{
    public function store( $request );

    public function update($id,$request);
}