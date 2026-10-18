# Esercitazione 4: Programmazione a oggetti

## Obiettivi

- Modellare entità con classi, proprietà tipizzate e metodi.
- Usare interfacce, eccezioni e dependency injection.
- Distinguere responsabilità di dominio e infrastruttura.

## Esempio

```php
final readonly class Task
{
    public function __construct(
        public int $id,
        public string $titolo,
        public bool $completata = false,
    ) {}

    public function completa(): self
    {
        return new self($this->id, $this->titolo, true);
    }
}
```

## Esercizi

1. Crea `User`, `Task` e un'interfaccia `TaskRepository`.
2. Implementa un servizio che completa un'attività solo per il proprietario.

