<?php
declare(strict_types=1);

$a = 17;
$b = 5;
echo 'Somma: ', $a + $b, PHP_EOL;
echo 'Divisione: ', $a / $b, PHP_EOL;
echo 'Quoziente intero: ', intdiv($a, $b), PHP_EOL;
echo 'Resto: ', $a % $b, PHP_EOL;
echo 'Potenza: ', 2 ** 3, PHP_EOL;
echo 'Con parentesi: ', (2 + 3) * 4, PHP_EOL;

$contatore = 2;
echo 'Post incremento: ', $contatore++, PHP_EOL;
echo 'Pre incremento: ', ++$contatore, PHP_EOL;
