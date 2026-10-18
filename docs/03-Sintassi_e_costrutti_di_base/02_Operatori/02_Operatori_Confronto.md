# Operatori di confronto

Un confronto produce un booleano. `==` verifica l'uguaglianza con le conversioni
previste da PHP; `===` richiede stesso tipo e stesso valore. `!=` e `!==`
esprimono le rispettive disuguaglianze. `<`, `<=`, `>` e `>=` confrontano l'ordine.

## Confronti espliciti

Per identificatori, codici e risultati di validazione preferisci confronti di
cui conosci tipo e significato. Il confronto stretto distingue, per esempio,
l'intero `0`, la stringa `'0'`, `false` e `null`.

L'operatore `<=>`, detto spaceship, restituisce un intero negativo, zero o positivo
secondo l'ordine degli operandi. Non sostituisce la validazione dei dati.

Per i float calcolati serve talvolta una tolleranza scelta per il problema;
non usare alla cieca il confronto esatto per risultati approssimati. Anche i
confronti non stretti tra numeri e stringhe hanno regole specifiche di PHP 8.

Riferimenti: [Confronti PHP](https://www.php.net/manual/en/language.operators.comparison.php), [Precisione dei float](https://www.php.net/manual/en/language.types.float.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

var_dump(5 == '5');
var_dump(5 === '5');
var_dump(0 === false);
var_dump(8 >= 6);
echo 'Ordine: ', 3 <=> 8, PHP_EOL;

$calcolato = 0.1 + 0.2;
$atteso = 0.3;
$tolleranza = 0.000001;
var_dump(abs($calcolato - $atteso) < $tolleranza);
```

Output atteso:

```text
bool(true)
bool(false)
bool(false)
bool(true)
Ordine: -1
bool(true)
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/02_Operatori/02_Operatori_Confronto.php). Nel catalogo web scegli **Operatori → Operatori di confronto**.

## Prova tu

Confronta 0, "0", false e null sia con == sia con ===. Spiega ogni risultato indicando i tipi coinvolti.

---

[Guida precedente](01_Operatori_Aritmetici.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](03_Operatori_Logici.md)
