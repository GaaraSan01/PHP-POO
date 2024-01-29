<?php

namespace Alura\Banco\Modelo\Conta;

use InvalidArgumentException;

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
        $tarifaSaque = $valorSacar * $this -> percentualTarifa();
        $valorSacar = $valorSacar + $tarifaSaque;

        if($this -> saldo < $valorSacar){
            throw new SaldoInsuficienteException($valorSacar, $this -> saldo);
        } 

        $this -> saldo -= $valorSacar;
    }

    public function depositar (float $valorDepositar): void{
        if ($valorDepositar < 0) {
            throw new InvalidArgumentException();
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