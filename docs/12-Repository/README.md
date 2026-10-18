# Esercitazione 12: Repository e query builder

## Obiettivi

- Isolare PDO dietro repository orientati al dominio.
- Comporre filtri e paginazione senza SQL duplicato.
- Gestire transazioni a livello di caso d'uso.

## Esempio

```php
interface TaskRepository
{
    /** @return list<Task> */
    public function findByUser(int $userId, int $limit, int $offset): array;

    public function save(Task $task): Task;
}
```

Il controller dipende dall'interfaccia; l'implementazione PDO resta sostituibile
nei test. Valida e limita sempre `limit` e `offset` prima di usarli in SQL.

## Esercizi

1. Implementa `PdoTaskRepository`.
2. Aggiungi filtro `completed` e paginazione con metadati.

