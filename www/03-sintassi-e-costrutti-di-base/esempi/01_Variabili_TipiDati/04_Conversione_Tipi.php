<?php
declare(strict_types=1);

$testo = '42';
$numero = (int) $testo;
echo $numero + 8, PHP_EOL;
echo 'Cast parziale: ', (int) '12mele', PHP_EOL;

$zero = filter_var('0', FILTER_VALIDATE_INT);
$errato = filter_var('12mele', FILTER_VALIDATE_INT);
var_dump($zero === 0, $errato === false);
var_dump((bool) '0', (bool) 'false');

$somma = static function (int $a, int $b): int {
    return $a + $b;
};

try {
    $somma('2', 3);
} catch (TypeError $errore) {
    echo 'Il parametro stringa non rispetta il tipo int.', PHP_EOL;
}
