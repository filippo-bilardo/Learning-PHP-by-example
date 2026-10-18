# Esercitazione 17: Testing

## Obiettivi

- Scrivere unit test con PHPUnit.
- Usare double per repository e servizi esterni.
- Eseguire integration test su HTTP e database isolato.

## Esempio

```php
public function testCompletesATask(): void
{
    $task = new Task(1, 'Studiare PHP');

    self::assertTrue($task->completa()->completata);
}
```

Organizza test veloci sul dominio, pochi test di integrazione per repository e
endpoint, e fixture ripetibili. Ogni test deve essere indipendente.

## Esercizi

1. Testa validazione e autorizzazione del caso d'uso di completamento.
2. Testa `POST /api/tasks` contro un database dedicato ai test.

