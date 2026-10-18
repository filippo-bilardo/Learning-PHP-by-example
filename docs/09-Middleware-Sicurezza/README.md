# Esercitazione 9: Middleware e sicurezza HTTP

## Obiettivi

- Creare una pipeline di middleware.
- Aggiungere request ID, CORS e rate limiting.
- Applicare header di sicurezza.

## Esempio

```php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Referrer-Policy: no-referrer');
```

Un middleware riceve richiesta e handler successivo: può arricchire il contesto,
bloccare la richiesta o trasformare la risposta. Le policy CORS devono elencare
origini e metodi necessari, mai usare `*` con credenziali.

## Esercizi

1. Aggiungi un request ID a risposta e log.
2. Implementa middleware che rifiuta body JSON troppo grandi.

