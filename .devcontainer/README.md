# Ambiente Codespaces per PHP

La cartella contiene la configurazione usata da GitHub Codespaces e dai Dev
Containers di Visual Studio Code. L'immagine include PHP 8.3 e Composer; la
feature installa MySQL 8.

## Avvio

1. Su GitHub seleziona **Code**, poi **Create codespace on ...**.
2. Attendi la creazione del container.
3. Avvia il server di sviluppo:

   ```bash
   mkdir -p public
   php -S 0.0.0.0:8000 -t public
   ```

La porta 8000 viene inoltrata e aperta automaticamente dal Codespace.

## Servizi disponibili

| Servizio | Porta | Uso |
|---|---:|---|
| PHP development server | 8000 | Pagine e API locali |
| MySQL | 3306 | Database relazionale |

Verifica gli strumenti con:

```bash
php --version
composer --version
mysql --version
```

Le estensioni VS Code incluse forniscono completamento PHP, debug con Xdebug e
formattazione del codice.

