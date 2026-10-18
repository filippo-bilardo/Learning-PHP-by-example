# Configurazione di PHP e php.ini

`php.ini` raccoglie impostazioni dell'interprete: gestione degli errori, fuso
orario, limiti di memoria, caricamento delle estensioni e altri comportamenti.
Il percorso dipende dall'installazione e dalla modalità di esecuzione di PHP.

Il [manuale del file di configurazione](https://www.php.net/manual/en/configuration.file.php)
descrive la ricerca del file e il caricamento di eventuali file `.ini` aggiuntivi.

---

# Quale file viene caricato?

Nel terminale:

```bash
php --ini
php -r 'echo php_ini_loaded_file() ?: "Nessun php.ini caricato", PHP_EOL;'
```

Il primo comando mostra il file caricato e le directory dei file aggiuntivi.
Questa verifica riguarda l'interprete **CLI**, usato dal comando `php`.

Per il servizio web apri **Hello PHP** e cerca in `phpinfo()`:

- **Server API**: modalità di esecuzione dell'interprete;
- **Loaded Configuration File**: file effettivamente caricato;
- **Additional .ini files parsed**: altri file letti;
- **Local Value** e **Master Value**: valori effettivi e valori di base delle direttive.

| Ambiente | Percorso di esempio, da verificare |
|---|---|
| PHP CLI su Ubuntu | `/etc/php/8.3/cli/php.ini` |
| PHP-FPM su Ubuntu | `/etc/php/8.3/fpm/php.ini` |
| Modulo PHP di Apache su Ubuntu | `/etc/php/8.3/apache2/php.ini` |
| XAMPP su Windows | `C:\xampp\php\php.ini` |

La versione `8.3` è un esempio. Modificare il file CLI non modifica
necessariamente il servizio PHP-FPM o il modulo di Apache.

---

# Impostazioni per il laboratorio

Questo frammento mostra valori di sviluppo da confrontare con il file esistente;
non sostituisce una configurazione completa dell'installazione:

```ini
[PHP]
error_reporting = E_ALL
display_errors = On
display_startup_errors = On
log_errors = On
default_charset = "UTF-8"
memory_limit = 128M
max_execution_time = 30
upload_max_filesize = 8M
post_max_size = 10M

[Date]
date.timezone = "Europe/Rome"
```

Una riga che inizia con `;` è un commento. Le sezioni raggruppano impostazioni;
il valore di una direttiva può essere un numero, una stringa o un valore come
`On` e `Off`.

---

# Errori e log

| Direttiva | Effetto |
|---|---|
| `error_reporting` | Seleziona quali categorie di errore segnalare |
| `display_errors` | Mostra gli errori nell'output |
| `display_startup_errors` | Mostra errori di inizializzazione |
| `log_errors` | Registra gli errori nel log configurato |
| `error_log` | Indica una destinazione specifica per il log |

Nel laboratorio vedere gli errori aiuta a correggere il codice. Su un servizio
pubblico si usa normalmente `display_errors = Off` mantenendo la registrazione
degli errori, per non includere dettagli interni nelle risposte.

La destinazione del log dipende dalla configurazione: può essere un file o il
sistema di logging del servizio. Un file impostato con `error_log` deve essere
scrivibile dal processo PHP. Riferimento: [configurazione degli errori](https://www.php.net/manual/en/errorfunc.configuration.php).

---

# Limiti, data e sessioni

`memory_limit` limita la memoria utilizzabile dallo script. `max_execution_time`
imposta un limite di esecuzione, con comportamenti che dipendono dalla piattaforma
e dalla modalità PHP; non va interpretato come un limite universale a ogni attesa.

`upload_max_filesize` limita il singolo file caricato. `post_max_size` riguarda
l'intero corpo POST e deve lasciare spazio anche agli altri campi e ai dati del
formato multipart. Apache o Nginx possono imporre ulteriori limiti.
Vedi le [direttive principali](https://www.php.net/manual/en/ini.core.php).

`date.timezone` stabilisce il fuso orario predefinito. Per i login, anche
`session.save_path` è rilevante: quando il gestore delle sessioni usa file, la
cartella deve essere accessibile al processo PHP. Vedi la [configurazione delle sessioni](https://www.php.net/manual/en/session.configuration.php).

---

# Estensioni e modifiche da codice

Elenca i moduli caricati:

```bash
php -m
php --ri pdo_mysql
```

Il secondo comando funziona se `pdo_mysql` è disponibile. In base al pacchetto
usato, le estensioni possono essere abilitate nel file principale o in file
aggiuntivi; il modulo deve anche essere installato e compatibile con PHP.
Per il web controlla le sezioni corrispondenti in `phpinfo()`.

`ini_set()` può cambiare alcune direttive durante l'esecuzione dello script,
ma non tutte: la [lista ufficiale delle direttive](https://www.php.net/manual/en/ini.list.php)
specifica dove ciascuna impostazione è modificabile. Gli errori che impediscono
allo script stesso di partire non si risolvono con un `ini_set()` al suo interno.

<!--
Note del docente:
Non suggerire di decommentare estensioni a caso. Prima verificare quale interprete è in esecuzione, quali moduli sono già caricati e quali file aggiuntivi vengono letti.
-->

---

# Applicare e verificare una modifica

1. Individua il file del servizio interessato e conserva una copia dei valori precedenti.
2. Modifica una sola impostazione e salva.
3. Riavvia il servizio che esegue PHP: il server integrato, PHP-FPM oppure Apache con modulo PHP.
4. Riapri `phpinfo()` e controlla il valore effettivo.
5. Prova il comportamento interessato, per esempio l'ora mostrata dalla pagina.

Se Apache o Nginx inoltrano le richieste a PHP-FPM, modificare il `php.ini` di
FPM richiede di intervenire su FPM; ricaricare soltanto il server web non basta.
Un nuovo comando CLI legge la configurazione al proprio avvio.

Per un esperimento isolato puoi scegliere esplicitamente un file di sviluppo
collocato fuori da `www`:

```bash
php -c /percorso/php-laboratorio.ini -S 0.0.0.0:8000 -t www
```

## Attività

Confronta configurazione CLI e web, individua `date.timezone` e verifica l'effetto
di una modifica in un ambiente che puoi amministrare. Spiega perché modificare
un file `php.ini` trovato sul disco può non cambiare la pagina nel browser.

---

[Guida precedente: Web4Student](02-web4student.md) · [Indice](README.md) · [Guida successiva: Apache](04-apache_e_configurazione.md)
