# Esercitazione 3: Funzioni, file e date

## Obiettivi

- Definire funzioni tipizzate e gestire eccezioni.
- Leggere e scrivere file in modo sicuro.
- Usare `DateTimeImmutable` invece di date mutabili.

## Esempio

```php
function salvaLog(string $messaggio): void
{
    $riga = (new DateTimeImmutable())->format(DATE_ATOM) . " $messaggio\n";
    file_put_contents(__DIR__ . '/app.log', $riga, FILE_APPEND | LOCK_EX);
}
```

## Esercizi

1. Importa un file CSV di studenti e calcola la media per ciascuno.
2. Scrivi una funzione che valida una data di scadenza futura.

