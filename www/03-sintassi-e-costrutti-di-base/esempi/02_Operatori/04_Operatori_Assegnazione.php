<?php
declare(strict_types=1);

$punti = 10;
$punti += 5;
$punti *= 2;
echo 'Punti: ', $punti, PHP_EOL;

$messaggio = 'Ciao';
$messaggio .= ', Ada';
echo $messaggio, PHP_EOL;

$opzioni = ['limite' => 0, 'tema' => null];
$opzioni['limite'] ??= 10;
$opzioni['tema'] ??= 'chiaro';
echo 'Opzioni: ', $opzioni['limite'], '/', $opzioni['tema'], PHP_EOL;

$originale = 4;
$copia = $originale;
$copia = 9;
$alias = &$originale;
$alias += 2;
echo 'Valori: ', $originale, '/', $copia, PHP_EOL;
