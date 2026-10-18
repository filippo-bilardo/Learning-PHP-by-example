# Break, continue e ricerca

`break` termina il ciclo corrente. `continue` salta il resto dell'iterazione e
passa alla successiva: nel `for` viene eseguito anche l'aggiornamento del contatore.

## Filtrare e interrompere

Usa `continue` per ignorare un elemento che non va elaborato; usa `break`
quando hai già il risultato cercato o hai raggiunto il limite previsto.
In un `while` controlla che il salto non eviti l'aggiornamento necessario
a terminare il ciclo.

## Trovare un indice

Quando una ricerca può trovare l'indice `0`, non verificarne il successo con
un semplice `if ($indice)`: zero è valutato come falso. Usa un valore distinto
per “non trovato”, per esempio `null`, e un confronto esplicito.

PHP permette anche livelli numerici come `break 2` per uscire da strutture
annidate. Lo vedremo nella guida successiva. Non servono le etichette di ciclo
di JavaScript per questi esempi.

Riferimenti: [break](https://www.php.net/manual/en/control-structures.break.php), [continue](https://www.php.net/manual/en/control-structures.continue.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$somma = 0;
foreach ([3, -1, 0, 8, 12] as $numero) {
    if ($numero <= 0) {
        continue;
    }
    if ($numero >= 10) {
        break;
    }
    $somma += $numero;
}
echo 'Somma prima del limite: ', $somma, PHP_EOL;

$indiceTrovato = null;
foreach ([7, 4, 9] as $indice => $valore) {
    if ($valore === 7) {
        $indiceTrovato = $indice;
        break;
    }
}
echo 'Indice trovato: ', $indiceTrovato ?? 'nessuno', PHP_EOL;
```

Output atteso:

```text
Somma prima del limite: 11
Indice trovato: 0
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/04_Cicli_Iterazioni/03_Break_e_Continue.php). Nel catalogo web scegli **Cicli e iterazioni → Break, continue e ricerca**.

## Prova tu

Cerca il primo voto insufficiente e restituiscine l'indice. Prova insufficienza al primo posto, all'ultimo posto e nessuna insufficienza.

---

[Guida precedente](02_Foreach_Array_e_Oggetti.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](04_Cicli_Annidati.md)
