<?php
declare(strict_types=1);

$iniziali = [1, 2];
$numeri = [...$iniziali, 3];
echo 'Numeri: ', implode(', ', $numeri), PHP_EOL;

$config = [...['tema' => 'chiaro'], ...['tema' => 'scuro']];
echo 'Tema: ', $config['tema'], PHP_EOL;

$utente = null;
echo 'Utente: ', $utente?->nome ?? 'Ospite', PHP_EOL;

$lettura = 1;
$scrittura = 2;
$permessi = $lettura | $scrittura;
var_dump(($permessi & $scrittura) !== 0);
echo 'Shift: ', 5 << 1, PHP_EOL;
