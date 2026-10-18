<?php
declare(strict_types=1);

$matrice = [[1, 2, 3], [4, 5, 6]];
foreach ($matrice as $indice => $riga) {
    $sommaRiga = 0;
    foreach ($riga as $numero) {
        $sommaRiga += $numero;
    }
    echo 'Riga ', $indice, ': ', $sommaRiga, PHP_EOL;
}

$posizione = null;
foreach ($matrice as $r => $riga) {
    foreach ($riga as $c => $numero) {
        if ($numero === 5) {
            $posizione = [$r, $c];
            break 2;
        }
    }
}
echo 'Posizione di 5: ', implode(',', $posizione ?? []), PHP_EOL;
