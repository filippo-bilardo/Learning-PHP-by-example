<?php
declare(strict_types=1);

$voti = [2 => 6, 5 => 8];
foreach ($voti as $indice => $voto) {
    echo $indice, ': ', $voto, PHP_EOL;
}

$quantita = ['quaderni' => 2, 'penne' => 3];
foreach ($quantita as $nome => $numero) {
    $quantita[$nome] = $numero + 1;
}
echo 'Quaderni aggiornati: ', $quantita['quaderni'], PHP_EOL;

$studente = (object) ['nome' => 'Ada', 'classe' => '3A'];
foreach ($studente as $campo => $valore) {
    echo $campo, '=', $valore, PHP_EOL;
}
