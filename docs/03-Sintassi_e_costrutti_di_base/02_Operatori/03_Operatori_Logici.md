# Operatori logici e cortocircuito

`&&` richiede due condizioni vere; `||` richiede almeno una condizione vera;
`!` nega il valore logico. In PHP `&&` e `||` restituiscono un booleano:
non selezionano e restituiscono un operando come fanno in JavaScript.

## Cortocircuito

Se il primo operando determina già il risultato, il secondo non viene valutato.
Questo permette di controllare un divisore prima di eseguire la divisione:
`$divisore !== 0 && $totale / $divisore > 2`.

I valori convertiti a falso includono `false`, `0`, `0.0`, `''`, `'0'`, `[]`
e `null`. La stringa `'false'` è invece vera. Oggetti ordinari sono veri anche
quando non hanno proprietà. Non trasferire da JavaScript le regole di array
vuoti e stringa `'0'`.

## Precedenza di and e or

Esistono anche `and`, `or` e `xor`. `and` e `or` hanno precedenza diversa da
`&&` e `||`, soprattutto rispetto all'assegnazione. Nel corso usiamo normalmente
`&&`, `||` e parentesi per rendere leggibile la condizione.

Riferimenti: [Logica e precedenza](https://www.php.net/manual/en/language.operators.logical.php), [Conversione a booleano](https://www.php.net/manual/en/language.types.boolean.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$eta = 20;
$haBiglietto = true;
var_dump($eta >= 18 && $haBiglietto);

$divisore = 0;
var_dump($divisore !== 0 && 10 / $divisore > 2);
var_dump('Ada' || 'Ospite');
var_dump((bool) '0', (bool) [], (bool) 'false');

$conAnd = true and false;
$conDoppioAnd = true && false;
var_dump($conAnd, $conDoppioAnd);
```

Output atteso:

```text
bool(true)
bool(false)
bool(true)
bool(false)
bool(false)
bool(true)
bool(true)
bool(false)
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/02_Operatori/03_Operatori_Logici.php). Nel catalogo web scegli **Operatori → Operatori logici e cortocircuito**.

## Prova tu

Scrivi una condizione di accesso che richieda account attivo e ruolo admin oppure docente. Usa parentesi e prova almeno quattro combinazioni.

---

[Guida precedente](02_Operatori_Confronto.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](04_Operatori_Assegnazione.md)
