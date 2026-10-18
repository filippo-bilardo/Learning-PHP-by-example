# Scope e visibilità delle variabili

Lo scope stabilisce dove una variabile è disponibile. Una funzione ha il proprio
scope locale: una variabile esterna non diventa automaticamente una variabile
locale della funzione. Passare i dati come parametri rende questa dipendenza esplicita.

## Blocchi e funzioni

Un blocco `if` o `for` non crea uno scope di variabili come `let` in JavaScript.
Una variabile assegnata nel blocco resta nello scope circostante; se il ramo
non viene eseguito, quell'assegnazione non avviene.

Una closure può acquisire una variabile esterna con `use ($nome)`, per valore,
oppure con `use (&$nome)`, per riferimento. Le arrow function `fn` acquisiscono
automaticamente per valore le variabili esterne utilizzate.

## Nessun affidamento sull'hoisting di JavaScript

Inizializza le variabili prima di leggerle. Il modello di `var`, la temporal dead
zone di `let` e `const` e la cattura lessicale di JavaScript non si trasferiscono
automaticamente a PHP. `global` e `$GLOBALS` consentono accessi espliciti ai dati
globali, ma in questi esempi preferiamo parametri e acquisizioni visibili.

Le variabili locali non conservano automaticamente lo stato tra richieste HTTP:
per il login abbiamo usato una sessione.

Riferimenti: [Scope delle variabili](https://www.php.net/manual/en/language.variables.scope.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$nome = 'Ada';
if (true) {
    $messaggio = 'Variabile assegnata nel blocco';
}
echo $messaggio, PHP_EOL;

$controllaScope = static function (): bool {
    return isset($nome);
};
var_dump($controllaScope());

$saluta = static function (string $persona): string {
    return 'Ciao, ' . $persona;
};
echo $saluta($nome), PHP_EOL;

$prefisso = 'Benvenuta';
$salutoAcquisito = static function () use ($prefisso, $nome): string {
    return "$prefisso, $nome";
};
$prefisso = 'Salve';
echo $salutoAcquisito(), PHP_EOL;
```

Output atteso:

```text
Variabile assegnata nel blocco
bool(false)
Ciao, Ada
Benvenuta, Ada
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/01_Variabili_TipiDati/05_Scope_e_Visibilita.php). Nel catalogo web scegli **Variabili e tipi di dati → Scope e visibilità delle variabili**.

## Prova tu

Sposta una variabile tra il corpo principale e una funzione. Confronta il passaggio come parametro con una closure che usa use.

---

[Guida precedente](04_Conversione_Tipi.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md)
