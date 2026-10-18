# Esercitazione 14: Autenticazione e autorizzazione

## Obiettivi

- Registrare utenti con password hashate.
- Gestire sessioni sicure o token bearer.
- Separare identità, ruoli e permessi.

## Esempio

```php
$hash = password_hash($password, PASSWORD_ARGON2ID);
if (!password_verify($passwordInserita, $hash)) {
    throw new RuntimeException('Credenziali non valide.');
}
```

Rigenera l'ID di sessione dopo il login, imposta cookie `Secure`, `HttpOnly` e
`SameSite`, e verifica l'autorizzazione su ogni risorsa richiesta.

## Esercizi

1. Implementa registrazione, login e logout.
2. Impedisci la modifica di un'attività da parte di utenti non proprietari.

