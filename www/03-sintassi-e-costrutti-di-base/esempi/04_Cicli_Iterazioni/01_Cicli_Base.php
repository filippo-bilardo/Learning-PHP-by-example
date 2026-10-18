<?php
declare(strict_types=1);

$numeri = [];
for ($i = 1; $i <= 3; $i++) {
    $numeri[] = $i;
}
echo 'For: ', implode(', ', $numeri), PHP_EOL;

$contatore = 3;
$discesa = [];
while ($contatore > 0) {
    $discesa[] = $contatore;
    $contatore--;
}
echo 'While: ', implode(', ', $discesa), PHP_EOL;

$esecuzioni = 0;
do {
    $esecuzioni++;
} while (false);
echo 'Do-while: ', $esecuzioni, PHP_EOL;
