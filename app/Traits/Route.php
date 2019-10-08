<?php

namespace App\Traits;

/**
 * Trait para tratar rotas
 * 
 * @author Cassio
 */
trait Route
{

    /**
     * Formata uma dada rota e retorna o prefixo
     */
    protected function prefix( $rota ){
        $rota = explode( '.', $rota );
        array_pop($rota);
        return implode( '.', $rota );
    }
}