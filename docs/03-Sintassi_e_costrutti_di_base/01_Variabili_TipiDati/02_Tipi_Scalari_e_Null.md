# Tipi scalari e null

I quattro tipi scalari di base sono `int`, `float`, `string` e `bool`.
`null` rappresenta esplicitamente l'assenza di un valore.

| Tipo | Esempio | Osservazione |
|---|---|---|
| `int` | `18` | Numero intero; intervallo dipendente dalla piattaforma |
| `float` | `12.5` | Numero con parte frazionaria, generalmente approssimato |
| `string` | `'Ada'` | Sequenza di byte usata per rappresentare testo |
| `bool` | `true` | Valore logico `true` o `false` |
| `null` | `null` | Assenza esplicita di valore |

## Stringhe e numeri

Le virgolette doppie consentono l'interpolazione di variabili; quelle singole
mantengono il testo letterale, salvo gli escape previsti. La concatenazione
si scrive con `.`, mentre `+` esegue un'operazione numerica.

I `float` non rappresentano esattamente ogni frazione decimale: evita di
assumere che calcoli approssimati siano sempre uguali cifra per cifra.
`strlen()` misura byte, non necessariamente caratteri Unicode.

## Differenze rispetto a JavaScript

PHP distingue `int` e `float`; non ha il valore `undefined` di JavaScript.
Una variabile mai inizializzata e una variabile inizializzata a `null` non sono
la stessa situazione. Anche `Symbol` e la sintassi `123n` di BigInt non sono
tipi o letterali PHP equivalenti da copiare negli esempi.

Riferimenti: [Interi](https://www.php.net/manual/en/language.types.integer.php), [Float](https://www.php.net/manual/en/language.types.float.php), [Stringhe](https://www.php.net/manual/en/language.types.string.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$eta = 18;
$prezzo = 12.5;
$nome = 'Ada';
$iscritto = true;
$telefono = null;

foreach ([$eta, $prezzo, $nome, $iscritto, $telefono] as $valore) {
    echo get_debug_type($valore), PHP_EOL;
}

echo "Ciao $nome", PHP_EOL;
echo 'Ciao $nome', PHP_EOL;
var_dump($telefono === null);
```

Output atteso:

```text
int
float
string
bool
null
Ciao Ada
Ciao $nome
bool(true)
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/01_Variabili_TipiDati/02_Tipi_Scalari_e_Null.php). Nel catalogo web scegli **Variabili e tipi di dati → Tipi scalari e null**.

## Prova tu

Crea un prezzo come float e come stringa. Osserva i tipi e confronta il testo prodotto con virgolette singole e doppie.

---

[Guida precedente](01_Dichiarazione_Variabili.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](03_Tipi_Complessi.md)
