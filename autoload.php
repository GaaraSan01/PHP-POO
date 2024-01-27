<?php

spl_autoload_register(function (string $nomeCompletoDaClasse){
    $caminoArquivo = str_replace('Alura\\Banco', 'src', $nomeCompletoDaClasse);
    $caminoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminoArquivo);
    $caminoArquivo .= '.php';

    if(file_exists($caminoArquivo)){
        require_once $caminoArquivo;
    }
});