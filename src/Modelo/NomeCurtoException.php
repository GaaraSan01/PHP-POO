<?php

namespace Alura\Banco\Modelo;

use DomainException;

class NomeCurtoException extends DomainException
{
    public function __construct(string $nome)
    {
        $mensagem = "O nome $nome contém menos de 5 caracteres.";
        parent::__construct($mensagem);
    }
}