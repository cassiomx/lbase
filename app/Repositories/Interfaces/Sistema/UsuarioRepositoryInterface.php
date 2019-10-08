<?php

namespace App\Repositories\Interfaces\Sistema;

Interface UsuarioRepositoryInterface
{
    public function store($request);
    public function update($id,$request);
}