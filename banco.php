<?php

require_once 'src/Conta.php';

$conta01 = new Conta();

$conta01 -> setCpfTitular('123.132.123-30');
$conta01 -> setNomeTitular('Vinicius Henrique');
$conta01 -> depositar(2000);

echo $conta01 -> getExtrato();