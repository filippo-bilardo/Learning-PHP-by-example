<?php
declare(strict_types=1);

$numeri = [3, 5, 7];
$copia = $numeri;
$copia[0] = 99;
echo 'Array originale: ', $numeri[0], PHP_EOL;
echo 'Array copiato: ', $copia[0], PHP_EOL;

$studente = ['nome' => 'Ada', 'voti' => [7, 8]];
echo $studente['nome'], ': ', count($studente['voti']), ' voti', PHP_EOL;

$persona = (object) ['nome' => 'Ada'];
$altraVariabile = $persona;
$altraVariabile->nome = 'Grace';
echo 'Oggetto condiviso: ', $persona->nome, PHP_EOL;

$personaCopiata = clone $persona;
$personaCopiata->nome = 'Linus';
echo 'Dopo clone: ', $persona->nome, '/', $personaCopiata->nome, PHP_EOL;
