# Operatore ternario

L'espressione `condizione ? valoreSeVero : valoreSeFalso` seleziona un valore.
È adatta a una scelta breve, per esempio l'etichetta di un risultato.

## Forma completa e forma abbreviata

`$valore ?: $alternativa` restituisce `$valore` se è valutato come vero,
altrimenti l'alternativa. Anche la stringa `'0'` è valutata come falsa in PHP.
`$valore ?? $alternativa` ha un significato diverso: usa l'alternativa soltanto
quando il valore è assente o `null`.

## Leggibilità e parentesi

Il ternario è un'espressione, mentre `if` è una struttura di controllo.
Per più istruzioni o più fasce scegli normalmente `if`/`elseif`. In PHP 8
non puoi concatenare liberamente ternari completi senza parentesi: evita di
copiare una catena JavaScript senza adattarla.

La forma abbreviata non evita il warning se leggi direttamente una variabile
inesistente. Per valori opzionali usa un controllo o la coalescenza nulla.

Riferimenti: [Ternario e coalescenza](https://www.php.net/manual/en/language.operators.comparison.php), [Precedenza](https://www.php.net/manual/en/language.operators.precedence.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$voto = 7;
$esito = $voto >= 6 ? 'Promosso' : 'Da recuperare';
echo $esito, PHP_EOL;

$nome = '';
echo 'Nome: ', $nome ?: 'Ospite', PHP_EOL;

$quantita = '0';
echo 'Con ?: ', $quantita ?: 'assente', PHP_EOL;
echo 'Con ??: ', $quantita ?? 'assente', PHP_EOL;
```

Output atteso:

```text
Promosso
Nome: Ospite
Con ?: assente
Con ??: 0
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/03_Strutture_Condizionali/03_Operatore_Ternario.php). Nel catalogo web scegli **Strutture condizionali → Operatore ternario**.

## Prova tu

Scrivi con if/else e poi con il ternario una scelta tra pari e dispari. Confronta ?: e ?? con false, zero, stringa vuota e null.

---

[Guida precedente](02_Switch.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](04_Valutazione_Condizionale.md)
