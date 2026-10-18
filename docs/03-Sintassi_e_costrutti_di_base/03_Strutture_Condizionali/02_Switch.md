# Switch e selezione tra casi

`switch` confronta un'espressione con più casi. `case` individua un valore;
`default` gestisce i valori senza un caso dedicato. `break` termina lo switch.

## Casi condivisi e fall-through

Più etichette possono precedere lo stesso blocco, come sabato e domenica
nell'esempio. Se manca `break`, l'esecuzione prosegue nei blocchi successivi:
questo comportamento si chiama fall-through e va usato soltanto intenzionalmente.

`switch` usa confronti non stretti: il numero `1` e la stringa `'1'` possono
corrispondere allo stesso caso. Non presumere il confronto stretto dello
switch JavaScript. La guida a `match` mostra un'alternativa con confronti `===`.

## Quando usarlo

Uno switch è utile per un insieme di codici o etichette. Per intervalli,
condizioni combinate o controlli di validità una catena `if`/`elseif` spesso
esprime meglio la regola.

Riferimenti: [switch](https://www.php.net/manual/en/control-structures.switch.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$giorno = 'sabato';
switch ($giorno) {
    case 'sabato':
    case 'domenica':
        $tipo = 'fine settimana';
        break;
    default:
        $tipo = 'giorno da verificare';
}
echo $giorno, ': ', $tipo, PHP_EOL;

$codice = '1';
switch ($codice) {
    case 1:
        echo 'La stringa 1 corrisponde al caso intero 1.', PHP_EOL;
        break;
    default:
        echo 'Nessuna corrispondenza.', PHP_EOL;
}
```

Output atteso:

```text
sabato: fine settimana
La stringa 1 corrisponde al caso intero 1.
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/03_Strutture_Condizionali/02_Switch.php). Nel catalogo web scegli **Strutture condizionali → Switch e selezione tra casi**.

## Prova tu

Crea uno switch per le operazioni somma, differenza e prodotto. Gestisci un nome operazione sconosciuto con default.

---

[Guida precedente](01_If_Else.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](03_Operatore_Ternario.md)
