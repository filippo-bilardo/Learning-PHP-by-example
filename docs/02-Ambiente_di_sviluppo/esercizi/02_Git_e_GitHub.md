# Esercizio 02: Git e GitHub per l'intera cartella www

## Obiettivo

Creare un repository personale che contenga **l'intera cartella `www`**, con
tutte le pagine, le sottocartelle e le risorse del proprio sito Web4Student.
L'unità di lavoro è il sito completo, non soltanto il file Hello World.

Il percorso riprende l'esercizio Git del corso JavaScript: configurazione,
autenticazione SSH, primo commit, repository remoto e aggiornamenti successivi.
Qui lo applichiamo a un sito PHP, preparando anche il successivo lavoro in
Codespaces.

## Prerequisiti e risultato finale

Completa [Hello World su Web4Student](01_Hello_World_Web4Student.md) e prepara
il tuo account GitHub. Tutti i comandi, dopo il collegamento SSH, si eseguono
nel terminale **Web4Student**, salvo diversa indicazione.

La struttura da ottenere è:

```text
~/progetti/sito-php-studente/
├── .git/
├── .gitignore
├── README.md
└── www/
    ├── 01-hello-world/
    │   └── index.php
    └── ... tutte le altre cartelle e risorse del proprio sito
```

Questa directory di lavoro è esterna a `~/www`, che resta la copia pubblicata
da Apache. In questo modo la cronologia `.git` non viene collocata nell'area web.
Su GitHub la cartella `www` sarà visibile alla radice del repository.

## Passo 1 — Collegarsi e verificare gli strumenti

Dal computer locale:

```bash
ssh -p 2222 username@w4s.filippobilardo.it
```

Nel terminale remoto:

```bash
git --version
php --version
ls -la ~/www
find ~/www -name .git -print
```

Il percorso guidato parte da un sito che non contiene già repository Git.
Se l'ultimo comando elenca una `.git`, individua il repository esistente prima
di procedere: non copiarlo dentro un nuovo repository come se fosse una cartella
di normali sorgenti.

## Passo 2 — Preparare il progetto con tutta www

Crea una nuova directory di lavoro:

```bash
mkdir -p ~/progetti
mkdir ~/progetti/sito-php-studente
```

Se `sito-php-studente` esiste già, scegli un nome libero e usalo coerentemente
nei passi successivi. Poi copia l'intera area del sito:

```bash
cd ~/progetti/sito-php-studente
mkdir www
cp -a ~/www/. www/
find www -type f
```

Il punto dopo `~/www/` fa copiare il contenuto, inclusi i file nascosti.
Il risultato deve essere `sito-php-studente/www/01-hello-world/index.php`,
senza un ulteriore livello `www/www`.

Da questo momento modifica i sorgenti in `~/progetti/sito-php-studente/www`.
La pubblicazione su Web4Student verrà aggiornata esplicitamente al passo 10.

## Passo 3 — Configurare l'identità Git

Sul proprio account Web4Student, configura nome ed email per i commit:

```bash
git config --global user.name "Nome Cognome"
git config --global user.email "tua.email@example.com"
git config --global init.defaultBranch main
git config --global --get user.name
git config --global --get user.email
```

Usa l'email associata all'account GitHub oppure il tuo indirizzo `noreply`
fornito dalle impostazioni GitHub. Questi dati identificano l'autore dei commit;
non sono credenziali di accesso.

## Passo 4 — Preparare l'autenticazione SSH verso GitHub

Le connessioni sono distinte:

| Collegamento | Account e porta |
|---|---|
| Computer → Web4Student | `username`, porta 2222 |
| Web4Student → GitHub | Utente SSH `git`, normalmente porta 22 |

Controlla prima le chiavi già presenti:

```bash
mkdir -p ~/.ssh
chmod 700 ~/.ssh
ls -la ~/.ssh
```

Se non hai già una chiave adatta a GitHub e il nome scelto è libero, creala:

```bash
ssh-keygen -t ed25519 -C "tua.email@example.com" -f ~/.ssh/w4s_github_ed25519
```

Scegli una passphrase e conservala. Per caricare la chiave nell'agente della
sessione:

```bash
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/w4s_github_ed25519
cat ~/.ssh/w4s_github_ed25519.pub
```

Il file con estensione **`.pub`** contiene la chiave pubblica da registrare su
GitHub. La chiave privata e la passphrase restano nel tuo ambiente.
Riferimento: [generazione della chiave e ssh-agent](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent).

**Nel browser GitHub:** apri **Settings → SSH and GPG keys → New SSH key**,
scegli una chiave di autenticazione, assegna un titolo come `Web4Student` e
incolla la chiave pubblica completa. Vedi la [procedura ufficiale](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key-to-your-github-account).

Nel terminale remoto apri `nano ~/.ssh/config` e inserisci questo blocco;
se esiste già un blocco per GitHub, integra quello esistente:

```sshconfig
Host github.com
    HostName github.com
    User git
    IdentityFile ~/.ssh/w4s_github_ed25519
    IdentitiesOnly yes
    AddKeysToAgent yes
```

Salva e verifica:

```bash
chmod 600 ~/.ssh/config
ssh -T git@github.com
```

Alla prima connessione confronta l'impronta presentata con le
[impronte ufficiali GitHub](https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/githubs-ssh-key-fingerprints).
Il messaggio di successo deve identificare il tuo account e indicare
l'autenticazione riuscita; GitHub non fornisce una shell interattiva. In questo
test il codice di uscita 1 può accompagnare l'autenticazione riuscita, come
spiegato nella [guida al test SSH](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/testing-your-ssh-connection).

In una nuova sessione potresti dover avviare di nuovo l'agente e usare `ssh-add`.
Non devi generare una nuova chiave a ogni accesso.

## Passo 5 — Documentare il progetto e scegliere i file da tracciare

Torna alla radice del progetto:

```bash
cd ~/progetti/sito-php-studente
nano README.md
```

Scrivi almeno:

```markdown
# Il mio sito PHP

Esercitazioni PHP di Nome Cognome, classe 3A.

La cartella www contiene l'intero sito: pagine PHP, HTML, CSS e altre risorse.
La prima attività è www/01-hello-world/index.php.

Su Web4Student il sito viene pubblicato nella cartella personale ~/www.
```

Crea poi `nano .gitignore` con:

```gitignore
*.log
*.tmp
*.swp
*~
.env
.env.*
!.env.example
config.local.php
```

Questo file esclude temporanei e configurazioni locali con credenziali reali.
Gli altri sorgenti di `www`, incluse eventuali sottocartelle CSS e immagini,
devono entrare nel repository. `.gitignore` non rimuove file già tracciati.

## Passo 6 — Creare il repository locale e il primo commit

Esegui questi comandi **nella radice `sito-php-studente`**, non dentro il singolo
esercizio e non dentro la cartella pubblicata `~/www`:

```bash
git init -b main
git rev-parse --show-toplevel
git add -- www README.md .gitignore
git status
git diff --cached --stat
git diff --cached
```

**Verifica:** la radice termina con `progetti/sito-php-studente`; nell'elenco
dei file compaiono tutte le risorse del sito previste, non soltanto Hello World.

Se l'elenco è corretto:

```bash
git commit -m "Importa l'intera cartella www del sito PHP"
git log --oneline
git ls-files -- www
```

L'ultimo comando elenca i file di `www` effettivamente tracciati.
Git registra file, non cartelle vuote. Vedi i manuali di
[git init](https://git-scm.com/docs/git-init) e [git add](https://git-scm.com/docs/git-add).

## Passo 7 — Creare il repository vuoto su GitHub

**Dove:** browser, nel tuo account GitHub.

1. Crea un nuovo repository chiamato `sito-php-studente`.
2. Scegli la visibilità secondo le indicazioni del corso.
3. Non aggiungere da GitHub README, `.gitignore` o licenza: il repository remoto deve partire vuoto.
4. Copia l'URL SSH, nella forma `git@github.com:TUO-ACCOUNT/sito-php-studente.git`.

`TUO-ACCOUNT` è l'account GitHub, che può essere diverso dallo username Web4Student.
Questa procedura segue la [guida GitHub all'importazione di codice locale](https://docs.github.com/en/migrations/importing-source-code/using-the-command-line-to-import-source-code/adding-locally-hosted-code-to-github).

## Passo 8 — Collegare il remoto e fare push

Nel terminale Web4Student, dalla radice del progetto:

```bash
git remote add origin git@github.com:TUO-ACCOUNT/sito-php-studente.git
git remote -v
git push -u origin main
```

Aggiorna la pagina GitHub del repository. Devi vedere `README.md`, `.gitignore`
e **`www` con tutto il sito**. Apri `www/01-hello-world/index.php` e confrontalo
con il tuo file.

`git push` invia i commit: non invia automaticamente modifiche non ancora
registrate e non pubblica la pagina sul server Web4Student.

## Passo 9 — Registrare una modifica

Modifica la copia di lavoro:

```bash
nano www/01-hello-world/index.php
```

Cambia il valore del messaggio in:

```php
$messaggio = 'Hello World sotto controllo versione con Git.';
```

Poi controlla, registra e invia:

```bash
php -l www/01-hello-world/index.php
git diff -- www/01-hello-world/index.php
git add -- www
git commit -m "Aggiorna il messaggio di Hello World"
git push
git log --oneline -2
```

**Verifica:** GitHub mostra due commit e il nuovo messaggio nel sorgente.

## Passo 10 — Aggiornare la copia pubblicata

Dalla stessa directory di lavoro:

```bash
cp -a www/. ~/www/
```

Riapri l'URL personale `https://w4s.filippobilardo.it/~username/01-hello-world/`.
Ora deve comparire il nuovo messaggio.

La copia trasferisce il contenuto di `www`, senza portare `.git` nella cartella
pubblica. Aggiunge e aggiorna file; non elimina automaticamente dalla pubblicazione
i file rimossi dal repository. In questa attività modifichiamo soltanto il messaggio.

## Comandi da usare durante il lavoro

| Azione | Comando dalla radice del progetto |
|---|---|
| Controllare lo stato | `git status` |
| Leggere modifiche non ancora preparate | `git diff` |
| Preparare modifiche all'intero sito | `git add -- www` |
| Registrare una versione | `git commit -m "Descrizione della modifica"` |
| Inviare i commit | `git push` |
| Leggere la cronologia | `git log --oneline` |
| Ricevere aggiornamenti senza merge automatici | `git pull --ff-only` dopo aver completato e salvato il proprio lavoro |

Se un push viene rifiutato perché il remoto è avanzato, controlla lo stato
e ricevi gli aggiornamenti. Se `--ff-only` segnala storie divergenti, confronta
le modifiche prima di integrare: non serve un push forzato per questo esercizio.

## Consegna e autovalutazione

Consegna URL del repository, URL della pagina Web4Student e identificativi
dei due commit. Verifica che il repository comprenda anche gli altri file
del sito presenti in `www`.

Spiega:

1. Perché il progetto Git si trova fuori dalla cartella pubblicata?
2. Che cosa cambia tra salvare un file, fare commit e fare push?
3. Perché il solo push non aggiorna il sito Web4Student?
4. Quale file della coppia SSH viene registrato su GitHub?

---

[Esercizio precedente: Hello World](01_Hello_World_Web4Student.md) · [Indice](README.md) · [Esercizio successivo: Codespaces](03_GitHub_Codespaces.md)
