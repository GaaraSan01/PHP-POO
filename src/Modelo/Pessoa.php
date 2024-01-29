<?php 

namespace Alura\Banco\Modelo;

abstract class Pessoa {
    protected string $nome;
    private $cpf;

    use AcessoPropriedades;

    public function __construct(string $nome, CPF $cpf)
    {
        $this -> validaNome($nome);
        $this -> nome = $nome;
        $this -> cpf = $cpf;
    }

    public function recuperaNome(): string {
        return $this -> nome;
    }

    public function recuperaCpf(): string {
        return $this -> cpf -> cpf;
    }

    final protected function validaNome(string $nomeTitular): void
    {
        if(strlen($nomeTitular) < 5){
            throw new NomeCurtoException($nomeTitular);
        }
    }
}