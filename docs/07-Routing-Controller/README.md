# Esercitazione 7: Routing e controller

## Obiettivi

- Mappare metodi e percorsi a controller.
- Estrarre parametri di percorso in modo esplicito.
- Mantenere le azioni sottili delegando ai servizi.

## Esempio

```php
$routes = [
    'GET /tasks' => [TaskController::class, 'index'],
    'POST /tasks' => [TaskController::class, 'create'],
];
```

Un router confronta la chiave `METODO percorso`, crea il controller e restituisce
una `Response`. Evita di inserire SQL o logica di autorizzazione nel router.

## Esercizi

1. Aggiungi `GET /tasks/{id}`.
2. Restituisci `405 Method Not Allowed` quando il percorso esiste ma il metodo no.

