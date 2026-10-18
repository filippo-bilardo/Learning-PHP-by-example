# Esercitazione 16: Gestione degli errori e logging

## Obiettivi

- Tradurre eccezioni in risposte HTTP controllate.
- Registrare contesto utile senza dati sensibili.
- Distinguere errori cliente, dominio e infrastruttura.

## Esempio

```php
try {
    $response = $kernel->handle($request);
} catch (DomainException $exception) {
    $response = Response::json(['error' => $exception->getMessage()], 422);
} catch (Throwable $exception) {
    $logger->error('Errore non gestito', ['exception' => $exception]);
    $response = Response::json(['error' => 'Errore interno'], 500);
}
```

In produzione non esporre stack trace, query SQL, token o password al client.

## Esercizi

1. Introduci un formato JSON standard per gli errori.
2. Aggiungi log strutturati con request ID e durata della richiesta.

