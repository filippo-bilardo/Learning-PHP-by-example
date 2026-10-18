<?php
declare(strict_types=1);

$voti = [4, 6, 8];
$doppi = array_map(static fn (int $voto): int => $voto * 2, $voti);
$sufficienti = array_filter($voti, static fn (int $voto): bool => $voto >= 6);
$somma = array_reduce($voti, static fn (int $totale, int $voto): int => $totale + $voto, 0);
$media = count($voti) > 0 ? $somma / count($voti) : null;

echo 'Doppi: ', implode(', ', $doppi), PHP_EOL;
echo 'Sufficienti: ', implode(', ', array_values($sufficienti)), PHP_EOL;
echo 'Chiavi conservate: ', implode(', ', array_keys($sufficienti)), PHP_EOL;
echo 'Somma: ', $somma, PHP_EOL;
echo 'Media: ', $media ?? 'non disponibile', PHP_EOL;
