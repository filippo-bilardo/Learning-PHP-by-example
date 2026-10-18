# Esercitazione 19: CI/CD e qualità del codice

## Obiettivi

- Automatizzare test, analisi statica e controlli di sicurezza.
- Usare una pipeline GitHub Actions.
- Configurare variabili e segreti per ambiente.

## Esempio

```yaml
name: Test
on: [push, pull_request]
jobs:
  phpunit:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with: { php-version: '8.3' }
      - run: composer install --no-interaction --prefer-dist
      - run: vendor/bin/phpunit
```

La pipeline deve fallire se test o analisi statica falliscono. I segreti sono
configurati nella piattaforma CI, mai nel repository.

## Esercizi

1. Aggiungi PHPStan e PHP-CS-Fixer al progetto.
2. Esegui migration e test di integrazione in un servizio MySQL della pipeline.

