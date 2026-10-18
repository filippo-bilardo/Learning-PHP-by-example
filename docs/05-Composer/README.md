# Esercitazione 5: Composer e autoloading

## Obiettivi

- Inizializzare un progetto Composer.
- Configurare l'autoload PSR-4.
- Gestire dipendenze e aggiornamenti riproducibili.

## Esempio

```json
{
  "autoload": {
    "psr-4": { "App\\": "src/" }
  },
  "require": {
    "php": "^8.3"
  }
}
```

Esegui `composer dump-autoload` dopo la modifica. Versiona `composer.lock`;
non versionare `vendor/`.

## Esercizi

1. Sposta la classe `Task` in `src/Domain/`.
2. Aggiungi PHPUnit come dipendenza di sviluppo.

