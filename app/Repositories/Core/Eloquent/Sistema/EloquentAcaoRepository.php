<?php

namespace App\Repositories\Core\Eloquent\Sistema;

use App\Models\Sistema\Acao;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\Sistema\AcaoRepositoryInterface;

Class EloquentAcaoRepository extends BaseEloquentRepository implements AcaoRepositoryInterface
{
    public function entity()
    {
        return Acao::class;
    }
}