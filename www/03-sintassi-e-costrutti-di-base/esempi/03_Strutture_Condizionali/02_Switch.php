<?php
declare(strict_types=1);

$giorno = 'sabato';
switch ($giorno) {
    case 'sabato':
    case 'domenica':
        $tipo = 'fine settimana';
        break;
    default:
        $tipo = 'giorno da verificare';
}
echo $giorno, ': ', $tipo, PHP_EOL;

$codice = '1';
switch ($codice) {
    case 1:
        echo 'La stringa 1 corrisponde al caso intero 1.', PHP_EOL;
        break;
    default:
        echo 'Nessuna corrispondenza.', PHP_EOL;
}
