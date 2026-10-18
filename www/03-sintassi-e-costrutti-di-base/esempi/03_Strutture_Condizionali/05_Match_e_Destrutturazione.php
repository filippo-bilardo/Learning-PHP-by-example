<?php
declare(strict_types=1);

$codice = '1';
$tipo = match ($codice) {
    1 => 'intero',
    '1' => 'stringa',
    default => 'altro',
};
echo 'Tipo selezionato: ', $tipo, PHP_EOL;

$giorno = 'domenica';
echo match ($giorno) {
    'sabato', 'domenica' => 'Fine settimana',
    default => 'Altro giorno',
}, PHP_EOL;

$studente = ['nome' => 'Ada', 'classe' => '3A'];
['nome' => $nome, 'classe' => $classe] = $studente;
echo $nome, ' - ', $classe, PHP_EOL;
