# Capitolo 2: Ambiente di sviluppo

In questo capitolo prepariamo gli strumenti per eseguire, configurare e verificare
un'applicazione PHP. Confrontiamo ambienti locali e online usando gli esempi del
corso, la cui cartella pubblica è sempre `www`.

## Obiettivi

- Distinguere editor, interprete, server web, database e controllo di versione.
- Lavorare su Web4Student e riconoscere la propria area web.
- Individuare il `php.ini` effettivamente caricato e modificare le impostazioni di sviluppo.
- Leggere e adattare una configurazione Apache o Nginx collegata a PHP-FPM.
- Preparare un ambiente locale con XAMPP.
- Usare GitHub e Codespaces per conservare ed eseguire il progetto.
- Valutare altre soluzioni online in base alle funzioni necessarie.

## Guide

| Guida | Contenuti |
|---|---|
| [01 — Componenti e strumenti](01-componenti_e_strumenti.md) | Architettura dell'ambiente, cartelle, porte e prime verifiche |
| [02 — Web4Student](02-web4student.md) | `w4s.filippobilardo.it`, SSH, `~/www`, pubblicazione e database personale |
| [03 — Configurazione di PHP e php.ini](03-configurazione_php_ini.md) | File caricato, direttive, errori, estensioni e differenze tra CLI e web |
| [04 — Apache e sua configurazione](04-apache_e_configurazione.md) | Virtual host, DocumentRoot, accessi, PHP-FPM e log |
| [05 — Nginx e sua configurazione](05-nginx_e_configurazione.md) | Server block, root, location, FastCGI e log |
| [06 — Ambiente locale con XAMPP](06-ambiente_locale_con_xampp.md) | Installazione, pannello di controllo, htdocs e configurazione del progetto |
| [07 — Sviluppo online con GitHub e Codespaces](07-sviluppo_online_con_github_e_codespaces.md) | Repository, dev container, porta 8000 e salvataggio del lavoro |
| [08 — Altre soluzioni di sviluppo online](08-altre_soluzioni_online.md) | Ambienti remoti, piattaforme gestite dalla scuola e playground PHP |

## Esercizi guidati

Il [percorso pratico](esercizi/README.md) usa lo stesso sito nelle tre attività:

1. [Hello World su Web4Student](esercizi/01_Hello_World_Web4Student.md): crea una pagina PHP e aprila dal tuo URL personale.
2. [Git e GitHub per l'intera cartella www](esercizi/02_Git_e_GitHub.md): conserva tutto il sito in un repository personale e pubblicane gli aggiornamenti.
3. [Sviluppare con GitHub Codespaces](esercizi/03_GitHub_Codespaces.md): esegui il repository online, modifica la pagina e sincronizza il lavoro con Web4Student.

## Prerequisiti

Aver letto il [capitolo introduttivo](../01-Introduzione/README.md), conoscere il
ciclo richiesta-risposta e saper distinguere un percorso su disco da un URL.
Per iniziare bastano browser, editor e un ambiente con PHP: il database servirà
nelle attività successive.

Il corso usa PHP 8.3 come riferimento. Verifica la versione effettiva del tuo
ambiente: un pacchetto XAMPP o un server condiviso possono offrirne una diversa.
La configurazione Codespaces del repository richiede PHP 8.3.

## Come seguire il capitolo

Scegli un ambiente operativo e prova gli stessi esempi. Non occorre installare
contemporaneamente tutti i server descritti.

| Situazione | Percorso di lavoro |
|---|---|
| Account Web4Student assegnato dal docente | Guida 02, poi confronto con php.ini e Apache |
| Sviluppo sul proprio computer con un pacchetto integrato | Guida 06 |
| Sviluppo nel browser a partire dal repository | Guida 07 |
| Studio della configurazione dei server | Guide 03, 04 e 05 in un ambiente amministrabile |
| Confronto con altri strumenti | Guida 08 |

Le configurazioni Apache e Nginx sono esempi per un laboratorio Linux con
PHP-FPM già installato. Percorsi, versioni e nomi dei servizi vanno adattati;
un account studente su un server condiviso normalmente non modifica i servizi
di sistema.

## Prova comune a tutti gli ambienti

1. Apri la pagina iniziale generata da [www/index.php](../../www/index.php).
2. Esegui [Hello PHP](../../www/01-hello-php/index.php) e individua versione e configurazione nell'output di `phpinfo()`.
3. Esegui [Pagina riservata](../../www/02-pagina-riservata/index.php), prova il login con **admin / php123** e poi il logout.
4. Annota l'URL usato e la cartella su disco da cui il server sta leggendo gli script.
5. Modifica un saluto e verifica che il risultato nel browser cambi.

I link ai file aprono i sorgenti nel repository. Per eseguirli usa il server del
tuo ambiente e i percorsi `/01-hello-php/` e `/02-pagina-riservata/`, preceduti
dall'eventuale sottocartella del progetto o dal prefisso personale Web4Student.

## Attività conclusiva

Prepara una breve scheda con ambiente scelto, versione PHP, server web, cartella
pubblica, URL degli esempi e percorso del `php.ini` caricato. Descrivi un problema
incontrato e il controllo che ti ha permesso di risolverlo.

---

[Capitolo precedente: Introduzione a PHP](../01-Introduzione/README.md) · [Indice del corso](../README.md) · [Inizia dalla guida 01](01-componenti_e_strumenti.md) · [Capitolo successivo: Sintassi e costrutti di base](../03-Sintassi_e_costrutti_di_base/README.md)
