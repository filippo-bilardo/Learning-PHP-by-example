<?php
declare(strict_types=1);

var_dump(5 == '5');
var_dump(5 === '5');
var_dump(0 === false);
var_dump(8 >= 6);
echo 'Ordine: ', 3 <=> 8, PHP_EOL;

$calcolato = 0.1 + 0.2;
$atteso = 0.3;
$tolleranza = 0.000001;
var_dump(abs($calcolato - $atteso) < $tolleranza);
