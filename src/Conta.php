<?php

class Conta{
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo = 0;

    public function sacar(float $valorSacar): void{
        if($this -> saldo < $valorSacar){
            echo 'Saldo indisponivel';
            return;
        } 

        $this -> saldo -= $valorSacar;
    }

    public function depositar (float $valorDepositar): void{
        if ($valorDepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this -> saldo += $valorDepositar;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void {
        if($valorATransferir > $this -> saldo){
            echo "Saldo indisponivel";
            return;
        } 

        $this -> sacar($valorATransferir);
        $contaDestino -> depositar($valorATransferir);
    }

    public function setNomeTitular(string $nome): void {
        $this -> nomeTitular = $nome;
    }

    public function setCpfTitular(string $cpf): void {
        $this -> cpfTitular = $cpf;
    }

    public function getNomeTitular(): string {
        return $this -> nomeTitular;
    }

    public function getCpfTitular(): string {
        return $this -> cpfTitular;
    }

    public function getExtrato(): float {
        return $this -> saldo;
    }
}