# Operatori aritmetici

Gli operatori `+`, `-`, `*`, `/`, `%` e `**` eseguono rispettivamente somma,
sottrazione, prodotto, divisione, resto e potenza. `intdiv()` restituisce il
quoziente intero. Il resto `%` opera su interi e il suo segno segue il dividendo.

## Divisione e precedenza

`/` non è una divisione intera: può produrre una parte frazionaria. Verifica il
divisore prima di dividere; una divisione per zero genera un errore. Usa parentesi
quando rendono chiaro l'ordine delle operazioni.

`++` e `--` modificano una variabile numerica di una unità. La forma postfissa
restituisce il valore precedente; quella prefissa restituisce il valore aggiornato.
Evita espressioni che modificano più volte la stessa variabile.

## Numeri e testo

La concatenazione si scrive con `.`, non con `+`. Per combinare una somma e un
testo rendi visibile il calcolo: `echo 'Totale: ' . ($a + $b);`.

Riferimenti: [Aritmetica](https://www.php.net/manual/en/language.operators.arithmetic.php), [Precedenza](https://www.php.net/manual/en/language.operators.precedence.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$a = 17;
$b = 5;
echo 'Somma: ', $a + $b, PHP_EOL;
echo 'Divisione: ', $a / $b, PHP_EOL;
echo 'Quoziente intero: ', intdiv($a, $b), PHP_EOL;
echo 'Resto: ', $a % $b, PHP_EOL;
echo 'Potenza: ', 2 ** 3, PHP_EOL;
echo 'Con parentesi: ', (2 + 3) * 4, PHP_EOL;

$contatore = 2;
echo 'Post incremento: ', $contatore++, PHP_EOL;
echo 'Pre incremento: ', ++$contatore, PHP_EOL;
```

Output atteso:

```text
Somma: 22
Divisione: 3.4
Quoziente intero: 3
Resto: 2
Potenza: 8
Con parentesi: 20
Post incremento: 2
Pre incremento: 4
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/02_Operatori/01_Operatori_Aritmetici.php). Nel catalogo web scegli **Operatori → Operatori aritmetici**.

## Prova tu

Calcola quoziente intero e resto di 23 diviso 4. Aggiungi un controllo che impedisca di usare un divisore zero.

---

[Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](02_Operatori_Confronto.md)
