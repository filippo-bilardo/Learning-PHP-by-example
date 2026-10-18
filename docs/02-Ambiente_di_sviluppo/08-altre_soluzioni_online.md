# Altre soluzioni di sviluppo online

Uno strumento online può offrire un editor, l'esecuzione di singoli programmi
oppure un ambiente completo con terminale e server web. Prima di usarlo per
il corso verifica quale di queste funzioni fornisce davvero.

Per il saluto basta eseguire PHP; per provare correttamente il login servono
anche richieste HTTP, form, cookie e sessioni tra richieste successive.

---

# Tre categorie

| Categoria | Che cosa permette | Aspetto da verificare |
|---|---|---|
| Workspace remoto | Lavorare su un progetto con terminale e processi | PHP disponibile, porte HTTP e persistenza |
| Piattaforma della scuola | Usare ambienti gestiti per il gruppo | Account, strumenti e permessi assegnati |
| Playground PHP | Eseguire rapidamente un frammento | Differenza tra esecuzione console e applicazione web |

Un'interfaccia di esecuzione nel browser non garantisce un server pubblico,
un database o la possibilità di personalizzare `php.ini`.

---

# Ambienti e piattaforme da conoscere

| Soluzione | Tipo | Utilità e verifica per il corso |
|---|---|---|
| [Ona](https://ona.com/docs/ona/getting-started) | Ambienti di sviluppo remoti | Verificare configurazione PHP, accesso al progetto e anteprima HTTP |
| [Coder](https://coder.com/docs) | Piattaforma per workspace su infrastruttura gestita | Utile se la scuola fornisce un'istanza e un template PHP |
| [Eclipse Che](https://eclipse.dev/che/) | Workspace cloud basati su container | Richiede una piattaforma predisposta e strumenti adatti al progetto |
| [JDoodle PHP](https://www.jdoodle.com/php-online-editor) | Editor ed esecutore PHP online | Adatto a piccoli esperimenti di sintassi; verificare il modello di esecuzione |
| [Programiz PHP](https://www.programiz.com/php/online-compiler/) | Editor ed esecutore PHP online | Utile per brevi programmi e osservazione dell'output |
| [XAMPP for Browsers](https://www.apachefriends.org/download.html) | Ambiente XAMPP eseguibile nel browser | Verificare browser supportato, importazione dei file e persistenza |

Il progetto precedentemente chiamato **Gitpod** è stato rinominato **Ona**,
come descritto nell'[annuncio ufficiale](https://ona.com/stories/gitpod-is-now-ona).
Le guide meno recenti possono usare nomi o procedure precedenti.

Coder ed Eclipse Che sono piattaforme che un'organizzazione può predisporre:
la disponibilità del software non implica che lo studente abbia già un account
su un servizio ospitato. Per le funzioni correnti usa i riferimenti ufficiali
collegati nella tabella.

<!--
Note del docente:
La tabella presenta esempi, non una graduatoria. Non presumere che ogni servizio supporti tutti i linguaggi o permetta di modificare la configurazione del server.
-->

---

# Una prova adatta a un playground

Esegui questo programma in un editor PHP online:

```php
<?php
$prezzo = 12.50;
$quantita = 3;
$totale = $prezzo * $quantita;

echo 'Totale: ' . number_format($totale, 2, ',', '.') . ' euro';
```

L'output atteso è:

```text
Totale: 37,50 euro
```

Questo esercizio verifica variabili, calcolo e formattazione. Non dimostra che
l'ambiente possa ospitare il form di login o mantenere una sessione HTTP.

---

# Provare un workspace completo

Se la piattaforma fornisce un terminale e permette di importare un repository:

1. Importa la tua copia del corso seguendo la procedura del servizio.
2. Verifica PHP con `php --version` e `php --ini`.
3. Dalla cartella principale avvia il server con il comando seguente, se non è già attivo.
4. Apri l'anteprima HTTP o l'URL della porta previsto dalla piattaforma.
5. Prova sia **Hello PHP** sia login e logout.

```bash
php -S 0.0.0.0:8000 -t www
```

Il comando presuppone PHP disponibile e la possibilità di esporre la porta.
L'URL dipende dalla piattaforma: non copiare un URL Codespaces su un altro
servizio pensando che le regole di inoltro siano identiche.

---

# Criteri per confrontare le soluzioni

| Criterio | Domanda da porre |
|---|---|
| Versione | Quale versione PHP viene realmente eseguita? |
| Progetto | Posso importare più cartelle e mantenere `www` come root pubblica? |
| HTTP | Posso provare metodi GET e POST, redirect, cookie e sessioni? |
| Dipendenze | Sono disponibili Composer ed estensioni richieste? |
| Dati | È previsto un database, se l'esercizio lo richiede? |
| Persistenza | Come salvo, esporto e recupero i file dopo l'arresto? |
| Collaborazione | Posso usare Git e inviare il lavoro al mio repository? |
| Risorse | Quali limiti e condizioni correnti valgono per il mio account? |

Consulta le condizioni aggiornate sul sito della soluzione scelta. Un piano
gratuito o un'anteprima temporanea non equivalgono a un servizio senza limiti.

## Attività

Confronta un playground e un workspace completo. Esegui il calcolo in entrambi;
poi verifica dove riesci a far funzionare il login del corso. Descrivi la
differenza osservata usando i criteri della tabella.

---

[Guida precedente: GitHub e Codespaces](07-sviluppo_online_con_github_e_codespaces.md) · [Indice del capitolo](README.md) · [Indice del corso](../README.md)
