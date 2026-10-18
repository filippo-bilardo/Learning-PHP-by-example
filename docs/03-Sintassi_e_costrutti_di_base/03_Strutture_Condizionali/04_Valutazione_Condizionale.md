# Valori opzionali, isset ed empty

Un dato può mancare, essere `null`, essere vuoto oppure contenere un valore
valido come zero. Questi casi non sono intercambiabili.

| Controllo | Che cosa verifica |
|---|---|
| `isset($dati['nome'])` | La chiave esiste e il valore non è null |
| `array_key_exists('nome', $dati)` | La chiave esiste, anche se vale null |
| `empty($dati['nome'])` | Il valore manca oppure è valutato come falso |
| `$dati['nome'] ?? 'Ospite'` | Seleziona il valore se presente e non null |

## Scegliere il controllo

`empty()` considera vuota anche la stringa `'0'`. Per una quantità o un
identificatore può quindi scartare un dato valido. Se vuoi rifiutare soltanto
testi vuoti, verifica prima che siano stringhe e poi controlla `trim($testo) === ''`.

Nei form, dati ricevuti dal client vanno validati: una chiave prevista come
testo può contenere un array. La coalescenza gestisce assenza e null, ma non
verifica il tipo o il contenuto.

Ricorda che in PHP `$nome || 'Ospite'` restituisce un booleano. Per selezionare
un testo usa `??`, `?:` o una scelta esplicita secondo il requisito.

Riferimenti: [isset](https://www.php.net/manual/en/function.isset.php), [empty](https://www.php.net/manual/en/function.empty.php), [array_key_exists](https://www.php.net/manual/en/function.array-key-exists.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$dati = ['tentativi' => 0, 'nome' => '', 'email' => null];

echo 'Tentativi: ', $dati['tentativi'] ?? 5, PHP_EOL;
echo 'Città: ', $dati['citta'] ?? 'non indicata', PHP_EOL;
var_dump(isset($dati['email']));
var_dump(array_key_exists('email', $dati));
var_dump(empty('0'));

$nome = $dati['nome'];
if (!is_string($nome) || trim($nome) === '') {
    $nome = 'Ospite';
}
echo 'Nome visualizzato: ', $nome, PHP_EOL;
```

Output atteso:

```text
Tentativi: 0
Città: non indicata
bool(false)
bool(true)
bool(true)
Nome visualizzato: Ospite
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/03_Strutture_Condizionali/04_Valutazione_Condizionale.php). Nel catalogo web scegli **Strutture condizionali → Valori opzionali, isset ed empty**.

## Prova tu

Prepara dati con chiave assente, null, "", "0" e un array. Scegli quali accettare come nome e spiega perché ?? da solo non basta.

---

[Guida precedente](03_Operatore_Ternario.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](05_Match_e_Destrutturazione.md)
