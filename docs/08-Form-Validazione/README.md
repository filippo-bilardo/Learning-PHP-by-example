# Esercitazione 8: Form, validazione e upload

## Obiettivi

- Leggere dati JSON e form-urlencoded.
- Validare formato, presenza e vincoli di dominio.
- Gestire upload senza fidarsi del nome file del client.

## Esempio

```php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email === false || $email === null) {
    throw new InvalidArgumentException('Email non valida.');
}
```

Per un upload verifica errore, dimensione e MIME rilevato con `finfo`; genera
un nome casuale lato server e conserva il file fuori dalla document root.

## Esercizi

1. Valida la creazione di un'attività con titolo da 3 a 120 caratteri.
2. Progetta una whitelist per immagini PNG e JPEG.

