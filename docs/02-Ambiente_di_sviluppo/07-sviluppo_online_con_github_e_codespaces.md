# Sviluppo online con GitHub e Codespaces

**Git** registra le versioni dei file. **GitHub** ospita i repository e gli
strumenti di collaborazione. **GitHub Codespaces** offre un ambiente di sviluppo
remoto, accessibile dal browser o da Visual Studio Code, in cui eseguire il progetto.

Un Codespace è un ambiente di lavoro con processi e terminale, non soltanto
un editor di testo. La [presentazione ufficiale](https://docs.github.com/en/codespaces/about-codespaces/what-are-codespaces)
ne descrive il funzionamento.

---

# Preparare la propria copia

1. Accedi a GitHub con il tuo account.
2. Apri il [repository del corso](https://github.com/filippo-bilardo/Learning-PHP-by-example).
3. Se vuoi salvare il lavoro nel tuo account, crea un **fork**, salvo diverse istruzioni del docente.
4. Nel repository su cui lavori seleziona **Code → Codespaces → Create codespace** per il ramo scelto.
5. Attendi che il container sia pronto.

Disponibilità e autorizzazioni possono dipendere dall'account o dall'organizzazione.
La [guida introduttiva Codespaces](https://docs.github.com/en/codespaces/quickstart)
mostra la creazione e l'accesso all'ambiente.

---

# La configurazione di questo progetto

Il file [devcontainer.json](../../.devcontainer/devcontainer.json) definisce:

| Impostazione | Valore nel repository |
|---|---|
| Immagine | Ambiente PHP 8.3 basato su Debian Bookworm |
| Strumenti aggiuntivi | Driver e client MySQL, servizio MySQL 8.4 tramite Docker Compose ed estensioni VS Code per PHP |
| Porte inoltrate | 8000 per PHP e 3306 per il database |
| Cartella pubblica | `www` nel workspace |
| Avvio del server | `postStartCommand` |
| Log del server | `/tmp/php-course-server.log` |

`postCreateCommand` esegue Composer soltanto se è presente `composer.json`.
`postStartCommand` avvia il server integrato PHP ogni volta che parte il container.
La configurazione del corso non usa Apache o Nginx per questi esempi.

I dev container rendono dichiarabili gli strumenti dell'ambiente: vedi la
[guida GitHub ai dev container](https://docs.github.com/en/codespaces/setting-up-your-project-for-codespaces/adding-a-dev-container-configuration/introduction-to-dev-containers).

---

# Aprire gli esempi

Apri il pannello **Ports**, individua la porta **8000** e usa **Open in Browser**.
Segui i link **Hello PHP** e **Pagina riservata** dalla pagina iniziale.

L'URL inoltrato identifica il tuo Codespace: non usare quello di un compagno
per verificare le tue modifiche. Il browser locale non raggiunge il terminale
remoto tramite il proprio `localhost` senza il meccanismo di inoltro.

Mantieni la visibilità della porta adatta al lavoro personale; per questi esempi
non serve renderla pubblica. Il database è un servizio separato e non si apre
nel browser come una pagina web.

La [guida all'inoltro delle porte](https://docs.github.com/en/codespaces/developing-in-a-codespace/forwarding-ports-in-your-codespace)
spiega apertura, visibilità ed etichette.

---

# Terminale e diagnosi

Dalla cartella principale del progetto:

```bash
php --version
php --ini
php -l www/01-hello-php/index.php
git status
tail -n 30 /tmp/php-course-server.log
```

Se il server non è già attivo, avvialo manualmente:

```bash
php -S 0.0.0.0:8000 -t www
```

Se la porta risulta occupata, controlla il server già avviato dal progetto.
Se modifichi `devcontainer.json`, usa il comando **Codespaces: Rebuild Container**
per ricreare l'ambiente con la configurazione aggiornata. Vedi anche le
[istruzioni del repository](../../.devcontainer/README.md).

---

# Salvare il lavoro nel repository

Dopo una modifica al saluto, controlla il diff. Questi comandi registrano e
inviano la modifica al repository remoto sul quale hai i permessi di scrittura:

```bash
git status
git diff -- www/01-hello-php/index.php
git add www/01-hello-php/index.php
git commit -m "Personalizza il saluto PHP"
git push
```

Un salvataggio nell'editor aggiorna i file del workspace; un commit registra
la versione nella copia Git; il push la invia al remoto. Verifica su GitHub
che la modifica sia arrivata prima di eliminare l'ambiente.

I file del workspace persistono durante normali arresti e riavvii del Codespace;
eliminare il Codespace può far perdere modifiche non inviate. Percorsi temporanei
e modifiche esterne al workspace hanno regole diverse durante una ricostruzione.
Vedi il [ciclo di vita](https://docs.github.com/en/codespaces/about-codespaces/understanding-the-codespace-lifecycle)
e la [persistenza dei file](https://docs.github.com/en/codespaces/developing-in-a-codespace/persisting-environment-variables-and-temporary-files).

---

# GitHub Pages e gestione delle risorse

**GitHub Pages distribuisce siti statici**: non esegue direttamente gli script
PHP del corso. Il repository conserva i sorgenti; Codespaces li esegue durante
lo sviluppo. La [descrizione di GitHub Pages](https://docs.github.com/en/pages/getting-started-with-github-pages/what-is-github-pages)
chiarisce il modello di pubblicazione statica.

Quando hai finito, ferma il Codespace dall'interfaccia di gestione. Tempo di
calcolo, spazio e condizioni di utilizzo dipendono dal piano e dalle politiche
dell'account: controlla i limiti correnti nella [documentazione Codespaces](https://docs.github.com/en/codespaces/about-codespaces/what-are-codespaces),
senza considerare l'ambiente un hosting permanente.

## Attività

Modifica il saluto, controllalo dalla porta 8000, registra la modifica con Git
e verifica il risultato sul tuo repository. Spiega la differenza tra salvare,
fare commit e fare push, e perché GitHub Pages non sostituisce questo ambiente.

---

[Guida precedente: XAMPP](06-ambiente_locale_con_xampp.md) · [Indice](README.md) · [Guida successiva: Altre soluzioni online](08-altre_soluzioni_online.md)
