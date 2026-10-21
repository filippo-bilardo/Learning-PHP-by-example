# Esercizio c: sviluppare il sito con GitHub Codespaces

## Obiettivo

Aprire in Codespaces il repository personale creato nell'esercizio precedente,
avviare il server web e creare la pagina `es01c-hello-world/index.php`,
quindi riportare il risultato su GitHub e Web4Student.

Riferimento teorico:
[Sviluppo online con GitHub e Codespaces](../07-sviluppo_online_con_github_e_codespaces.md).

La teoria descrive anche la configurazione del repository completo del corso,
che usa Docker Compose e un servizio MySQL. Qui lavoriamo sul tuo repository
`sito-php-studente`: per Hello World bastano PHP e la porta 8000, senza database.

## Prerequisiti

- Aver completato [Git e GitHub per l'intera www](02_Git_e_GitHub.md).
- Avere il repository personale su GitHub con `es01a-hello-world/index.php` ed `es01b-hello-world/index.php` alla radice.
- Poter creare un Codespace con il proprio account o con l'organizzazione del corso.

Non creare un altro repository per il singolo Hello World: prosegui con quello
che contiene l'intero sito.

## Come corrispondono i percorsi

`~/www` è la cartella pubblica sul server Web4Student ed è anche la radice
del suo repository Git. Su GitHub sono presenti direttamente i suoi file
e le sue sottocartelle: non c'è un ulteriore livello `www`.

| Ambiente | Percorso della pagina dell'esercizio b |
|---|---|
| Web4Student | `~/www/es01b-hello-world/index.php` |
| Repository GitHub | `es01b-hello-world/index.php` |
| Codespace | `es01b-hello-world/index.php`, dalla radice del workspace |

In Codespaces la cartella pubblica sarà quindi la **radice del repository**,
non una sottocartella `www`.

## Passo 1 — Aggiungere la configurazione PHP al progetto

**Dove:** terminale SSH su Web4Student, dentro `~/www`, come nell'esercizio b.

```bash
cd ~/www
git status
mkdir -p .devcontainer
nano .devcontainer/devcontainer.json
```

Prima completa eventuali modifiche ancora aperte. Se esiste già una
configurazione del progetto, leggila e adattala invece di sovrascriverla.
Per il nuovo progetto di questa esercitazione inserisci:

```json
{
  "name": "Sito PHP dello studente",
  "image": "mcr.microsoft.com/devcontainers/php:1-8.3-bookworm",
  "forwardPorts": [8000],
  "portsAttributes": {
    "8000": {
      "label": "Sito PHP",
      "onAutoForward": "openBrowser"
    }
  },
  "postStartCommand": "nohup php -S 0.0.0.0:8000 -t \"${containerWorkspaceFolder}\" > /tmp/php-course-server.log 2>&1 < /dev/null &",
  "remoteUser": "vscode"
}
```

La struttura versionata ora comprende:

```text
sito-php-studente/
├── .devcontainer/
│   └── devcontainer.json
├── .gitignore
├── README.md
├── es01a-hello-world/
│   └── index.php
└── es01b-hello-world/
    └── index.php
```

| Impostazione | Significato |
|---|---|
| `image` | Ambiente con PHP 8.3 |
| `forwardPorts` | Porta da rendere raggiungibile tramite l'inoltro Codespaces |
| `postStartCommand` | Avvia il server PHP usando la radice del workspace come cartella pubblica |
| `${containerWorkspaceFolder}` | Percorso del repository nel container, sostituito da Dev Containers; contiene già i file del sito |
| `/tmp/php-course-server.log` | Log del server avviato automaticamente |

Per le opzioni generali consulta la [configurazione PHP per Codespaces](https://docs.github.com/en/codespaces/setting-up-your-project-for-codespaces/adding-a-dev-container-configuration/setting-up-your-php-project-for-codespaces).

## Passo 2 — Inviare la configurazione a GitHub

Sempre dalla radice del progetto su Web4Student:

```bash
git diff
git add -- .devcontainer/devcontainer.json
git diff --cached
git commit -m "Configura Codespaces per il sito PHP"
git push
```

**Verifica nel browser GitHub:** sul ramo `main` compare il file
`.devcontainer/devcontainer.json` accanto alle cartelle `es01a-hello-world`
ed `es01b-hello-world`.
La configurazione deve arrivare nel repository prima di creare il Codespace.

## Passo 3 — Creare il Codespace

**Dove:** browser, nel tuo repository GitHub `sito-php-studente`.

1. Seleziona il ramo `main` aggiornato.
2. Apri **Code → Codespaces**.
3. Scegli **Create codespace on main**.
4. Attendi la preparazione dell'ambiente e l'apertura dell'editor.

Se hai già un Codespace precedente alla configurazione, esegui
**Codespaces: Rebuild Container** dal pannello dei comandi per applicarla.
La [guida introduttiva ufficiale](https://docs.github.com/en/codespaces/quickstart)
mostra il flusso di creazione.

**Verifica:** nell'esplora file vedi `.devcontainer`, `README.md`,
`es01a-hello-world`, `es01b-hello-world` e gli altri file del sito direttamente
nella radice del repository.
Il terminale appartiene ora al container remoto di Codespaces, non alla sessione
SSH Web4Student e non al computer locale.

## Passo 4 — Verificare PHP e la cartella di lavoro

**Dove:** terminale integrato del Codespace, nella radice del repository.

```bash
pwd
php --version
php --ini
php -l es01b-hello-world/index.php
git status
```

Controlla che la versione sia PHP 8.3, che il file venga trovato e che il
controllo di sintassi non segnali errori. Il percorso del workspace viene
scelto dall'ambiente: non usare `cd ~/www` come se fossi ancora su Web4Student
e non creare un'altra cartella `www` nel Codespace.

## Passo 5 — Aprire la pagina dell'esercizio b tramite la porta 8000

1. Apri il pannello **Ports** nell'editor.
2. Individua la porta **8000**, etichettata **Sito PHP**.
3. Usa **Open in Browser**.
4. Aggiungi `/es01b-hello-world/` all'URL inoltrato, mantenendo il dominio assegnato dal tuo Codespace.

Il messaggio iniziale deve essere quello già salvato nell'esercizio b:
**Hello World sotto controllo versione con Git.**

Il server ascolta nel container; l'URL inoltrato lo rende raggiungibile dal
browser del tuo computer. Non usare il `localhost` del computer per cercare
un processo che gira soltanto nel Codespace. La porta può restare privata.
Vedi la [guida all'inoltro delle porte](https://docs.github.com/en/codespaces/developing-in-a-codespace/forwarding-ports-in-your-codespace).

Se manca la porta, controlla il log:

```bash
tail -n 30 /tmp/php-course-server.log
```

Se il server non è già in esecuzione, puoi avviarlo dal terminale, dalla radice
del repository:

```bash
php -S 0.0.0.0:8000 -t .
```

Se compare un errore di porta occupata, non avviare altre istanze: verifica
il servizio partito automaticamente e l'indirizzo inoltrato nel pannello Ports.
L'opzione `-t .` indica la directory corrente. L'assenza di un `index.php`
nella radice del repository non impedisce di aprire direttamente il percorso
`/es01b-hello-world/`.

## Passo 6 — Creare es01c-hello-world/index.php nel Codespace

Nel terminale del Codespace, dalla radice del repository, crea la nuova cartella:

```bash
mkdir -p es01c-hello-world
```

Nell'esplora file seleziona `es01c-hello-world`, usa **New File** e crea
`index.php`. Oppure usa il comando code index.php dal terminale:

```bash
code es01c-hello-world/index.php
```

Inserisci questo codice, sostituendo `Mario` con il tuo nome:

```php
<?php
declare(strict_types=1);

$nome = 'Mario';
$messaggio = 'Hello World creato con GitHub Codespaces.';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esercizio c — Hello World</title>
</head>
<body>
    <h1><?php echo 'Hello, World!'; ?></h1>
    <p>Studente: <?= $nome ?></p>
    <p><?= $messaggio ?></p>
</body>
</html>
```

Salva e controlla la sintassi e lo stato del nuovo file:

```bash
php -l es01c-hello-world/index.php
git status --short -- es01c-hello-world/
```

Git deve segnalare la nuova cartella come non ancora tracciata. Per vedere il
contenuto nel diff, la aggiungerai all'area di staging nel passo successivo.

Apri `/es01c-hello-world/` sullo stesso dominio inoltrato dalla porta 8000.
Non aggiungere `/www/` al percorso.

**Verifica:** compaiono **Hello, World!**, il tuo nome e il messaggio
**Hello World creato con GitHub Codespaces.** Il codice viene eseguito nel
container remoto; le pagine degli esercizi a e b restano disponibili nei loro percorsi.

## Passo 7 — Fare commit e push dal Codespace

Dal terminale del Codespace:

```bash
git add -- es01c-hello-world/index.php
git diff --cached
git commit -m "Crea es01c-hello-world da Codespaces"
git push
git status
git log --oneline -3
```

Il repository è tuo e deve consentire il push. Se viene richiesta l'identità
Git, imposta `git config user.name "Nome Cognome"` e
`git config user.email "tua.email@example.com"` per questa copia, poi ripeti
il commit. Non occorre copiare la chiave privata Web4Student nel Codespace.

**Nel browser GitHub:** apri il repository, controlla l'ultimo commit e verifica
che `es01c-hello-world/index.php` sia presente alla radice accanto alle cartelle
degli esercizi a e b. Salvare nell'editor, fare commit e fare push sono tre
passaggi distinti.

## Passo 8 — Portare la nuova pagina su Web4Student

**Dove:** terminale SSH Web4Student, non terminale del Codespace.

```bash
cd ~/www
git status --short
```

L'output deve essere vuoto. Se hai modifiche locali, completale e sincronizzale
prima di procedere, evitando di sovrascriverle. Ricevi poi i commit:

```bash
git pull --ff-only
php -l es01c-hello-world/index.php
```

Il pull crea `es01c-hello-world/index.php` direttamente in `~/www`, già pubblicata
dal server. Non serve una copia aggiuntiva e non viene creata `~/www/www`.

Apri `https://w4s.filippobilardo.it/~username/es01c-hello-world/`.
Deve comparire **Hello World creato con GitHub Codespaces.**, come nell'anteprima
del Codespace. Il testo descrive l'origine del codice e può comparire anche
quando la pagina viene eseguita da Web4Student.

```mermaid
flowchart LR
    C["Codice nel Codespace"] -->|"commit e push"| G["Repository GitHub"]
    G -->|"pull in ~/www"| W["Sito personale Web4Student"]
```

## Passo 9 — Concludere la sessione

Verifica che il push sia arrivato su GitHub, poi ferma il Codespace dalla
pagina di gestione dei tuoi Codespaces. Chiudere soltanto la scheda del browser
non equivale a richiedere l'arresto dell'ambiente.

I file non inviati restano legati alla copia di lavoro; eliminare il Codespace
può far perdere modifiche non salvate altrove. Controlla risorse e condizioni
del tuo account e il [ciclo di vita Codespaces](https://docs.github.com/en/codespaces/about-codespaces/understanding-the-codespace-lifecycle).

## Consegna e autovalutazione

Consegna URL del repository, identificativi del commit di configurazione e
del commit che crea `es01c-hello-world`, URL della nuova pagina su Web4Student e una breve descrizione
della prova sulla porta 8000. Documenta l'anteprima con uno screenshot se
richiesto dal docente, senza rendere pubblica la porta per la sola consegna.

Rispondi:

1. Perché sul server usi `~/www`, mentre nel Codespace avvii PHP con `-t .` dalla radice del repository?
2. Che differenza c'è tra terminale del Codespace e terminale SSH Web4Student?
3. Quale comando avvia il server e quale configurazione lo rende automatico?
4. Perché dopo il push da Codespaces serve un pull dentro `~/www`, ma non una copia aggiuntiva dei file?
5. Perché GitHub Pages non sostituisce il server PHP di questa attività?

---

[Esercizio precedente: Git e GitHub](02_Git_e_GitHub.md) · [Indice degli esercizi](README.md) · [Guida teorica](../07-sviluppo_online_con_github_e_codespaces.md)
