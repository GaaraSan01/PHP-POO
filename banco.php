<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\{Endereco, CPF};
use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\{ContaCorrente, ContaPoupanca};

$viniciushEndereco = new Endereco("Curitiba", "Boqueirão", "Rua Teste", "123");

$cidade = $viniciushEndereco -> cidade;

echo $cidade . PHP_EOL;

$viniciusCpf = new CPF("123.123.321-12");
$viniciushTitular  = new Titular(
    $cpf =  $viniciusCpf, 
    $nome = "Vinicius H.", 
    $endereco = $viniciushEndereco
);

$viniciushConta = new ContaCorrente($viniciushTitular);

$nome = $viniciushConta -> recuperaNomeTitular();

echo $nome . PHP_EOL;


echo Conta::recuperaNumeroDeContas();
