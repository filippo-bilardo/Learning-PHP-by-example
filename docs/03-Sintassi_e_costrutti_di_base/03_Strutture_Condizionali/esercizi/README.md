# Esercizi: strutture condizionali

Prova ogni ramo almeno una volta. Per i dati facoltativi distingui assenza,
null, testo vuoto e valori validi come zero.

| N. | Consegna | Casi da verificare |
|---|---|---|
| 1 | Classifica l'età in non valida, minorenne e maggiorenne. | -1, 0, 17, 18 e 65 |
| 2 | Classifica un voto da 0 a 10 in insufficiente, sufficiente e ottimo. | Fuori intervallo non valido; soglie 6 e 9 |
| 3 | Realizza un menu con switch e un messaggio per comando sconosciuto. | Un comando valido e uno assente dai case |
| 4 | Riscrivi la selezione con match e confronta codici numerici e testuali. | `1` e `'1'` devono poter avere etichette diverse |
| 5 | Scegli un nome da visualizzare soltanto se è una stringa non vuota. | Chiave assente, null, `''`, spazi, `'0'`, `'Ada'` e un array |
| 6 | Estrai nome e classe da un array con destrutturazione. | Prepara valori predefiniti prima di estrarre una chiave facoltativa |

## Controlli richiesti

Per ciascun esercizio indica la condizione che porta al risultato e almeno
un caso limite. Non usare la sola truthiness per stabilire se una quantità
sia presente: potrebbe essere zero.

Le regole sui nomi sono un esercizio di validazione, non un sistema completo
di autenticazione. I permessi sulle risorse andrebbero verificati dal backend.


---

[Indice della sezione](../README.md) · [Indice del capitolo](../../README.md)
