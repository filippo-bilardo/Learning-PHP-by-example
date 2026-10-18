# Ambiente Codespaces per PHP

La cartella contiene la configurazione usata da GitHub Codespaces e dai Dev
Containers di Visual Studio Code. Docker Compose avvia il container PHP 8.3 con
Composer, i driver `mysqli` e `pdo_mysql` e il client MySQL, insieme a un servizio
MySQL 8.4. Il container PHP parte quando il database è pronto.

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
php --ri pdo_mysql
```

Dal terminale del container PHP puoi collegarti al database con:

```bash
mysql --protocol=TCP -h 127.0.0.1 -u php -p php_course
```

Inserisci la password `php-dev`. Per PDO usa il DSN
`mysql:host=127.0.0.1;port=3306;dbname=php_course;charset=utf8mb4`, l'utente `php`
e la stessa password. PHP e MySQL condividono la rete, quindi usa `127.0.0.1`
per la connessione TCP. Le credenziali in `compose.yaml` sono per lo sviluppo
locale; la password di root è `root-dev`.

I dati MySQL sono conservati nel volume Docker `mysql-data` durante i normali
riavvii e rebuild. Le credenziali e il database indicati nel file Compose vengono
creati soltanto alla prima inizializzazione di un volume vuoto.

## Ripristino dalla modalità recovery

La configurazione precedente richiamava il Feature non disponibile
`ghcr.io/devcontainers/features/mysql:1`. Ora il database usa l'immagine ufficiale
MySQL tramite Docker Compose.

Dopo aver aggiornato questi file nel Codespace, apri la palette dei comandi
(`Ctrl+Shift+P` oppure `Cmd+Shift+P`) ed esegui **Codespaces: Rebuild Container**.
In VS Code con Dev Containers usa **Dev Containers: Rebuild Container**.
Attendi il completamento, poi verifica PHP, Composer, la connessione al database
e la pagina iniziale sulla porta 8000.

Le estensioni VS Code incluse forniscono completamento PHP, debug con Xdebug e
formattazione del codice.

