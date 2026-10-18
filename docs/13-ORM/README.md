# Esercitazione 13: ORM con Doctrine

## Obiettivi

- Mappare entità e relazioni con Doctrine ORM.
- Gestire migrazioni e fixture.
- Evitare query N+1 con fetch join mirati.

## Esempio

```php
#[ORM\Entity]
final class Task
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private string $titolo;
}
```

Un ORM riduce il codice ripetitivo, ma non sostituisce la conoscenza di SQL,
indici e piani di esecuzione.

## Esercizi

1. Mappa la relazione utente-attività.
2. Scrivi una migrazione che aggiunge la data di scadenza.

