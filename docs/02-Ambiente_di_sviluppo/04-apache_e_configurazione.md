# Apache e sua configurazione

**Apache HTTP Server** riceve richieste HTTP, distribuisce file e può inoltrare
l'esecuzione degli script a PHP-FPM. La configurazione distingue impostazioni
globali, siti virtuali e regole applicate alle directory.

Questa guida usa come riferimento un laboratorio Ubuntu con Apache 2.4 e
PHP-FPM già installati. Per l'installazione dei pacchetti consulta le guide
Ubuntu su [Apache](https://ubuntu.com/server/docs/how-to/web-services/install-apache2/)
e [PHP](https://ubuntu.com/server/docs/how-to/web-services/install-php/).

---

# File e direttive principali

| Elemento | Funzione |
|---|---|
| `Listen` | Indirizzo e porta di ascolto |
| `<VirtualHost>` | Configurazione di un sito per un indirizzo e una porta |
| `ServerName` | Nome del sito |
| `DocumentRoot` | Cartella pubblica del sito |
| `<Directory>` | Regole per una directory sul filesystem |
| `DirectoryIndex` | File da cercare quando viene richiesta una cartella |
| `ErrorLog`, `CustomLog` | Destinazioni dei log |

Su Ubuntu la configurazione parte normalmente da `/etc/apache2/apache2.conf`;
i siti si definiscono in `sites-available` e si abilitano in `sites-enabled`.
Altre distribuzioni e XAMPP usano percorsi differenti.

Riferimenti: [file di configurazione Apache](https://httpd.apache.org/docs/2.4/configuring.html)
e [direttive del core](https://httpd.apache.org/docs/2.4/mod/core.html).

---

# Preparare il percorso del progetto

Per l'esempio supponiamo che il progetto si trovi in:

```text
/srv/corso-php/
├── docs/
└── www/
    ├── index.php
    ├── 01-hello-php/
    └── 02-pagina-riservata/
```

Sostituisci `/srv/corso-php` con il percorso reale del tuo progetto. Il processo
Apache deve poter attraversare le directory e leggere i file pubblici. Una
regola `Require` non sostituisce i permessi del filesystem.

---

# Un virtual host locale con PHP-FPM

Salva una configurazione come `/etc/apache2/sites-available/corso-php.conf`,
adattando percorso, porta e socket PHP-FPM:

```apache
Listen 127.0.0.1:8080

<VirtualHost 127.0.0.1:8080>
    ServerName localhost
    DocumentRoot "/srv/corso-php/www"
    DirectoryIndex index.php index.html

    <Directory "/srv/corso-php/www">
        Options -Indexes
        AllowOverride None
        Require local
    </Directory>

    <FilesMatch "\.php$">
        SetHandler "proxy:unix:/run/php/php8.3-fpm.sock|fcgi://localhost/"
    </FilesMatch>

    ErrorLog ${APACHE_LOG_DIR}/corso-php-error.log
    CustomLog ${APACHE_LOG_DIR}/corso-php-access.log combined
</VirtualHost>
```

Il sito è accessibile localmente su `http://localhost:8080`. `Listen` va definita
una sola volta per questo indirizzo e questa porta: controlla anche `ports.conf`
e gli altri file inclusi.

`Require local` limita l'accesso ai client locali: questa configurazione serve
per un laboratorio sul proprio computer, non per pubblicare un servizio remoto.
Su Web4Student si usa il sito personale già configurato dall'amministratore.

---

# Come leggere la configurazione

- `DocumentRoot` pubblica solo `www`, lasciando fuori le guide e i file del repository.
- `DirectoryIndex` cerca prima `index.php` e poi `index.html` nelle cartelle.
- `Options -Indexes` evita di generare l'elenco dei file quando manca un indice.
- `AllowOverride None` mantiene le regole nella configurazione del server.
- `SetHandler` inoltra i file PHP al socket FastCGI di PHP-FPM.

Il socket deve coincidere con la direttiva `listen` del pool FPM. Verifica il
percorso sotto `/run/php` e la configurazione sotto `/etc/php/<versione>/fpm/pool.d/`;
non dedurlo soltanto dalla versione di PHP CLI.

Riferimenti: [esempi di virtual host](https://httpd.apache.org/docs/2.4/vhosts/examples.html),
[DirectoryIndex](https://httpd.apache.org/docs/2.4/mod/mod_dir.html),
[mod_proxy_fcgi](https://httpd.apache.org/docs/2.4/mod/mod_proxy_fcgi.html)
e [configurazione FPM](https://www.php.net/manual/en/install.fpm.configuration.php).

<!--
Note del docente:
Questo esempio sceglie PHP-FPM. Un'installazione XAMPP può usare il modulo PHP di Apache: non applicare il blocco SetHandler senza verificare la modalità di esecuzione scelta.
-->

---

# Abilitare e controllare il sito su Ubuntu

Con un account amministratore del proprio laboratorio, abilita `proxy_fcgi`
e il sito. Verifica prima che il servizio FPM della versione scelta sia attivo.

```bash
sudo a2enmod proxy_fcgi
sudo a2ensite corso-php
sudo apache2ctl configtest
sudo apache2ctl -S
sudo systemctl reload apache2
```

Esegui il reload soltanto dopo un controllo della sintassi riuscito.
`apache2ctl -S` mostra la mappa dei virtual host. I comandi `a2enmod`, `a2ensite`
e `systemctl` dipendono dal pacchetto e dal sistema operativo; non si usano
dal normale account studente di un server condiviso.

Non basta abilitare il modulo proxy: PHP-FPM deve essere in esecuzione e il suo
socket deve essere accessibile al processo Apache. La [guida Ubuntu ad Apache](https://ubuntu.com/server/docs/how-to/web-services/install-apache2/)
spiega l'organizzazione dei siti e dei moduli della distribuzione.

---

# Log e diagnosi

```bash
sudo tail -n 30 /var/log/apache2/corso-php-error.log
sudo tail -n 30 /var/log/apache2/corso-php-access.log
```

I percorsi corrispondono al valore tipico Ubuntu di `APACHE_LOG_DIR`.
L'access log registra le richieste e i relativi esiti; l'error log aiuta a
individuare problemi di configurazione, permessi o collegamento al backend.
PHP-FPM può avere un proprio log separato.
Vedi la [documentazione dei log Apache](https://httpd.apache.org/docs/2.4/mod/mod_log_config.html).

| Risultato | Che cosa controllare |
|---|---|
| 403 | Regole `Require`, client ammesso e permessi delle directory |
| 404 | DocumentRoot, percorso richiesto e file presente |
| 503 o errore di collegamento al backend | Stato FPM, percorso e permessi del socket |
| Pagina diversa da quella prevista | Mappa dei virtual host, indirizzo e porta |

## Attività

Adatta il virtual host al progetto, verifica `configtest` e apri i due esempi.
Individua la richiesta nel log. Spiega la differenza tra `DocumentRoot`,
`<Directory>` e il percorso del socket PHP-FPM.

---

[Guida precedente: php.ini](03-configurazione_php_ini.md) · [Indice](README.md) · [Guida successiva: Nginx](05-nginx_e_configurazione.md)
