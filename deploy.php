<?php

    if (php_sapi_name() != "cli") {
        header('Content-Type:text/plain');
    }

    echo 'INICIANDO DEPLOY' . PHP_EOL;
    echo '=======' . PHP_EOL;

// uso o passthru para rodar um
// git pull no console do Linux
    echo 'Atualizando o repositório' . PHP_EOL;
    passthru('git pull');
    echo 'OK' . PHP_EOL;
    echo '=======' . PHP_EOL;

// uso o passthru para rodar um
// rm -rf vendor, removendo meu
// diretório  vendor
    echo 'Removendo diretório vendor' . PHP_EOL;
    passthru('rm -rf vendor');
    echo 'OK' . PHP_EOL;
    echo '=======' . PHP_EOL;

// instalo as novas atualizações
    echo 'Instalando as dependências' . PHP_EOL;
    echo passthru('app/composer install');
    echo 'OK' . PHP_EOL;
    echo '=======' . PHP_EOL;

echo 'Deploy finalizado!' . PHP_EOL;