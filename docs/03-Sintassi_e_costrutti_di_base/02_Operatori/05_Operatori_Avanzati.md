# Unpacking, accesso nullsafe e operatori bit a bit

Gli operatori avanzati vanno scelti per un compito preciso. L'unpacking `...`
inserisce gli elementi di un array in un altro array o in una chiamata; non è
uno spread generico delle proprietà di un oggetto JavaScript.

## Unpacking di array

Negli array, le chiavi numeriche dell'unpacking vengono rinumerate. In PHP 8.1
e successivi sono ammesse anche chiavi stringa: un valore successivo sostituisce
quello precedente con la stessa chiave stringa. L'operatore `+` tra array ha
regole diverse: mantiene i valori dell'array sinistro per le chiavi già presenti.

## Accesso nullsafe

`?->` accede a una proprietà o a un metodo solo quando l'oggetto non è `null`;
se è `null` restituisce `null` e interrompe quella catena di accesso. Non è la
sintassi `?.` di JavaScript e non si usa come accesso opzionale alle chiavi di un array.
Per una chiave di array puoi usare `??`.

## Bit a bit

Con operandi interi `&`, `|`, `^`, `~`, `<<` e `>>` operano sui bit. Non hanno
il cortocircuito di `&&` e `||`. La dimensione degli interi PHP dipende dalla
piattaforma; non assumere la conversione a interi di 32 bit tipica degli operatori
JavaScript e non usare `>>>`, che non è un operatore PHP.

Riferimenti: [Unpacking di array](https://www.php.net/manual/en/language.types.array.php), [Accesso nullsafe](https://www.php.net/manual/en/language.oop5.basic.php), [Bit a bit](https://www.php.net/manual/en/language.operators.bitwise.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$iniziali = [1, 2];
$numeri = [...$iniziali, 3];
echo 'Numeri: ', implode(', ', $numeri), PHP_EOL;

$config = [...['tema' => 'chiaro'], ...['tema' => 'scuro']];
echo 'Tema: ', $config['tema'], PHP_EOL;

$utente = null;
echo 'Utente: ', $utente?->nome ?? 'Ospite', PHP_EOL;

$lettura = 1;
$scrittura = 2;
$permessi = $lettura | $scrittura;
var_dump(($permessi & $scrittura) !== 0);
echo 'Shift: ', 5 << 1, PHP_EOL;
```

Output atteso:

```text
Numeri: 1, 2, 3
Tema: scuro
Utente: Ospite
bool(true)
Shift: 10
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/02_Operatori/05_Operatori_Avanzati.php). Nel catalogo web scegli **Operatori → Unpacking, accesso nullsafe e operatori bit a bit**.

## Prova tu

Unisci due configurazioni con una chiave stringa duplicata usando + e ...; confronta i risultati e spiega quale valore prevale.

---

[Guida precedente](04_Operatori_Assegnazione.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md)
