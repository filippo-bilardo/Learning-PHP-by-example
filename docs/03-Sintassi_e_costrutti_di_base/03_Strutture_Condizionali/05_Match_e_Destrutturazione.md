# Match e destrutturazione di array

`match` è un'espressione disponibile da PHP 8. Confronta il valore con gli
elementi dei rami usando l'identità stretta `===` e restituisce il risultato
del ramo selezionato. Non ha fall-through e non richiede `break`.

## Corrispondenze complete

Un ramo può elencare più valori separati da virgole. `default` gestisce gli
altri valori: se nessun ramo corrisponde e manca `default`, viene sollevato
`UnhandledMatchError`. Valida l'input e prevedi una scelta completa.

`match (true)` può selezionare il primo confronto che restituisce esattamente
`true`. Non equivale a un sistema generale di pattern matching strutturale.

## Estrarre i campi di un array

La destrutturazione assegna elementi di un array a variabili:
`[$x, $y] = [10, 20]`, oppure `['nome' => $nome] = $studente`.
Le chiavi richieste devono esistere: controllale o prepara esplicitamente
valori predefiniti. Estrarre campi non significa validarli.

`match` e destrutturazione sono due strumenti distinti. L'accesso a proprietà
di oggetti mantiene invece la sintassi `->`.

Riferimenti: [match](https://www.php.net/manual/en/control-structures.match.php), [Destrutturazione di array](https://www.php.net/manual/en/language.types.array.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$codice = '1';
$tipo = match ($codice) {
    1 => 'intero',
    '1' => 'stringa',
    default => 'altro',
};
echo 'Tipo selezionato: ', $tipo, PHP_EOL;

$giorno = 'domenica';
echo match ($giorno) {
    'sabato', 'domenica' => 'Fine settimana',
    default => 'Altro giorno',
}, PHP_EOL;

$studente = ['nome' => 'Ada', 'classe' => '3A'];
['nome' => $nome, 'classe' => $classe] = $studente;
echo $nome, ' - ', $classe, PHP_EOL;
```

Output atteso:

```text
Tipo selezionato: stringa
Fine settimana
Ada - 3A
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/03_Strutture_Condizionali/05_Match_e_Destrutturazione.php). Nel catalogo web scegli **Strutture condizionali → Match e destrutturazione di array**.

## Prova tu

Riscrivi lo switch delle operazioni con match. Prova sia 1 sia "1" e prepara una destrutturazione con valori predefiniti per campi facoltativi.

---

[Guida precedente](04_Valutazione_Condizionale.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md)
