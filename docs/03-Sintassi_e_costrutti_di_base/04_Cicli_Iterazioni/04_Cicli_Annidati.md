# Cicli annidati e matrici

Un ciclo può contenerne un altro. Il ciclo interno completa le proprie
iterazioni per ciascun elemento del ciclo esterno. È un modello utile per
righe e colonne, tabelle e dati organizzati in gruppi.

## Numero delle iterazioni

Se un ciclo compie `n` passaggi e il ciclo interno ne compie sempre `m`, il
corpo interno viene eseguito `n * m` volte. Stabilisci dimensioni ragionevoli
per un esempio web e controlla i limiti prima di generare grandi risposte.

Con array di righe di lunghezza diversa, `foreach` visita gli elementi realmente
presenti in ogni riga. L'accumulatore di una singola riga va inizializzato
all'inizio di ogni passaggio esterno.

## Uscire da due cicli

`break 2` termina i due livelli che lo contengono. È utile in una ricerca
annidata, ma rendi chiaro il risultato con una variabile inizializzata prima
della ricerca. Per logiche più estese una funzione dedicata può essere più leggibile.

Riferimenti: [for](https://www.php.net/manual/en/control-structures.for.php), [foreach](https://www.php.net/manual/en/control-structures.foreach.php), [break con livelli](https://www.php.net/manual/en/control-structures.break.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$matrice = [[1, 2, 3], [4, 5, 6]];
foreach ($matrice as $indice => $riga) {
    $sommaRiga = 0;
    foreach ($riga as $numero) {
        $sommaRiga += $numero;
    }
    echo 'Riga ', $indice, ': ', $sommaRiga, PHP_EOL;
}

$posizione = null;
foreach ($matrice as $r => $riga) {
    foreach ($riga as $c => $numero) {
        if ($numero === 5) {
            $posizione = [$r, $c];
            break 2;
        }
    }
}
echo 'Posizione di 5: ', implode(',', $posizione ?? []), PHP_EOL;
```

Output atteso:

```text
Riga 0: 6
Riga 1: 15
Posizione di 5: 1,1
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/04_Cicli_Iterazioni/04_Cicli_Annidati.php). Nel catalogo web scegli **Cicli e iterazioni → Cicli annidati e matrici**.

## Prova tu

Calcola la somma di ciascuna riga di una matrice con righe di lunghezza diversa. Poi cerca un valore assente e gestisci il risultato null.

---

[Guida precedente](03_Break_e_Continue.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](05_Elaborazione_Array.md)
