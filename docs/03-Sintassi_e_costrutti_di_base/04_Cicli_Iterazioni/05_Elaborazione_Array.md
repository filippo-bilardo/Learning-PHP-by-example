# Trasformare, filtrare e aggregare array

Un'elaborazione di collezioni può trasformare ogni elemento, selezionare un
sottoinsieme oppure calcolare un risultato complessivo. `foreach` permette
di esprimere tutti questi compiti; alcune funzioni rendono esplicita l'operazione.

| Funzione | Compito nell'esempio |
|---|---|
| `array_map()` | Calcola un nuovo valore per ciascun voto |
| `array_filter()` | Seleziona i voti sufficienti |
| `array_reduce()` | Accumula la somma dei voti |

## Callback e arrow function

Una callback è una funzione passata come argomento a un'altra funzione.
La forma `fn (int $voto): int => $voto * 2` descrive una funzione con una sola
espressione. È un'anticipazione del capitolo sulle funzioni.

`array_filter()` conserva le chiavi degli elementi selezionati: usa
`array_values()` se ti serve una nuova sequenza indicizzata da zero.
Passa una callback quando vuoi un criterio preciso: senza callback la funzione
elimina i valori valutati come falsi, compresi zero e stringa `'0'`.

## Accumulatori e collezioni vuote

Nella riduzione fornisci un valore iniziale coerente, come `0` per una somma.
Prima di calcolare una media controlla il numero di elementi, evitando una
divisione per zero sull'array vuoto. Scegli la forma più leggibile: una funzione
di array non è automaticamente preferibile a un ciclo esplicito.

Riferimenti: [array_map](https://www.php.net/manual/en/function.array-map.php), [array_filter](https://www.php.net/manual/en/function.array-filter.php), [array_reduce](https://www.php.net/manual/en/function.array-reduce.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$voti = [4, 6, 8];
$doppi = array_map(static fn (int $voto): int => $voto * 2, $voti);
$sufficienti = array_filter($voti, static fn (int $voto): bool => $voto >= 6);
$somma = array_reduce($voti, static fn (int $totale, int $voto): int => $totale + $voto, 0);
$media = count($voti) > 0 ? $somma / count($voti) : null;

echo 'Doppi: ', implode(', ', $doppi), PHP_EOL;
echo 'Sufficienti: ', implode(', ', array_values($sufficienti)), PHP_EOL;
echo 'Chiavi conservate: ', implode(', ', array_keys($sufficienti)), PHP_EOL;
echo 'Somma: ', $somma, PHP_EOL;
echo 'Media: ', $media ?? 'non disponibile', PHP_EOL;
```

Output atteso:

```text
Doppi: 8, 12, 16
Sufficienti: 6, 8
Chiavi conservate: 1, 2
Somma: 18
Media: 6
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/04_Cicli_Iterazioni/05_Elaborazione_Array.php). Nel catalogo web scegli **Cicli e iterazioni → Trasformare, filtrare e aggregare array**.

## Prova tu

Ripeti somma, filtro e media con foreach. Prova anche un array vuoto e un array che contiene soltanto zero.

---

[Guida precedente](04_Cicli_Annidati.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md)
