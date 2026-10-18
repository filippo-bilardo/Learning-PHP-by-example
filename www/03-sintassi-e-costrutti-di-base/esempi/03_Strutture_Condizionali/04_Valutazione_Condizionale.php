<?php
declare(strict_types=1);

$dati = ['tentativi' => 0, 'nome' => '', 'email' => null];

echo 'Tentativi: ', $dati['tentativi'] ?? 5, PHP_EOL;
echo 'Città: ', $dati['citta'] ?? 'non indicata', PHP_EOL;
var_dump(isset($dati['email']));
var_dump(array_key_exists('email', $dati));
var_dump(empty('0'));

$nome = $dati['nome'];
if (!is_string($nome) || trim($nome) === '') {
    $nome = 'Ospite';
}
echo 'Nome visualizzato: ', $nome, PHP_EOL;
