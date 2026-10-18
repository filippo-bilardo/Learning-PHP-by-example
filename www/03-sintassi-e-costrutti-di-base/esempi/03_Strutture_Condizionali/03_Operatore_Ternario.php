<?php
declare(strict_types=1);

$voto = 7;
$esito = $voto >= 6 ? 'Promosso' : 'Da recuperare';
echo $esito, PHP_EOL;

$nome = '';
echo 'Nome: ', $nome ?: 'Ospite', PHP_EOL;

$quantita = '0';
echo 'Con ?: ', $quantita ?: 'assente', PHP_EOL;
echo 'Con ??: ', $quantita ?? 'assente', PHP_EOL;
