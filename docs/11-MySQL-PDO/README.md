# Esercitazione 11: Database relazionali con PDO

## Obiettivi

- Connettersi a MySQL usando PDO e le eccezioni.
- Eseguire query parametrizzate e transazioni.
- Comprendere chiavi, indici e relazioni.

## Esempio

```php
$pdo = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);

$stmt = $pdo->prepare('SELECT id, titolo FROM tasks WHERE user_id = :userId');
$stmt->execute(['userId' => $userId]);
```

I parametri impediscono l'iniezione SQL: non concatenare mai input utente nella
stringa SQL.

## Esercizi

1. Crea tabelle `users` e `tasks` con chiave esterna.
2. Inserisci un'attività e leggi solo quelle dell'utente autenticato.

