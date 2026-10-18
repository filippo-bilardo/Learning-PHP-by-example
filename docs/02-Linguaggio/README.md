# Esercitazione 2: Linguaggio e flusso di controllo

## Obiettivi

- Usare tipi scalari, array associativi e operatori.
- Applicare condizioni, cicli e confronto stretto.
- Scrivere codice leggibile con `declare(strict_types=1)`.

## Esempio

```php
<?php
declare(strict_types=1);

$studente = ['nome' => 'Ada', 'voti' => [8, 9, 7]];
$somma = array_sum($studente['voti']);
$media = $somma / count($studente['voti']);

echo $media >= 6 ? 'Promosso' : 'Da recuperare';
```

## Esercizi

1. Calcola il prezzo finale di un carrello applicando uno sconto.
2. Trasforma una lista di attività in un array di sole attività completate.

