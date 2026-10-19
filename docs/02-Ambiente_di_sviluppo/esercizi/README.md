# Esercizi guidati: ambiente di sviluppo

Questi esercizi costruiscono un percorso completo: pubblicare una pagina PHP
su Web4Student, conservare tutto il sito in GitHub e continuare lo sviluppo
in un Codespace.

## Percorso

| Esercizio | Attività | Risultato |
|---|---|---|
| [01 — Hello World su Web4Student](01_Hello_World_Web4Student.md) | Accesso SSH, creazione dello script e verifica nel browser | Una pagina PHP nel proprio sito personale |
| [02 — Git e GitHub per l'intera cartella www](02_Git_e_GitHub.md) | Repository, identità Git, chiave SSH, commit e push | Un repository personale che contiene tutta `www`, comprese le sottocartelle |
| [03 — Sviluppare con GitHub Codespaces](03_GitHub_Codespaces.md) | Configurazione PHP, porta inoltrata, modifica e sincronizzazione | Lo stesso sito eseguito e aggiornato dal browser |

Completa gli esercizi nell'ordine indicato. Servono un account Web4Student
assegnato dal docente, un account GitHub personale e l'accesso a Codespaces
per l'ultima attività. Per queste prove non serve un database.

## Dove si lavora

| Ambiente | Uso |
|---|---|
| Terminale del proprio computer | Collegarsi a Web4Student con SSH |
| Terminale SSH su Web4Student | Creare la pagina, preparare il progetto Git e pubblicare il sito |
| Browser su GitHub | Creare il repository, registrare la chiave pubblica e aprire Codespaces |
| Terminale del Codespace | Eseguire PHP e salvare le modifiche nel repository |

Nelle istruzioni `username` indica l'account **Web4Student**; `TUO-ACCOUNT`
indica l'account **GitHub**. Possono essere diversi.

## Struttura del lavoro dopo l'esercizio 02

```text
~/progetti/sito-php-studente/       progetto di lavoro e repository Git
├── .git/                         cronologia, esterna all'area web pubblicata
├── .gitignore
├── README.md
└── www/                          intera cartella del sito
    └── 01-hello-world/
        └── index.php

~/www/                            copia pubblicata da Web4Student
└── 01-hello-world/
    └── index.php
```

Nel secondo esercizio si copia **tutto il contenuto** di `~/www` nel progetto,
non soltanto Hello World. Il terzo aggiunge `.devcontainer` accanto a `www`,
senza cambiare la cartella pubblica.

## Consegna finale

- URL della pagina personale Web4Student.
- URL del repository GitHub, contenente l'intera cartella `www`.
- Identificativi e messaggi dei commit richiesti.
- Una breve descrizione della prova in Codespaces e della successiva sincronizzazione su Web4Student.

Se il repository è privato, rendilo accessibile al docente secondo le modalità
di consegna del corso. Non occorre rendere pubblica la porta del Codespace:
l'anteprima serve per la verifica personale.

## Guide di riferimento

- [Web4Student](../02-web4student.md).
- [Sviluppo online con GitHub e Codespaces](../07-sviluppo_online_con_github_e_codespaces.md).

---

[Indice del capitolo](../README.md) · [Inizia da Hello World](01_Hello_World_Web4Student.md)
