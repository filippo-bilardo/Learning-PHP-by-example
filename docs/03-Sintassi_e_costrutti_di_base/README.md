# Capitolo 3: Sintassi e costrutti di base

Questo capitolo introduce gli elementi con cui scrivere un programma PHP:
sintassi, variabili, tipi, operatori, decisioni e ripetizioni. Il percorso
riprende l'organizzazione del capitolo JavaScript di riferimento e adatta
regole, esempi ed esercizi al comportamento di PHP.

Le **21 guide** sono organizzate in quattro sezioni. Ogni guida contiene
spiegazioni, un esempio completo, il suo output atteso, un'attività e
riferimenti al manuale ufficiale PHP.

## Obiettivi

- Scrivere istruzioni, commenti e output PHP.
- Inizializzare variabili e costanti e riconoscere i tipi dei valori.
- Distinguere conversione, validazione e confronto stretto.
- Usare array, riconoscere l'identità degli oggetti e comprendere lo scope.
- Applicare operatori aritmetici, logici e di assegnazione.
- Selezionare rami con `if`, `switch`, ternario e `match`.
- Percorrere collezioni con `for`, `while`, `do-while` e `foreach`.
- Trasformare, filtrare e aggregare array, gestendo anche dati vuoti.

## Indice delle sezioni

| Sezione | Guide | Argomenti |
|---|---:|---|
| [01 — Variabili e tipi di dati](01_Variabili_TipiDati/README.md) | 6 | Sintassi fondamentale, variabili, costanti, scalari, null, array, oggetti, conversioni e scope |
| [02 — Operatori](02_Operatori/README.md) | 5 | Aritmetica, confronti, logica, assegnazioni, unpacking, nullsafe e bit a bit |
| [03 — Strutture condizionali](03_Strutture_Condizionali/README.md) | 5 | If, switch, ternario, dati facoltativi, match e destrutturazione |
| [04 — Cicli e iterazioni](04_Cicli_Iterazioni/README.md) | 5 | Cicli base, foreach, break, continue, matrici e funzioni di array |

## Prerequisiti e ambiente

Completa prima [Introduzione a PHP](../01-Introduzione/README.md) e
[Ambiente di sviluppo](../02-Ambiente_di_sviluppo/README.md).
Il riferimento del corso è PHP 8.3. Per questi esempi non servono database,
Composer o librerie esterne.

Le guide sono in `docs/03-Sintassi_e_costrutti_di_base`; gli esempi eseguibili
sono in `www/03-sintassi-e-costrutti-di-base/esempi`, suddivisi nelle stesse
quattro sezioni. Non occorre copiare le guide nella cartella pubblica.

### Dal terminale

Dalla cartella principale del progetto, esegui per esempio:

```bash
php www/03-sintassi-e-costrutti-di-base/esempi/01_Variabili_TipiDati/00_Sintassi_Fondamentale.php
```

Per controllare soltanto la sintassi:

```bash
php -l www/03-sintassi-e-costrutti-di-base/esempi/01_Variabili_TipiDati/00_Sintassi_Fondamentale.php
```

### Dal browser

Se il server non è già attivo, avvialo dalla cartella principale:

```bash
php -S 0.0.0.0:8000 -t www
```

Apri `http://localhost:8000/03-sintassi-e-costrutti-di-base/`. Il catalogo
permette di scegliere ciascun esempio e mostra output e codice PHP.
In Codespaces apri la porta **8000**, poi il collegamento **Sintassi e costrutti
di base** dalla pagina iniziale del corso.

I link PHP nelle guide aprono i sorgenti nel repository. Il
[sorgente del catalogo](../../www/03-sintassi-e-costrutti-di-base/index.php)
mostra come gli esempi vengono eseguiti nel browser.

## Metodo di lavoro

1. Leggi la spiegazione e prevedi il risultato del codice.
2. Esegui l'esempio e confrontalo con l'output atteso.
3. Modifica un dato alla volta e spiega il cambiamento.
4. Prova zero, stringhe vuote, null e array vuoti dove hanno senso.
5. Completa gli esercizi della sezione e l'attività di sintesi finale.

| Sezione | Esercizi |
|---|---|
| Variabili e tipi | [Profilo, conversioni, copie e scope](01_Variabili_TipiDati/esercizi/README.md) |
| Operatori | [Calcoli, confronti, configurazioni e permessi](02_Operatori/esercizi/README.md) |
| Condizioni | [Classificazioni, comandi e valori opzionali](03_Strutture_Condizionali/esercizi/README.md) |
| Cicli | [Collezioni, ricerche, matrici e registro dei risultati](04_Cicli_Iterazioni/esercizi/README.md) |

## Per chi conosce JavaScript

Gli esempi evidenziano differenze che contano nella traduzione: PHP usa `$`
per le variabili e `.` per concatenare; `&&` e `||` restituiscono booleani;
`'0'` e `[]` sono valutati come falsi; `switch` usa confronti non stretti mentre
`match` usa l'identità stretta. Queste regole vengono spiegate e verificate
nelle rispettive guide.

Le funzioni, le closure e gli oggetti compaiono solo quanto serve per scope,
tipi e callback; avranno capitoli dedicati per uno studio completo.

---

[Capitolo precedente: Ambiente di sviluppo](../02-Ambiente_di_sviluppo/README.md) · [Indice del corso](../README.md) · [Inizia dalla sintassi fondamentale](01_Variabili_TipiDati/00_Sintassi_Fondamentale.md)
