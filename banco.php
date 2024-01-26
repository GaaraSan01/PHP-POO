<?php

require_once './src/Conta.php';
require_once './src/Titular.php';
require_once './src/Cpf.php';


$viniciusCpf = new CPF('123.123.321-12');
$vinicius = new Titular("Vinicius H", $viniciusCpf);

$conta01 = new Conta($vinicius);
$conta01 -> depositar(2000);

// echo $conta01 -> titular -> nome . PHP_EOL;
// echo $conta01 -> titular -> cpf -> cpf . PHP_EOL;
// echo $conta01 -> getExtrato() . PHP_EOL;

var_dump($conta01);

echo Conta::getContas();