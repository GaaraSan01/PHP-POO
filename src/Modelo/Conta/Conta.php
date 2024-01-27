<?php

namespace Alura\Banco\Modelo\Conta;

abstract class Conta{
    public readonly Titular $titular;
    protected float $saldo = 0;
    private static int $numeroContas = 0;

    public function __construct(Titular $titular){
        $this -> titular = $titular;
        self::$numeroContas++;
    }

    public function __destruct(){
        self::$numeroContas--;
    }

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

    public function recuperaSaldo(): float {
        return $this -> saldo;
    }

    public function recuperaNomeTitular(): string {
        return $this -> titular -> recuperaNome();
    }

    public function recuperaCpfTitular(): int {
        return $this -> titular -> recuperaCpf();
    }

    public static function recuperaNumeroDeContas(): int {
        return self::$numeroContas;
    }

    abstract protected function percentualTarifa(): float;
}