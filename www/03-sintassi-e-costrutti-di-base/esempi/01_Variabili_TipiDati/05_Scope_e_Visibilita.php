<?php
declare(strict_types=1);

$nome = 'Ada';
if (true) {
    $messaggio = 'Variabile assegnata nel blocco';
}
echo $messaggio, PHP_EOL;

$controllaScope = static function (): bool {
    return isset($nome);
};
var_dump($controllaScope());

$saluta = static function (string $persona): string {
    return 'Ciao, ' . $persona;
};
echo $saluta($nome), PHP_EOL;

$prefisso = 'Benvenuta';
$salutoAcquisito = static function () use ($prefisso, $nome): string {
    return "$prefisso, $nome";
};
$prefisso = 'Salve';
echo $salutoAcquisito(), PHP_EOL;
