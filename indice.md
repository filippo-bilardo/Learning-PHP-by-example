# Corso di PHP — Informatica, classe quinta

## Obiettivi del corso

- Comprendere il funzionamento di un'applicazione web lato server.
- Scrivere programmi PHP organizzati, leggibili e sicuri.
- Progettare e realizzare applicazioni web collegate a un database relazionale.
- Gestire utenti, autenticazione e autorizzazioni.
- Documentare e collaudare un progetto, anche in preparazione all'Esame di Stato.

## Prerequisiti

- Fondamenti di programmazione: variabili, condizioni, cicli e funzioni.
- HTML e CSS; nozioni di JavaScript.
- Modello relazionale, progettazione di database e basi di SQL.

## 1. Il Web e la programmazione lato server

1.1 Architettura client-server e ruolo del backend  
1.2 URL, richieste e risposte HTTP  
1.3 Metodi HTTP, codici di stato e intestazioni  
1.4 Pagine statiche e pagine dinamiche  
1.5 Ambiente di sviluppo: PHP 8.x, editor e server locale  
1.6 Primo script PHP e integrazione con HTML  
1.7 Laboratorio: una pagina dinamica con data e contenuti generati

## 2. Le basi del linguaggio PHP

2.1 Sintassi, commenti e istruzioni di output  
2.2 Variabili, costanti e tipi di dato  
2.3 Operatori aritmetici, logici e di confronto  
2.4 Conversioni di tipo, uguaglianza e identità  
2.5 Selezione: `if`, `elseif`, `switch` e `match`  
2.6 Iterazione: `while`, `do...while`, `for` e `foreach`  
2.7 Gestione delle stringhe e interpolazione  
2.8 Laboratorio: calcoli e tabelle HTML generati con PHP

## 3. Array, funzioni e organizzazione del codice

3.1 Array indicizzati, associativi e multidimensionali  
3.2 Ricerca, ordinamento e principali funzioni sugli array  
3.3 Definizione di funzioni, parametri e valori restituiti  
3.4 Ambito delle variabili e passaggio per valore o riferimento  
3.5 Dichiarazioni di tipo, valori nulli e `strict_types`  
3.6 Inclusione dei file: `include`, `require` e varianti `_once`  
3.7 Separazione tra logica applicativa e presentazione  
3.8 Laboratorio: gestione di un catalogo in memoria con funzioni riutilizzabili

## 4. Form HTML e gestione degli input

4.1 Invio dei dati con GET e POST  
4.2 Superglobali: `$_GET`, `$_POST` e `$_SERVER`  
4.3 Campi obbligatori, valori predefiniti e messaggi di errore  
4.4 Validazione lato client e lato server  
4.5 Normalizzazione degli input e codifica dell'output HTML con `htmlspecialchars`  
4.6 Mantenimento dei valori nei form dopo un errore  
4.7 Reindirizzamenti e schema Post/Redirect/Get  
4.8 Laboratorio: modulo di iscrizione con validazione lato server

## 5. Cookie, sessioni e stato dell'applicazione

5.1 HTTP come protocollo senza stato  
5.2 Creazione, lettura e scadenza dei cookie  
5.3 Avvio e gestione delle sessioni con `$_SESSION`  
5.4 Differenze tra cookie e sessioni  
5.5 Configurazione dei cookie: `HttpOnly`, `Secure` e `SameSite`  
5.6 Laboratorio: carrello o lista di preferiti basati su sessione

## 6. File, JSON e caricamento di documenti

6.1 Lettura e scrittura di file di testo  
6.2 Percorsi, permessi e gestione degli errori di accesso  
6.3 Codifica e decodifica JSON  
6.4 Lettura e produzione di file CSV  
6.5 Upload con `$_FILES`: dimensioni, tipi consentiti e nomi sicuri  
6.6 Conservazione dei file caricati fuori dalla directory pubblica  
6.7 Laboratorio: esportazione CSV e importazione di dati JSON

## 7. PHP e database relazionali

7.1 Ripasso: chiavi, relazioni, vincoli e normalizzazione  
7.2 Dal modello concettuale allo schema relazionale  
7.3 Creazione di un database MySQL o MariaDB e di un utente applicativo  
7.4 Connessione tramite PDO e configurazione della codifica  
7.5 Query parametrizzate e prepared statement  
7.6 Lettura dei risultati e visualizzazione in HTML  
7.7 Inserimento, modifica ed eliminazione dei dati  
7.8 JOIN, aggregazioni e ricerche con filtri  
7.9 Transazioni e integrità dei dati  
7.10 Laboratorio: applicazione CRUD per una biblioteca scolastica

## 8. Autenticazione e autorizzazione

8.1 Progettazione della tabella utenti  
8.2 Registrazione e controllo dei dati duplicati  
8.3 Hash delle password con `password_hash` e verifica con `password_verify`  
8.4 Login, logout e rigenerazione dell'identificativo di sessione  
8.5 Protezione delle pagine riservate  
8.6 Ruoli, permessi e controllo dell'accesso alle singole risorse  
8.7 Laboratorio: area riservata con ruoli studente e amministratore

## 9. Sicurezza delle applicazioni web

9.1 Dati non attendibili e validazione ai confini dell'applicazione  
9.2 SQL injection e prevenzione con query parametrizzate  
9.3 Cross-site scripting (XSS) e codifica dell'output in base al contesto  
9.4 Cross-site request forgery (CSRF) e token nei form  
9.5 Sicurezza delle sessioni e limitazione dei tentativi di accesso  
9.6 Rischi di upload, accesso ai percorsi e inclusione di file  
9.7 Gestione dei segreti, privilegi minimi e uso di HTTPS  
9.8 Laboratorio: verifica e correzione delle vulnerabilità del progetto CRUD

## 10. Programmazione a oggetti e struttura del progetto

10.1 Classi, oggetti, proprietà e metodi  
10.2 Costruttore, visibilità e incapsulamento  
10.3 Composizione, ereditarietà e interfacce  
10.4 Namespace e caricamento automatico delle classi  
10.5 Composer e gestione delle dipendenze  
10.6 Separazione delle responsabilità e introduzione al modello MVC  
10.7 Organizzazione di configurazione, accesso ai dati e template  
10.8 Laboratorio: riorganizzazione del progetto CRUD in classi

## 11. API HTTP e interazione con JavaScript

11.1 Risorse, endpoint e principi di un'API REST  
11.2 Metodi HTTP: GET, POST, PUT, PATCH e DELETE  
11.3 Lettura del corpo della richiesta e risposte JSON  
11.4 Codici di stato e gestione uniforme degli errori  
11.5 Richieste asincrone con `fetch`  
11.6 Autenticazione, autorizzazione e protezione CSRF nelle API con sessione  
11.7 Same-origin policy e introduzione a CORS  
11.8 Laboratorio: ricerca dinamica nel catalogo tramite API

## 12. Debug, collaudo e pubblicazione

12.1 Errori sintattici, errori di esecuzione ed errori logici  
12.2 Eccezioni: `try`, `catch`, `finally` e `throw`  
12.3 Log applicativi e differenze tra sviluppo e produzione  
12.4 Strumenti di sviluppo del browser e ispezione delle richieste HTTP  
12.5 Casi di test: input validi, non validi e condizioni limite  
12.6 Introduzione ai test automatici delle funzioni e dell'accesso ai dati  
12.7 Configurazione dell'ambiente di pubblicazione e protezione dei file riservati  
12.8 Backup del database e verifica del ripristino  
12.9 Laboratorio: collaudo e pubblicazione dell'applicazione

## 13. Progetto finale e preparazione all'Esame di Stato

13.1 Analisi di una traccia e definizione dei requisiti  
13.2 Individuazione degli attori e dei casi d'uso  
13.3 Progettazione concettuale e logica del database  
13.4 Definizione delle pagine, dei flussi e dei permessi  
13.5 Realizzazione di CRUD, autenticazione e interrogazioni SQL  
13.6 Validazione, sicurezza e collaudo dei casi principali  
13.7 Documentazione tecnica, istruzioni di installazione e manuale utente  
13.8 Presentazione del progetto e motivazione delle scelte progettuali  
13.9 Simulazione di una traccia d'esame con database e sviluppo web

### Proposte per il progetto finale

- Biblioteca scolastica: catalogo, utenti e prestiti.
- Prenotazione di laboratori: risorse, disponibilità e prenotazioni.
- Gestione di eventi scolastici: eventi, iscrizioni e presenze.
- Portale per attività di orientamento: proposte, adesioni e report.

## Approfondimenti facoltativi

- Routing e introduzione a un framework PHP.
- Paginazione dei risultati e indici del database.
- Invio di email e recupero della password con token a scadenza.
- Gestione di date, orari e fusi orari.
- Container per un ambiente di sviluppo riproducibile.

## Modalità di verifica

- Esercizi brevi sui singoli argomenti.
- Prove pratiche di laboratorio con requisiti e casi di test assegnati.
- Lettura, spiegazione e correzione di codice esistente.
- Valutazione del progetto finale: funzionalità, database, sicurezza, qualità del codice e documentazione.
