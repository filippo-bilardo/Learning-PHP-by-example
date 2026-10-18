<?php
declare(strict_types=1);

$eta = 18;
$prezzo = 12.5;
$nome = 'Ada';
$iscritto = true;
$telefono = null;

foreach ([$eta, $prezzo, $nome, $iscritto, $telefono] as $valore) {
    echo get_debug_type($valore), PHP_EOL;
}

echo "Ciao $nome", PHP_EOL;
echo 'Ciao $nome', PHP_EOL;
var_dump($telefono === null);
