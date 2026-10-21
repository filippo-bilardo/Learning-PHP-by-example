# Esercizio a: Hello World su Web4Student

## Obiettivo

Creare uno script PHP nella propria area Web4Student, controllarne la sintassi
e richiederlo dal browser. Alla fine distinguerai il file sul server dal suo URL
e il codice PHP dall'HTML ricevuto dal browser.

Riferimento teorico: [Web4Student](../02-web4student.md).

## Prima di iniziare

Prepara username e credenziali assegnati dal docente. La
[pagina pubblica Web4Student](https://w4s.filippobilardo.it/#guide) indica
l'accesso SSH sulla porta **2222**, la cartella web `~/www` e gli URL personali
con il prefisso `~username`.

Useremo una nuova sottocartella `01-hello-world`, così l'attività può convivere
con la pagina iniziale e gli altri esempi già presenti nel tuo sito.

## Passo 1 — Collegarsi al server

**Dove:** terminale del tuo computer.

Sostituisci `username` con l'account Web4Student:

```bash
ssh -p 2222 username@w4s.filippobilardo.it
```

Inserisci le credenziali quando richiesto. Dopo il collegamento i comandi
vengono eseguiti sul server remoto. Se hai una password provvisoria, segui
le istruzioni del docente per aggiornarla con `passwd`.

**Verifica:** il terminale mostra il prompt dell'account sul server.

## Passo 2 — Individuare la cartella pubblica

**Dove:** terminale SSH di Web4Student.

```bash
pwd
php --version
mkdir -p ~/www/es01a-hello-world
cd ~/www/es01a-hello-world
pwd
ls -la
```

Il primo `pwd` mostra la posizione iniziale; il secondo deve terminare con
`www/01-hello-world`. `~` indica la home del tuo account: non devi sostituirlo
con il nome della cartella del corso sul computer locale.

Se in questa sottocartella esiste già un `index.php`, leggilo prima di modificarlo
e conserva eventuale lavoro precedente.

## Passo 3 — Scrivere la pagina PHP

Apri l'editor:

```bash
nano index.php
```

Inserisci questo documento, sostituendo `Mario` con il tuo nome:

```php
<?php
declare(strict_types=1);

$nome = 'Mario';
$messaggio = 'La mia prima pagina PHP su Web4Student.';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello World — PHP</title>
</head>
<body>
    <h1><?php echo 'Hello, World!'; ?></h1>
    <p>Studente: <?= $nome?></p>
    <p><?= $messaggio ?></p>
</body>
</html>
```

Salva con `Ctrl+O`, conferma il nome con `Invio` ed esci con `Ctrl+X`.

`echo` produce il saluto; `<?= ... ?>` stampa il risultato di un'espressione.
Il messaggio è una frase scritta nel codice, non un rilevamento automatico
del server su cui gira la pagina.

Per una maggiore sicurezza, puoi usare `<?= htmlspecialchars($messaggio, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>` per evitare che eventuali caratteri speciali nel messaggio vengano interpretati come HTML. In questo caso,
`htmlspecialchars()` rappresenta i valori come testo nel documento HTML.

## Passo 4 — Controllare la sintassi

Nel terminale SSH:

```bash
php -l index.php
```

Il risultato atteso contiene:

```text
No syntax errors detected in index.php
```

Se viene segnalato un errore, riapri il file con `nano index.php` e controlla
la riga indicata. Verifica soprattutto virgolette, parentesi e punti e virgola.
`php -l` controlla la sintassi: la prova HTTP si esegue nel passo seguente.

## Passo 5 — Aprire la pagina dal browser

**Dove:** browser del tuo computer.

Apri il tuo URL personale:

```text
https://w4s.filippobilardo.it/~username/es01a-hello-world/
```

Devono comparire il titolo **Hello, World!**, il tuo nome e il messaggio
**La mia prima pagina PHP su Web4Student.**

Il servizio Apache di Web4Student è già attivo: per questo URL non devi
avviare `php -S` e non devi aggiungere la porta 8000.

| Riferimento | Significato |
|---|---|
| `~/www/es01a-hello-world/index.php` | File sul server, usato da shell ed editor |
| `https://w4s.filippobilardo.it/~username/es01a-hello-world/` | URL della pagina, usato dal browser |

## Passo 6 — Osservare la risposta e modificare il sito

1. Apri **Visualizza sorgente pagina** nel browser.
2. Cerca il saluto e il tuo nome: compaiono nell'HTML generato.
3. Verifica che il blocco `<?php ... ?>` e le assegnazioni delle variabili non compaiano nella risposta.
4. Nel terminale riapri `index.php` e cambia il messaggio.
5. Salva, ripeti `php -l index.php` e ricarica la pagina.

**Verifica:** il browser mostra il nuovo messaggio dopo una nuova richiesta.
Prima dell'esercizio successivo puoi ripristinare il messaggio iniziale.

## Se qualcosa non funziona

| Problema | Controllo |
|---|---|
| SSH non si collega | Host, porta 2222, rete e account assegnato |
| Pagina 404 | Username nell'URL e presenza di `01-hello-world/index.php` sotto `~/www` |
| Risposta 403 | Permessi della propria area; confronta la configurazione con il docente senza cambiare i permessi degli altri utenti |
| Errore PHP | Esegui `php -l` e leggi il messaggio relativo alla riga indicata |
| Vecchio contenuto | File salvato, URL corretto e ricaricamento della pagina |

## Consegna e autovalutazione

Aggiungi alla consegna l'URL personale e il sorgente `index.php`, insieme alla versione PHP
CLI e all'esito del controllo di sintassi.

Rispondi brevemente:

1. Dove viene eseguito `echo`?
2. Perché il browser non riceve il sorgente PHP?
3. Qual è la differenza tra `~/www` e il prefisso `~username` nell'URL?
4. Perché la prova con `php -l` non sostituisce quella nel browser?

---

[Indice degli esercizi](README.md) · [Esercizio successivo: Git e GitHub](02_Git_e_GitHub.md)
