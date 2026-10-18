# Esercizi: variabili e tipi di dati

Lavora in una tua cartella di esercitazione. Prima di eseguire il programma,
scrivi il risultato atteso e il tipo dei valori principali. Usa `var_dump()`
per verificare le ipotesi.

| N. | Consegna | Casi da verificare |
|---|---|---|
| 1 | Crea nome, classe, età e iscrizione di uno studente; usa una costante per il nome del corso. | Età intera, nome testuale e iscrizione booleana |
| 2 | Mostra la stessa variabile prima come intero e poi come stringa. | `42` e `'42'` hanno tipi diversi |
| 3 | Confronta cast a intero e validazione con `FILTER_VALIDATE_INT`. | `'0'` valido; `'18anni'` non valido anche se il cast produce 18 |
| 4 | Crea un array associativo con nome e due voti, poi aggiungi un terzo voto. | `count()` deve indicare tre voti |
| 5 | Copia un array e modifica la copia; ripeti con un oggetto. | L'array originale resta invariato; l'oggetto assegnato è condiviso |
| 6 | Scrivi una funzione che riceva il nome e restituisca un saluto. | Il nome deve arrivare come parametro |
| 7 | Crea una closure con `use` e modifica dopo la variabile esterna. | La cattura per valore conserva il valore acquisito |

## Domande di controllo

- Una variabile PHP ordinaria usa `let`? Che cosa indica invece `const`?
- Perché `null` non equivale a una variabile mai inizializzata?
- Un blocco `if` crea lo scope di blocco di JavaScript?
- `declare(strict_types=1)` rende immutabile il tipo di ogni variabile?

Consegna i file e una breve spiegazione dei risultati di almeno tre casi.


---

[Indice della sezione](../README.md) · [Indice del capitolo](../../README.md)
