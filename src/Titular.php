<?php

require_once 'Cpf.php';

class Titular{

    public readonly string $nome;
    public readonly CPF $cpf;

    public function __construct(string $nome, Cpf $cpf)
    {
        $this -> validaNomeTitular($nome);
        $this -> nome = $nome;
        $this -> cpf = $cpf;
    }

    private function validaNomeTitular(string $nomeTitular): void {
        if(strlen($nomeTitular) < 5){
            echo "Nome inválido";
            exit();
        }
    }
}