<?php
declare(strict_types=1);

foreach ([-1, 0, 17, 18] as $eta) {
    if ($eta < 0) {
        $fascia = 'età non valida';
    } elseif ($eta < 18) {
        $fascia = 'minorenne';
    } else {
        $fascia = 'maggiorenne';
    }

    echo $eta, ': ', $fascia, PHP_EOL;
}
