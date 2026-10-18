# Esercitazione 6: HTTP e server PHP

## Obiettivi

- Leggere metodo, URI, header e body della richiesta.
- Impostare status code e header corretti.
- Separare il front controller dai file applicativi.

## Esempio

```php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
header('Content-Type: application/json; charset=utf-8');

if ($path === '/health') {
    echo json_encode(['status' => 'ok'], JSON_THROW_ON_ERROR);
    return;
}

http_response_code(404);
echo json_encode(['error' => 'Risorsa non trovata']);
```

## Esercizi

1. Implementa endpoint `/health` e `/time`.
2. Restituisci JSON di errore uniforme per una rotta inesistente.

