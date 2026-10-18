<?php
declare(strict_types=1);

$somma = 0;
foreach ([3, -1, 0, 8, 12] as $numero) {
    if ($numero <= 0) {
        continue;
    }
    if ($numero >= 10) {
        break;
    }
    $somma += $numero;
}
echo 'Somma prima del limite: ', $somma, PHP_EOL;

$indiceTrovato = null;
foreach ([7, 4, 9] as $indice => $valore) {
    if ($valore === 7) {
        $indiceTrovato = $indice;
        break;
    }
}
echo 'Indice trovato: ', $indiceTrovato ?? 'nessuno', PHP_EOL;
