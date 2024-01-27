<?php

namespace Alura\Banco\Modelo;


final class CPF {
    public readonly string $cpf;

    public function __construct(string $cpf)
    {
        $this -> validaCpf($cpf);
        $this -> cpf = $cpf;
    }


    private function validaCpf(string $numero): void {
        $numero = filter_var($numero, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($numero === false) {
            echo "Cpf inválido";
            exit();
        }
    }
}