# Esercitazione 15: API REST

## Obiettivi

- Progettare risorse, URI, status code e rappresentazioni JSON.
- Gestire versionamento, paginazione e errori coerenti.
- Documentare l'API con OpenAPI.

## Esempio

```php
http_response_code(201);
header('Location: /api/tasks/' . $task->id);
echo json_encode(['data' => $task], JSON_THROW_ON_ERROR);
```

Usa `201` alla creazione, `204` senza corpo dopo un'eliminazione riuscita,
`400` per richieste malformate, `401` senza identità e `403` senza permesso.

## Esercizi

1. Implementa CRUD di `/api/tasks`.
2. Definisci gli schemi OpenAPI per task e risposta di errore.

