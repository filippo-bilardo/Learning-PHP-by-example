# Esercitazione 10: Template e pagine dinamiche

## Obiettivi

- Separare presentazione e logica applicativa.
- Rendere output HTML evitando XSS.
- Gestire layout, pagine e messaggi flash.

## Esempio

```php
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
```

Nei template applica `e()` a ogni dato proveniente da utente o database. Per
progetti più grandi usa Twig: abilita l'autoescape e passa solo dati necessari.

## Esercizi

1. Crea una pagina elenco attività con layout comune.
2. Mostra un messaggio flash dopo la creazione di un'attività.

