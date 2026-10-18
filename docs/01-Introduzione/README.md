# Esercitazione 1: Introduzione a PHP

## Obiettivi

- Installare PHP CLI e verificare la versione.
- Eseguire uno script e servire una pagina locale.
- Comprendere il ciclo richiesta-risposta.

## Concetti

PHP è un linguaggio eseguito sul server. Lo script genera una risposta HTTP,
spesso HTML o JSON. Dalla cartella del progetto avvia:

```bash
php -S localhost:8000 -t public
```

## Esempio

```php
<?php
declare(strict_types=1);

echo 'Ciao PHP!';
```

Salva il file come `public/index.php`, poi visita `http://localhost:8000`.

## Esercizi

1. Stampa nome, classe e data corrente.
2. Restituisci una risposta HTML completa con titolo e paragrafo.

