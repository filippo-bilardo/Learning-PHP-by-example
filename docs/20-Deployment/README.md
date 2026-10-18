# Esercitazione 20: Deployment

## Obiettivi

- Preparare configurazione e log per produzione.
- Containerizzare un'applicazione PHP.
- Usare migrazioni e rollback controllati.

## Esempio

```dockerfile
FROM php:8.3-fpm-alpine
WORKDIR /var/www
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist
COPY . .
```

Mantieni configurazione in variabili d'ambiente, disabilita `display_errors`,
esegui migrazioni una sola volta e monitora health check, error rate e latenza.

## Esercizi

1. Scrivi `docker-compose.yml` per PHP-FPM, Nginx e MySQL.
2. Prepara una checklist di release con backup, migrazione e piano di rollback.

