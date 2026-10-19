# Web4Student: w4s.filippobilardo.it

[Web4Student](https://w4s.filippobilardo.it/) è l'ambiente didattico remoto del
corso. La pagina del servizio presenta un sistema Linux con accesso SSH,
Apache e PHP, Git e database personali con gestione tramite Adminer.

Ogni studente lavora con il proprio account. Le credenziali e gli eventuali
limiti dell'account vengono comunicati dal docente o dall'amministratore.
Il progetto è documentato anche nel [repository Web4Student](https://github.com/filippo-bilardo/web4student).

---

# Accesso e riferimenti

La [guida pubblica del servizio](https://w4s.filippobilardo.it/#guide) indica:

| Risorsa | Riferimento |
|---|---|
| Sito principale | `https://w4s.filippobilardo.it/` |
| Accesso SSH | Host `w4s.filippobilardo.it`, porta `2222` |
| Cartella web personale | `~/www` |
| Sito personale | `https://w4s.filippobilardo.it/~username/` |
| Gestione database | `https://w4s.filippobilardo.it/adminer.php` |

Sostituisci `username` con l'account assegnato. Il simbolo `~` in un percorso
della shell indica la tua home; il prefisso `~username` nell'URL identifica
invece il sito personale pubblicato dal server.

---

# Collegarsi con SSH

Dal terminale del proprio computer:

```bash
ssh -p 2222 username@w4s.filippobilardo.it
```

Dopo l'accesso, se è stata assegnata una password provvisoria, aggiornala secondo
le istruzioni del docente con `passwd`. Esplora poi il tuo ambiente:

```bash
pwd
ls -la
cd ~/www
ls -la
php --version
php --ini
```

La versione indicata dal terminale riguarda PHP CLI. Confrontala con quella
mostrata via web da `phpinfo()`: i due servizi possono avere configurazioni diverse.

Il riferimento del corso è PHP 8.3; controlla la versione assegnata sul server
prima di usare funzioni che richiedono una versione specifica. Il repository
Web4Student descrive lo stack, ma non sostituisce la verifica dell'istanza in uso.

<!--
Note del docente:
Eseguire i comandi senza privilegi di amministrazione. Non è necessario che ogni studente installi il container Web4Student sul proprio computer per usare l'istanza del corso.
-->

---

# Trasferire gli esempi del corso

I comandi seguenti sono una procedura di lavoro per questo repository.
Eseguili **dal terminale locale**, nella cartella principale del progetto,
dopo aver verificato che `~/www` esista sul server:

```bash
scp -P 2222 www/index.php username@w4s.filippobilardo.it:www/
scp -P 2222 -r www/01-hello-php www/02-pagina-riservata username@w4s.filippobilardo.it:www/
```

`scp` usa `-P` maiuscola per la porta; `ssh` usa `-p` minuscola. Prima di
trasferire un file con lo stesso nome conserva eventuali modifiche già presenti
nella tua area web.

Apri quindi:

```text
https://w4s.filippobilardo.it/~username/
https://w4s.filippobilardo.it/~username/01-hello-php/
https://w4s.filippobilardo.it/~username/02-pagina-riservata/
```

Il server del servizio è già attivo: per questi URL non devi avviare
`php -S` sulla porta 8000. I sorgenti del corso restano nel repository;
nell'area pubblica trasferisci il contenuto necessario di `www`.

---

# Modificare un file sul server

Se preferisci lavorare direttamente nella sessione SSH:

```bash
cd ~/www/01-hello-php
nano index.php
php -l index.php
```

Modifica il saluto, salva il file e ricarica la pagina personale. Il controllo
`php -l` verifica la sintassi, ma non esegue una richiesta HTTP né prova il login.

---

# Database e configurazioni condivise

Il servizio documenta database personali e l'accesso tramite Adminer. Usa nome
del database, server e credenziali assegnati; i parametri per una connessione
dal terminale esterno possono differire da quelli usati da PHP sul server.
Consulta la [sezione accesso di Web4Student](https://w4s.filippobilardo.it/#access).

Gli esempi iniziali non richiedono un database. In questa fase basta verificare
di poter accedere agli strumenti previsti per il proprio account.

La configurazione globale di Apache e PHP è responsabilità dell'amministratore.
Per studiare modifiche ai servizi usa un ambiente locale amministrabile o il
laboratorio indicato dal docente.

## Attività

Per svolgere la prima pubblicazione passo per passo, segui
l'[esercizio guidato Hello World su Web4Student](esercizi/01_Hello_World_Web4Student.md).
Prosegui poi con [Git e GitHub per l'intera cartella www](esercizi/02_Git_e_GitHub.md).

1. Pubblica gli esempi e verifica il saluto, il login e il logout.
2. Annota versione PHP CLI, versione PHP web e cartella pubblica.
3. Spiega perché `~/www/index.php` e l'URL del sito personale sono riferimenti diversi.
4. Confronta l'URL personale con `http://localhost:8000` usato in locale.

---

[Guida precedente: Componenti e strumenti](01-componenti_e_strumenti.md) · [Indice](README.md) · [Guida successiva: php.ini](03-configurazione_php_ini.md)
