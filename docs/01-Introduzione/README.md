# Esercitazione 1: Introduzione a PHP

Questo modulo introduce lo sviluppo web con PHP: dal modello client-server
allo scambio HTTP, fino alla generazione di pagine dinamiche e alla gestione
di un primo form di login. Le cinque guide affiancano spiegazioni, schemi,
esempi di codice e domande di verifica.

## Obiettivi

- Preparare l'ambiente PHP ed eseguire gli esempi del progetto.
- Comprendere il ruolo di browser, server web, applicazione e database.
- Leggere un URL e riconoscere metodi, header e codici di stato HTTP.
- Distinguere pagine statiche, contenuti generati sul server e aggiornamenti nel browser.
- Comprendere lo sviluppo server-side e il ruolo di CGI, FastCGI e PHP-FPM.
- Riconoscere i principali linguaggi server-side e distinguere linguaggi, runtime e framework.
- Osservare l'invio di un form e l'uso di una sessione PHP.

## Guide

Segui le guide nell'ordine indicato:

| Guida | Argomenti principali |
|---|---|
| [01 — Introduzione a PHP](01-introduzione_a_php.md) | Ruolo di PHP, ambiente di sviluppo, sintassi, variabili, HTML e JSON |
| [02 — Il modello client-server](02-modello_client_server_multilivello.md) | Responsabilità dei componenti, architetture a due, tre e più livelli |
| [03 — Il protocollo HTTP](03-il_protocollo_http.md) | URL, richieste e risposte, GET e POST, header, codici di stato, cookie e sessioni |
| [04 — Pagine web statiche e dinamiche](04-pagine_web_statiche_e_dinamiche.md) | HTML statico, generazione con PHP, aggiornamenti con JavaScript e confronto dei risultati |
| [05 — Sviluppo server-side](05-sviluppo_server_side.md) | Frontend e backend, CGI, FastCGI, PHP-FPM e principali linguaggi server-side |

## Ambiente di lavoro

Per le attività del modulo servono PHP 8.3 o successivo, un browser e un editor.
Gli esempi iniziali non richiedono un database.

### In Codespaces

Il progetto avvia automaticamente il server PHP sulla porta **8000**, usando
`www` come cartella pubblica. Apri la porta dal pannello **Ports** per accedere
alla pagina iniziale del corso e ai collegamenti agli esempi.

Per i dettagli consulta la [guida all'ambiente Codespaces](../../.devcontainer/README.md).

### In locale

Dalla cartella principale del progetto verifica PHP e avvia il server:

```bash
php --version
php -S 0.0.0.0:8000 -t www
```

Apri `http://localhost:8000`. Se il server è già in esecuzione, usa quello
esistente. Per fermare il server avviato nel terminale premi `Ctrl+C`.

## Esempi disponibili

| Esempio | Sorgente | Percorso nel browser |
|---|---|---|
| Presentazione del corso | [www/index.php](../../www/index.php) | `/` |
| Saluto e informazioni sull'interprete | [01-hello-php/index.php](../../www/01-hello-php/index.php) | `/01-hello-php/` |
| Form di login, sessione e logout | [02-pagina-riservata/index.php](../../www/02-pagina-riservata/index.php) | `/02-pagina-riservata/` |

I link ai sorgenti aprono i file nel repository. Per eseguirli, usa la pagina
iniziale del server oppure aggiungi il percorso all'indirizzo locale o a quello
inoltrato da Codespaces.

Il login usa le credenziali dimostrative **admin / php123**, definite nel codice,
per mostrare il funzionamento di form e sessioni senza database.

## Il primo programma PHP

```php
<?php
declare(strict_types=1);

echo 'Ciao PHP!';
```

PHP esegue le istruzioni sul server e invia il risultato al browser. Nell'esempio
**Hello PHP**, oltre al saluto, `phpinfo()` mostra versione, configurazione ed
estensioni dell'interprete.

Confronta il sorgente nell'editor con **Visualizza sorgente pagina** nel browser:
la risposta contiene l'output generato, mentre le istruzioni PHP restano sul server.

## Esercizi

1. Modifica il saluto di **Hello PHP** per stampare nome, classe e data corrente.
2. Crea una pagina PHP con un documento HTML completo, un titolo e un paragrafo.
3. Segui la guida 04 per confrontare una pagina statica, una pagina generata da PHP e un contatore JavaScript.
4. Nel pannello **Network** degli strumenti di sviluppo individua metodo, codice di stato e tipo di contenuto di una richiesta.
5. Prova il login con una password errata, poi con le credenziali dimostrative; ricarica la pagina e infine esegui il logout.
6. Disegna il percorso di una richiesta dal browser all'applicazione e spiega come cambia l'esecuzione tra CGI classico e FastCGI.

Completa anche le domande di verifica presenti nelle singole guide.

---

[Torna all'indice del corso](../README.md) · [Capitolo successivo: Ambiente di sviluppo](../02-Ambiente_di_sviluppo/README.md)

