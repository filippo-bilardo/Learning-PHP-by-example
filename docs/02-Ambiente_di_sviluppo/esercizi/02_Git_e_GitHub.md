# Esercizio b: Git e GitHub per l'intera cartella www

## Obiettivo

Creare un repository personale che contenga **l'intera cartella `www`**, con
tutte le pagine, le sottocartelle e le risorse del proprio sito Web4Student.
L'unità di lavoro è il sito completo, non soltanto il file Hello World.

## Prerequisiti e risultato finale

Completa [Hello World su Web4Student](01_Hello_World_Web4Student.md) e prepara
il tuo account GitHub. Tutti i comandi, dopo il collegamento SSH, si eseguono
nel terminale **Web4Student**, salvo diversa indicazione.

La struttura da ottenere è:

```text
~/www/
├── .git/
├── .gitignore
├── README.md
├── tmp/                    file temporanei, esclusi da Git
├── es01a-hello-world/
│   └── index.php
├── es01b-hello-world/
│   └── index.php
└── ... tutte le altre cartelle e risorse del proprio sito
```

La cartella `~/www` esiste già ed è sia la directory di lavoro sia l'area
pubblicata da Web4Student. Il repository viene inizializzato direttamente qui:
su GitHub comparirà il suo contenuto, senza un ulteriore livello `www`.

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
di procedere. Se `~/www` è già un repository, riutilizzalo; non creare repository
annidati nelle cartelle dei singoli esercizi.

## Passo 2 — Preparare tmp e la pagina es01b-hello-world

Usa la cartella `www` già presente nel tuo account:

```bash
cd ~/www
pwd
ls -la
```

Il percorso mostrato da `pwd` deve terminare con `/www`. Non devi creare
una cartella di progetto né copiare il sito in un'altra posizione.

Crea soltanto la sottocartella per i file temporanei:

```bash
mkdir -p tmp
ls -ld tmp
```

Useremo `tmp` per dati di prova che non devono essere versionati. Al passo 5
creerai `.gitignore` per escluderne tutto il contenuto. Da ora lavora
direttamente sui sorgenti in `~/www`.

### Creare la pagina dell'esercizio b

Sempre da `~/www`, crea la sottocartella e apri il nuovo file:

```bash
mkdir -p es01b-hello-world
nano es01b-hello-world/index.php
```

Inserisci il codice seguente, sostituendo `Mario` con il tuo nome:

```php
<?php
declare(strict_types=1);

$nome = 'Mario';
$messaggio = "Hello World dell'esercizio b.";
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esercizio b — Hello World</title>
</head>
<body>
    <h1><?php echo 'Hello, World!'; ?></h1>
    <p>Studente: <?= $nome ?></p>
    <p><?= $messaggio ?></p>
</body>
</html>
```

Salva con `Ctrl+O`, conferma con `Invio` ed esci con `Ctrl+X`.
Controlla la sintassi:

```bash
php -l es01b-hello-world/index.php
```

Apri nel browser il tuo URL personale:

```text
https://w4s.filippobilardo.it/~username/es01b-hello-world/
```

**Verifica:** compaiono **Hello, World!**, il tuo nome e il messaggio
**Hello World dell'esercizio b.** La nuova pagina entrerà nel primo commit
insieme a tutti gli altri sorgenti di `www`.

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
non sono credenziali di accesso. Sono impostazioni globali: valgono per tutti i repository Git sul server Web4Student.

## Passo 4 — Preparare l'autenticazione SSH verso GitHub

**Scegli una delle due procedure alternative:** questo passo configura una
chiave senza passphrase, utilizzabile su un PC con **account personale protetto**
e accesso riservato ai propri file. Il **Passo 4 bis** configura invece una
chiave con passphrase, da preferire sul PC della scuola quando altre persone
potrebbero accedere al file della chiave privata. Dopo la procedura scelta,
prosegui con il Passo 5.

### Perché creare una chiave SSH?

Quando esegui `git push`, GitHub deve riconoscere il tuo account e verificare
che possa scrivere nel repository. Il nome e l'email configurati nel passo 3
identificano l'autore dei commit, ma **non permettono di accedere a GitHub**.

La chiave SSH serve ad autenticare la connessione tra Web4Student e GitHub.
Dopo la configurazione puoi usare comandi come `git push` e `git pull` con
l'URL SSH del repository, senza inserire ogni volta le credenziali GitHub.
`git commit`, invece, registra una versione locale e non richiede una connessione
a GitHub. Riferimento: [autenticazione SSH su GitHub](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/about-ssh).

### Una coppia di chiavi con due compiti diversi

`ssh-keygen` crea due file collegati tra loro:

| File | Dove rimane | A cosa serve |
|---|---|---|
| `w4s_github_ed25519` — chiave privata | Nella tua cartella `~/.ssh` su Web4Student | Permette al client SSH di dimostrare il possesso della chiave |
| `w4s_github_ed25519.pub` — chiave pubblica | Viene copiata nelle impostazioni del tuo account GitHub | Permette a GitHub di verificare l'autenticazione e associarla al tuo account |

La chiave privata non va incollata su GitHub né aggiunta al repository.
Registrare quella pubblica non concede nuovi permessi: puoi fare push soltanto
nei repository su cui il tuo account ha già il diritto di scrittura.

### Perché la chiave viene creata su Web4Student?

In questo esercizio i comandi Git vengono eseguiti sul server Web4Student:
è quindi quel server a dover presentare la tua chiave a GitHub. Una chiave
presente soltanto sul tuo computer non viene automaticamente usata dalla
sessione remota.

Le connessioni sono distinte:

| Collegamento | Account e porta |
|---|---|
| Computer → Web4Student | `username`, porta 2222 |
| Web4Student → GitHub | Utente SSH `git`, normalmente porta 22 |

Il primo accesso ti porta nel tuo account Web4Student; il secondo ti identifica
su GitHub tramite la chiave. Nell'indirizzo `git@github.com` l'utente SSH è
`git`: il tuo account GitHub viene riconosciuto dalla chiave registrata.

### Generare la coppia di chiavi

La cartella `~/.ssh` esiste già. Controlla le chiavi presenti:

```bash
ls -la ~/.ssh
```

Se non hai già una chiave adatta a GitHub, creala, il nome del file è libero:

```bash
ssh-keygen -t ed25519 -C "tua.email@example.com" -f ~/.ssh/w4s_github_ed25519 -N ""
```

| Opzione | Significato |
|---|---|
| `-t ed25519` | Sceglie l'algoritmo della coppia di chiavi |
| `-C "tua.email@example.com"` | Aggiunge un'etichetta per riconoscere la chiave; non esegue l'accesso con quell'email |
| `-f ~/.ssh/w4s_github_ed25519` | Sceglie il nome della chiave privata; la pubblica avrà lo stesso nome seguito da `.pub` |
| `-N ""` | Imposta una passphrase vuota, come previsto per il collegamento automatico di questo esercizio |

Non sovrascrivere una chiave già utilizzata. La
[guida GitHub alla generazione delle chiavi](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent)
approfondisce coppia di chiavi, nomi dei file e passphrase.

### Registrare la chiave pubblica su GitHub

Visualizza la chiave pubblica:

```bash
cat ~/.ssh/w4s_github_ed25519.pub
```

Il file con estensione **`.pub`** contiene la chiave pubblica da registrare su
GitHub. La chiave privata resta nel tuo ambiente.

**Copia l'intera chiave pubblica** (inizia con `ssh-ed25519...`) e aggiungila su GitHub:

1. Vai su [https://github.com/settings/keys](https://github.com/settings/keys)
2. Clicca su "New SSH key"
3. Dai un titolo (es: "Web4Student user")
4. Incolla la chiave nel campo "Key"
5. Clicca "Add SSH key"

### Indicare a SSH quale chiave usare

Nel terminale remoto apri `nano ~/.ssh/config` e inserisci questo blocco;
se esiste già un blocco per GitHub, integra quello esistente:

```sshconfig
Host github.com
    HostName github.com
    User git
    IdentityFile ~/.ssh/w4s_github_ed25519
    IdentitiesOnly yes
```

Salva e verifica:

> SSH userà direttamente la chiave indicata da `IdentityFile`, senza chiedere
una passphrase e senza richiedere l'avvio di `ssh-agent` a ogni sessione.
Qui “automatico” riguarda l'autenticazione: per inviare le modifiche dovrai
comunque creare i commit ed eseguire `git push`.

```bash
chmod 600 ~/.ssh/config ~/.ssh/w4s_github_ed25519
ssh -T git@github.com
```

Alla prima connessione confronta l'impronta presentata con le
[impronte ufficiali GitHub](https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/githubs-ssh-key-fingerprints).
Il messaggio di successo deve identificare il tuo account e indicare
l'autenticazione riuscita; GitHub non fornisce una shell interattiva. In questo
test il codice di uscita 1 può accompagnare l'autenticazione riuscita, come
spiegato nella [guida al test SSH](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/testing-your-ssh-connection).


CONGRATULAZIONI! La connessione SSH tra Web4Student e GitHub funziona.
Se hai scelto questa procedura, puoi proseguire direttamente con il Passo 5.

## Passo 4 bis — Creare una chiave con passphrase per il PC della scuola

Questa procedura è **alternativa al Passo 4**, non un secondo collegamento
obbligatorio. Usala quando lavori su un PC della scuola o in un ambiente in cui
altri potrebbero vedere o copiare i file del tuo account.

### Perché proteggere la chiave con una password?

La chiave privata permette di autenticarsi su GitHub. Se non ha una passphrase,
chi ne ottiene una copia può usarla senza dover sbloccare il file. La passphrase
cifra invece la chiave privata salvata: per utilizzarla serve anche conoscere
questa password. Scegli una frase lunga, difficile da indovinare e personale.

La passphrase non è la password di GitHub o di Web4Student: serve a sbloccare
**localmente il file della chiave privata**. Il nome del file e la chiave pubblica
possono essere conosciuti da altri; è la chiave privata che deve restare riservata.
Vedi la [guida GitHub alle passphrase SSH](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/working-with-ssh-key-passphrases).

### 1. Scegliere il terminale e un nome riconoscibile

Esegui i comandi nell'ambiente che userà Git:

- Se Git viene eseguito sul PC della scuola, usa il suo terminale, per esempio Git Bash su Windows: la chiave resterà nella sua cartella `~/.ssh`.
- Se Git viene eseguito nella sessione SSH Web4Student, usa quel terminale: la chiave resterà su Web4Student. Collegarsi dal PC della scuola non trasferisce automaticamente la chiave sul PC.

Nel nome della nuova chiave inserisci **il tuo nome e cognome** e il suffisso
**`_pass`**. Nell'esempio usiamo `mario_rossi`: sostituiscilo in tutti i comandi
e nella configurazione con il tuo nome, senza spazi.

```bash
ls -la ~/.ssh
ssh-keygen -t ed25519 -C "Mario Rossi - PC scuola - tua.email@example.com" -f ~/.ssh/pc_github_mario_rossi_ed25519_pass
```

Personalizza anche il commento dopo `-C`. Non aggiungere `-N ""`: in questa
procedura devi impostare una passphrase non vuota. Se il nome del file è già
occupato, scegli un nome diverso senza sovrascrivere una chiave esistente.

### 2. Inserire e confermare la passphrase

Il programma chiede:

```text
Enter passphrase (empty for no passphrase):
Enter same passphrase again:
```

Digita la passphrase alla prima richiesta e ripetila alla seconda. I caratteri
digitati non vengono mostrati nel terminale. Non scriverla nel comando, nel
README o nel repository.

Otterrai due file:

| File | Uso |
|---|---|
| `~/.ssh/pc_github_mario_rossi_ed25519_pass` | Chiave privata cifrata, da mantenere nel proprio ambiente |
| `~/.ssh/pc_github_mario_rossi_ed25519_pass.pub` | Chiave pubblica da registrare su GitHub |

Il suffisso `_pass` aiuta a riconoscere la variante: la protezione dipende dalla
passphrase impostata, non dal nome scelto.

### 3. Registrare la nuova chiave pubblica su GitHub

```bash
cat ~/.ssh/pc_github_mario_rossi_ed25519_pass.pub
```

Copia l'intera chiave pubblica e, nel browser GitHub:

1. Apri **Settings → SSH and GPG keys → New SSH key**.
2. Scegli il tipo **Authentication Key**.
3. Usa un titolo riconoscibile, per esempio `Mario Rossi - PC scuola - pass`.
4. Incolla la chiave pubblica nel campo **Key** e conferma con **Add SSH key**.

Se hai creato questa nuova coppia, devi registrare la sua chiave pubblica:
quella della variante senza passphrase appartiene a una coppia diversa.

### 4. Configurare SSH per usare la chiave protetta

Apri `~/.ssh/config` con un editor: puoi usare `nano ~/.ssh/config` nel terminale
oppure Blocco note su Windows, salvando il file come `config`, senza `.txt`.
Inserisci il blocco seguente oppure sostituisci il precedente blocco
`Host github.com`, così la connessione usa la chiave protetta:

```sshconfig
Host github.com
    HostName github.com
    User git
    IdentityFile ~/.ssh/pc_github_mario_rossi_ed25519_pass
    IdentitiesOnly yes
    IdentityAgent none
```

`IdentityFile` seleziona la chiave con il tuo nome e `_pass`. Per questa prova
su un PC condiviso, `IdentityAgent none` evita di usare chiavi già sbloccate
in un agente SSH: la passphrase verrà richiesta quando usi il file.
L'opzione è descritta nel [manuale OpenSSH](https://man.openbsd.org/ssh_config#IdentityAgent).

### 5. Verificare la connessione

Nel terminale dell'ambiente in cui hai configurato la chiave, esegui:

```bash
ssh -T git@github.com
```

Quando compare una richiesta simile alla seguente, digita la passphrase:

```text
Enter passphrase for key '.../pc_github_mario_rossi_ed25519_pass':
```

**Verifica:** dopo lo sblocco GitHub riconosce il tuo account. Anche `git push`
e `git pull` tramite SSH richiederanno lo sblocco della chiave con questa
configurazione. Ora puoi continuare dal Passo 5.

### Quale alternativa usare?

| Situazione | Procedura |
|---|---|
| PC con account personale protetto e file accessibili soltanto al proprietario | Passo 4: chiave senza passphrase, per il collegamento automatico |
| PC della scuola o ambiente in cui altri potrebbero accedere al file privato | Passo 4 bis: chiave con nome personale, suffisso `_pass` e passphrase |

La passphrase protegge il file salvato, non una sessione già accessibile ad
altre persone: al termine del lavoro chiudi le sessioni ed esci dal tuo account.

## Passo 5 — Documentare il progetto e scegliere i file da tracciare

Torna alla cartella `www`, che sarà la radice del repository:

```bash
cd ~/www
nano README.md
```

Scrivi almeno:

```markdown
# Il mio sito PHP

Esercitazioni PHP di Nome Cognome, classe 3A.

Questo repository contiene l'intero sito: pagine PHP, HTML, CSS e altre risorse.
La prima attività è es01a-hello-world/index.php.
La pagina dell'esercizio Git e GitHub è es01b-hello-world/index.php.

Su Web4Student lavoro nella cartella personale ~/www, già pubblicata dal server.
La sottocartella tmp contiene file temporanei e viene esclusa da Git.
```

Crea il file `.gitignore` nella stessa cartella:

```bash
nano .gitignore
```

Inserisci queste regole; se il file esiste già, integrale con quelle presenti:

```gitignore
/tmp/
*.log
*.tmp
*.swp
*~
.env
.env.*
!.env.example
config.local.php
```

La regola `/tmp/` esclude la cartella temporanea nella radice del repository
e tutto il suo contenuto. Le altre regole escludono temporanei e configurazioni
locali con credenziali reali.
Gli altri sorgenti di `www`, incluse eventuali sottocartelle CSS e immagini,
devono entrare nel repository. `.gitignore` non rimuove file già tracciati.

Per verificare l'esclusione, crea un file di prova nella cartella `tmp`:

```bash
touch tmp/prova.txt
```

Lo controllerai dopo l'inizializzazione del repository.

## Passo 6 — Creare il repository locale e il primo commit

Esegui questi comandi **dentro `~/www`**, non nella sottocartella del singolo
esercizio:

```bash
cd ~/www
git init -b main            # Inizializza il repository con branch main
git rev-parse --show-toplevel       # mostra la radice del repository
git check-ignore -v tmp/prova.txt   # verifica l'esclusione del file temporaneo
git add .                   # aggiunge tutto tranne tmp
git status                  # mostra i file preparati per il commit
git diff --cached --stat    # mostra le modifiche preparate
git diff --cached           # mostra il contenuto delle modifiche preparate
```

**Verifica:** la radice termina con `/www`; `git check-ignore` indica la regola
`/tmp/`. Nell'elenco dei file compaiono tutte le risorse del sito previste,
non soltanto Hello World, mentre `tmp/prova.txt` non compare tra i file preparati
per il commit. Il file `.gitignore` deve invece essere incluso.

Se l'elenco è corretto:

```bash
git commit -m "Importa l'intera cartella www del sito PHP"
git log --oneline
git ls-files
```

L'ultimo comando elenca i file del sito effettivamente tracciati. La cartella
`tmp` resta disponibile sul server ma, essendo ignorata, non viene trasferita
con un clone: potrai ricrearla con `mkdir -p tmp`.
Git registra file, non cartelle vuote. Vedi i manuali di
[git init](https://git-scm.com/docs/git-init) e [git add](https://git-scm.com/docs/git-add).

## Passo 7 — Creare il repository vuoto su GitHub

**Dove:** browser, nel tuo account GitHub.

1. Crea un nuovo repository chiamato `siti-php-nomestudente`.
2. Scegli la visibilità secondo le indicazioni del corso.
3. Non aggiungere da GitHub README, `.gitignore` o licenza: il repository remoto deve partire vuoto.
4. Copia l'URL SSH, nella forma `git@github.com:TUO-ACCOUNT/siti-php-nomestudente.git`.

`TUO-ACCOUNT` è l'account GitHub, che può essere diverso dallo username Web4Student.
Questa procedura segue la [guida GitHub all'importazione di codice locale](https://docs.github.com/en/migrations/importing-source-code/using-the-command-line-to-import-source-code/adding-locally-hosted-code-to-github).

## Passo 8 — Collegare il remoto e fare push

Nel terminale Web4Student, dalla cartella `~/www`:

```bash
cd ~/www
git remote add origin git@github.com:TUO-ACCOUNT/siti-php-nomestudente.git
git remote -v
git push -u origin main
```

Aggiorna la pagina GitHub del repository. Devi vedere `README.md`, `.gitignore`
e **tutto il contenuto versionato di `www`**, con `es01a-hello-world` ed
`es01b-hello-world` direttamente alla radice. Apri `es01b-hello-world/index.php`
e confrontalo con il tuo file.
La cartella `tmp` e i suoi file non devono comparire.

`git push` invia i commit: non invia automaticamente modifiche non ancora
registrate. Le pagine Web4Student leggono invece i file già presenti in `~/www`,
indipendentemente dal push.

CONGRATULAZIONI! Hai completato l'importazione del sito su GitHub e puoi passare al passo successivo.

## Passo 9 — Registrare una modifica

Modifica direttamente il file del sito, sempre da `~/www`:

```bash
nano es01b-hello-world/index.php
```

Cambia il valore del messaggio in:

```php
$messaggio = 'Hello World sotto controllo versione con Git.';
```

Poi controlla, registra e invia:

```bash
php -l es01b-hello-world/index.php
git diff -- es01b-hello-world/index.php
git add .
git commit -m "Aggiorna il messaggio di Hello World"
git push
git log --oneline -2
```

**Verifica:** GitHub mostra due commit e il nuovo messaggio nel sorgente.

CONGRATULAZIONI! Hai completato la modifica e il push su GitHub. Puoi passare al passo successivo.

## Passo 10 — Verificare il sito pubblicato e i file esclusi

Il file modificato si trova già nella cartella pubblicata. Non devi copiarlo
in un'altra directory. Riapri l'URL personale:

```text
https://w4s.filippobilardo.it/~username/es01b-hello-world/
```

Ora deve comparire il nuovo messaggio.

Controlla anche lo stato del repository e l'esclusione del file temporaneo:

```bash
git status
git check-ignore -v tmp/prova.txt
git ls-files -- tmp
```

L'ultimo comando non deve elencare file. `.gitignore` esclude `tmp` dal controllo
di versione, ma non ne impedisce l'accesso via web: non usarla per conservare
credenziali o dati riservati.

## Comandi da usare durante il lavoro

| Azione | Comando da `~/www` |
|---|---|
| Controllare lo stato | `git status` |
| Leggere modifiche non ancora preparate | `git diff` |
| Preparare modifiche all'intero sito | `git add .` |
| Registrare una versione | `git commit -m "Descrizione della modifica"` |
| Inviare i commit | `git push` |
| Leggere la cronologia | `git log --oneline` |
| Ricevere aggiornamenti senza merge automatici | `git pull --ff-only` dopo aver completato e salvato il proprio lavoro |

Se un push viene rifiutato perché il remoto è avanzato, controlla lo stato
e ricevi gli aggiornamenti. Se `--ff-only` segnala storie divergenti, confronta
le modifiche prima di integrare: non serve un push forzato per questo esercizio.

## Consegna e autovalutazione

Consegna URL del repository, URL della pagina `es01b-hello-world` su Web4Student e identificativi
dei due commit. Verifica che il repository comprenda anche gli altri file
del sito presenti in `www`.

Spiega:

1. Quale cartella costituisce la radice del repository e dove vengono modificati i file del sito?
2. Che cosa cambia tra salvare un file, fare commit e fare push?
3. Perché il sito mostra una modifica salvata in `~/www` anche prima del push?
4. Quale file della coppia SSH viene registrato su GitHub?
5. Quale regola esclude `tmp` e come puoi verificarne l'effetto?

---

[Esercizio precedente: Hello World](01_Hello_World_Web4Student.md) · [Indice](README.md) · [Esercizio successivo: Codespaces](03_GitHub_Codespaces.md)
