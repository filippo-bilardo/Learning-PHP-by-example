# Esercizi: cicli e iterazioni

Verifica che ogni ciclo termini e che gli accumulatori vengano inizializzati
nel punto corretto. Prepara anche una collezione vuota.

| N. | Consegna | Risultati o casi attesi |
|---|---|---|
| 1 | Stampa i pari da 2 a 10 con for e while. | 2, 4, 6, 8, 10 |
| 2 | Somma un array di interi con foreach. | `[2, 4, 6]` produce 12; `[]` produce 0 |
| 3 | Trova minimo e massimo senza assumere che zero sia un valore iniziale adatto. | `[-5, -2]` dà minimo -5 e massimo -2; gestisci `[]` |
| 4 | Cerca il primo valore insufficiente e conserva il suo indice. | Controlla indice 0, ultimo indice e nessun risultato |
| 5 | Calcola la somma di ciascuna riga di una matrice. | `[[1, 2], [3]]` produce 3 e 3 |
| 6 | Seleziona voti sufficienti, calcola i doppi e la media. | `[4, 6, 8]`: sufficienti 6 e 8, media 6; array vuoto senza divisione per zero |
| 7 | Ripeti una trasformazione con foreach e con array_map. | Stesso risultato, array iniziale invariato |

## Attività di sintesi: registro dei risultati

Prepara questi studenti:

```php
$studenti = [
    ['nome' => 'Ada', 'voti' => [6, 8]],
    ['nome' => 'Linus', 'voti' => [4, 6]],
    ['nome' => 'Grace', 'voti' => [8, 8]],
];
```

1. Per ciascuno calcola la media e seleziona l'esito con una condizione.
2. Mostra nome, media ed esito: Ada 7 sufficiente, Linus 5 da recuperare, Grace 8 sufficiente.
3. Conta gli studenti con media almeno 6: il risultato atteso è 2 su 3.
4. Aggiungi uno studente senza voti e mostrane la media come non disponibile.
5. Ripeti il calcolo dopo aver modificato un voto e verifica il cambiamento.


---

[Indice della sezione](../README.md) · [Indice del capitolo](../../README.md)
