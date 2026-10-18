<?php
declare(strict_types=1);

$eta = 20;
$haBiglietto = true;
var_dump($eta >= 18 && $haBiglietto);

$divisore = 0;
var_dump($divisore !== 0 && 10 / $divisore > 2);
var_dump('Ada' || 'Ospite');
var_dump((bool) '0', (bool) [], (bool) 'false');

$conAnd = true and false;
$conDoppioAnd = true && false;
var_dump($conAnd, $conDoppioAnd);
