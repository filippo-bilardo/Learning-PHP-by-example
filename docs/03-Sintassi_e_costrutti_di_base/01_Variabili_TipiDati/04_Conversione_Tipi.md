# Conversione e validazione dei tipi

Una conversione esplicita si scrive con un cast, per esempio `(int)`, `(float)`,
`(string)` o `(bool)`. Alcune operazioni effettuano conversioni implicite, ma
non tutti i dati possono essere convertiti in modo utile.

## Convertire non significa validare

Il cast `(int) '12mele'` produce `12`: non dimostra che il testo rappresenti
un intero valido. Per verificare un intero testuale puoi usare
`filter_var($testo, FILTER_VALIDATE_INT)` e confrontare il risultato con `false`
tramite `===`. Il valore valido `0` non va confuso con un errore.

In PHP 8 un'operazione aritmetica con testo non numerico può generare un
`TypeError`: non usare `+` per concatenare stringhe.

## Tipizzazione dinamica e strict_types

`declare(strict_types=1)` abilita controlli stretti sulle dichiarazioni scalari:
per i parametri conta il file che effettua la chiamata, per i valori restituiti
il file che definisce la funzione.
Non impedisce di riassegnare una variabile ordinaria con un tipo diverso e non
disabilita tutte le conversioni negli operatori. Le firme delle funzioni saranno
approfondite nel capitolo dedicato.

Riferimenti: [Conversioni implicite](https://www.php.net/manual/en/language.types.type-juggling.php), [Dichiarazioni di tipo](https://www.php.net/manual/en/language.types.declarations.php), [filter_var](https://www.php.net/manual/en/function.filter-var.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$testo = '42';
$numero = (int) $testo;
echo $numero + 8, PHP_EOL;
echo 'Cast parziale: ', (int) '12mele', PHP_EOL;

$zero = filter_var('0', FILTER_VALIDATE_INT);
$errato = filter_var('12mele', FILTER_VALIDATE_INT);
var_dump($zero === 0, $errato === false);
var_dump((bool) '0', (bool) 'false');

$somma = static function (int $a, int $b): int {
    return $a + $b;
};

try {
    $somma('2', 3);
} catch (TypeError $errore) {
    echo 'Il parametro stringa non rispetta il tipo int.', PHP_EOL;
}
```

Output atteso:

```text
50
Cast parziale: 12
bool(true)
bool(true)
bool(false)
bool(true)
Il parametro stringa non rispetta il tipo int.
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/01_Variabili_TipiDati/04_Conversione_Tipi.php). Nel catalogo web scegli **Variabili e tipi di dati → Conversione e validazione dei tipi**.

## Prova tu

Prova i testi "0", "18", "diciotto" e "18anni". Confronta il cast con FILTER_VALIDATE_INT e tratta esplicitamente il risultato false.

---

[Guida precedente](03_Tipi_Complessi.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](05_Scope_e_Visibilita.md)
