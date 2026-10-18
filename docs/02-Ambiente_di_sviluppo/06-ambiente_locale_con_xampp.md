# Ambiente locale con XAMPP

**XAMPP** è una distribuzione integrata che comprende Apache, MariaDB, PHP e
Perl. Permette di preparare un ambiente locale senza configurare separatamente
tutti i componenti. Installer e componenti disponibili sono elencati nella
[pagina ufficiale di download](https://www.apachefriends.org/download.html).

Questa guida usa **Windows** come esempio, con installazione in `C:\xampp`.
Su altri sistemi cambiano percorsi e strumenti di avvio.

---

# Installazione e primo avvio

1. Scarica l'installer dal sito Apache Friends e controlla la versione PHP inclusa.
2. Installa il pacchetto nel percorso scelto.
3. Apri **XAMPP Control Panel** e avvia **Apache**.
4. Apri `http://localhost/` per verificare la risposta del server.
5. Avvia il servizio del database soltanto quando un'attività lo richiede.

Nel pannello il database può essere indicato come **MySQL**, anche se il
pacchetto contiene MariaDB. Il login minimale del corso non usa il database.

Il corso fa riferimento a PHP 8.3: verifica il pacchetto effettivo. Se include
una versione precedente, non presumere che supporti tutte le funzionalità del
corso; per l'ambiente di riferimento puoi usare Codespaces.

XAMPP è pensato per lo sviluppo: vedi le [FAQ ufficiali](https://www.apachefriends.org/faq_windows.html).

---

# Prima prova con htdocs

La cartella pubblica predefinita su Windows è normalmente `C:\xampp\htdocs`.
Per provare gli esempi senza cambiare configurazione, crea una sottocartella
`corso-php` e copiaci **il contenuto di `www`**:

```text
C:\xampp\htdocs\corso-php\
├── index.php
├── 01-hello-php\
│   └── index.php
└── 02-pagina-riservata\
    └── index.php
```

Apri nel browser:

```text
http://localhost/corso-php/
http://localhost/corso-php/01-hello-php/
http://localhost/corso-php/02-pagina-riservata/
```

La copia è indipendente dal repository originale: una modifica nell'originale
va riportata nella copia per essere visibile qui. Per lavorare direttamente
sul repository puoi configurare un virtual host come nel paragrafo successivo.

Le FAQ Apache Friends spiegano la corrispondenza tra [htdocs e URL locali](https://www.apachefriends.org/faq_windows.html).

---

# Usare direttamente www con un virtual host

Supponiamo che il repository sia in `C:\progetti\Learning-PHP-by-example`.
Verifica che `C:\xampp\apache\conf\httpd.conf` includa il file dei virtual host:

```apache
Include conf/extra/httpd-vhosts.conf
```

Nel file incluso aggiungi un sito locale con il percorso reale del progetto:

```apache
Listen 127.0.0.1:8080

<VirtualHost 127.0.0.1:8080>
    ServerName localhost
    DocumentRoot "C:/progetti/Learning-PHP-by-example/www"
    DirectoryIndex index.php index.html

    <Directory "C:/progetti/Learning-PHP-by-example/www">
        Options -Indexes
        AllowOverride None
        Require local
    </Directory>
</VirtualHost>
```

Non duplicare un `Listen` già presente per lo stesso indirizzo e porta.
Verifica la configurazione da PowerShell, adattando il percorso di XAMPP:

```powershell
& 'C:\xampp\apache\bin\httpd.exe' -t
```

Se il controllo riesce, riavvia Apache dal pannello e apri
`http://localhost:8080/`. Questo virtual host usa il supporto PHP già fornito
da XAMPP; non richiede il blocco PHP-FPM della guida Linux.

Riferimenti per la sintassi: [virtual host Apache](https://httpd.apache.org/docs/2.4/vhosts/examples.html)
e [direttive Directory](https://httpd.apache.org/docs/2.4/mod/core.html).

---

# php.ini e terminale

Dal pulsante **Config** di Apache nel pannello puoi aprire `php.ini`. Nel caso
descritto il percorso tipico è `C:\xampp\php\php.ini`: confermalo con
`phpinfo()` nella pagina **Hello PHP**. Dopo una modifica riavvia Apache.

Per interrogare esplicitamente PHP di XAMPP da PowerShell:

```powershell
& 'C:\xampp\php\php.exe' --version
& 'C:\xampp\php\php.exe' --ini
& 'C:\xampp\php\php.exe' -l 'C:\progetti\Learning-PHP-by-example\www\01-hello-php\index.php'
```

Un semplice `php --version` può usare un'altra installazione presente nel `PATH`.
Confronta sempre interprete CLI e servizio web come spiegato nella
[guida a php.ini](03-configurazione_php_ini.md).

---

# Problemi comuni

| Problema | Verifica |
|---|---|
| Apache non parte | Leggi il log dal pannello e controlla se la porta è occupata |
| Il browser mostra un altro sito | Controlla porta e virtual host selezionato |
| 404 sul percorso dell'esempio | Controlla se hai copiato `www` oppure il suo contenuto |
| Le modifiche non compaiono | Controlla se stai usando una copia in htdocs o il repository |
| PHP CLI ha una versione diversa | Esegui il binario esplicito di XAMPP |

Se scegli una porta diversa da 80, includila nell'URL. Cambiare la porta
richiede anche di controllare le direttive `Listen` e `<VirtualHost>`.

## Attività

Prova prima la copia in htdocs e poi il virtual host sul repository. Confronta
cartella pubblica e URL; verifica saluto, login e logout. Annota quale file
devi modificare in ciascuna modalità.

---

[Guida precedente: Nginx](05-nginx_e_configurazione.md) · [Indice](README.md) · [Guida successiva: GitHub e Codespaces](07-sviluppo_online_con_github_e_codespaces.md)
