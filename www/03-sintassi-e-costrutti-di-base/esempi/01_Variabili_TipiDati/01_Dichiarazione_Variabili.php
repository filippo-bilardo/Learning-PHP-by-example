<?php
declare(strict_types=1);

$nome = 'Ada';
$tentativi = 1;
$tentativi = $tentativi + 1;
const MAX_TENTATIVI = 3;

echo "Studente: $nome", PHP_EOL;
echo 'Tentativi: ', $tentativi, '/', MAX_TENTATIVI, PHP_EOL;

$dato = 42;
echo get_debug_type($dato), PHP_EOL;
$dato = 'quarantadue';
echo get_debug_type($dato), PHP_EOL;
