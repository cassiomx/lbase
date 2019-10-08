<?php

namespace App\Repositories\Interfaces;

Interface RepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function findWhere($column,$valor);
    public function findWhereFirst($column,$valor);
    public function pluck($field,$valor);
    public function paginate($totalPage = 10);
    public function store(array $data);
    public function update($id,array $data);
    public function delete($id);
    public function orderBy($column,$order="DESC");
}