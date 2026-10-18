# Ambiente Codespaces per PHP

La cartella contiene la configurazione usata da GitHub Codespaces e dai Dev
Containers di Visual Studio Code. L'immagine include PHP 8.3 e Composer; la
feature installa MySQL 8.

## Avvio

1. Su GitHub seleziona **Code**, poi **Create codespace on ...**.
2. Attendi la creazione del container.
3. Il server di sviluppo parte automaticamente dalla cartella `www`.
   Apri la porta **8000** dal pannello **Ports** per vedere la presentazione
   del corso e i link agli esempi.

Per avviare manualmente il server dalla cartella principale del progetto,
se non è già in esecuzione:

   ```bash
   php -S 0.0.0.0:8000 -t www
   ```

La porta 8000 viene inoltrata e aperta automaticamente dal Codespace.
Il log del server avviato automaticamente è in `/tmp/php-course-server.log`.
Se il Codespace esiste già, esegui **Codespaces: Rebuild Container** per applicare
la nuova configurazione.

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

