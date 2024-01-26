<?php

require_once 'Titular.php';

class Conta{
    public readonly Titular $titular;
    private float $saldo = 0;
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

    public function getExtrato(): float {
        return $this -> saldo;
    }

    public static function getContas(): int {
        return self::$numeroContas;
    }
}