<?php

class CPF {
    public readonly string $cpf;

    public function __construct(string $cpf)
    {
        $this -> validaCpf($cpf);
        $this -> cpf = $cpf;
    }


    private function validaCpf(string $cpf): void {
        if(strlen($cpf) < 11){
            echo "CPF inválido";
            exit();
        }
    }
}