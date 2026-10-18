# Foreach su array e oggetti

`foreach ($dati as $valore)` visita i valori di un array.
`foreach ($dati as $chiave => $valore)` rende disponibile anche la chiave.
Funziona con array associativi e con chiavi numeriche non consecutive, senza
dover inventare indici da zero a `count($dati) - 1`.

## Modificare gli elementi

Nel normale ciclo per valore, riassegnare `$valore` non aggiorna l'elemento
dell'array originale. Per un aggiornamento esplicito puoi assegnare a
`$dati[$chiave]`.

La forma `foreach ($dati as &$valore)` usa invece riferimenti: dopo il ciclo
va eseguito `unset($valore)` per rimuovere il collegamento all'ultimo elemento.
L'esempio usa un aggiornamento tramite chiave per mantenere visibile la modifica.

## Oggetti

Su un oggetto ordinario `foreach` visita le proprietà visibili dal contesto
corrente. Gli oggetti che implementano interfacce di iterazione possono
definire un comportamento diverso; li studieremo con la programmazione a oggetti.

Riferimenti: [foreach](https://www.php.net/manual/en/control-structures.foreach.php), [Iterazione degli oggetti](https://www.php.net/manual/en/language.oop5.iterations.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$voti = [2 => 6, 5 => 8];
foreach ($voti as $indice => $voto) {
    echo $indice, ': ', $voto, PHP_EOL;
}

$quantita = ['quaderni' => 2, 'penne' => 3];
foreach ($quantita as $nome => $numero) {
    $quantita[$nome] = $numero + 1;
}
echo 'Quaderni aggiornati: ', $quantita['quaderni'], PHP_EOL;

$studente = (object) ['nome' => 'Ada', 'classe' => '3A'];
foreach ($studente as $campo => $valore) {
    echo $campo, '=', $valore, PHP_EOL;
}
```

Output atteso:

```text
2: 6
5: 8
Quaderni aggiornati: 3
nome=Ada
classe=3A
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/04_Cicli_Iterazioni/02_Foreach_Array_e_Oggetti.php). Nel catalogo web scegli **Cicli e iterazioni → Foreach su array e oggetti**.

## Prova tu

Somma le quantità di un array associativo. Aggiungi una chiave numerica non consecutiva a un altro array e verifica che foreach la visiti.

---

[Guida precedente](01_Cicli_Base.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](03_Break_e_Continue.md)
