# Array, oggetti e altri tipi

Un array PHP è una mappa ordinata: può rappresentare una sequenza con chiavi
intere oppure associare nomi a valori. Non è una copia del modello Array di JavaScript.

```php
$voti = [7, 8, 9];
$studente = ['nome' => 'Ada', 'classe' => '3A'];
echo $voti[0];
echo $studente['nome'];
```

Si aggiunge un elemento con `$voti[] = 10`; `count($voti)` conta gli elementi.
Gli indici numerici possono avere interruzioni: dopo aver eliminato una chiave,
gli indici successivi non vengono automaticamente rinumerati.

## Copia di array e identità degli oggetti

Una normale assegnazione di un array permette di modificare la copia senza
cambiare l'originale, finché non introduci riferimenti espliciti. Gli oggetti
contenuti nell'array mantengono però la loro identità condivisa.

Due variabili assegnate allo stesso oggetto identificano lo stesso oggetto:
modificare una proprietà tramite una variabile è visibile tramite l'altra.
`clone` crea una copia superficiale; la copia profonda di strutture annidate
richiede ulteriori scelte.

PHP dispone anche di oggetti funzione come `Closure` e di risorse gestite da
alcune estensioni. Li approfondiremo con funzioni, classi e accesso ai file.

Riferimenti: [Array](https://www.php.net/manual/en/language.types.array.php), [Oggetti](https://www.php.net/manual/en/language.types.object.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$numeri = [3, 5, 7];
$copia = $numeri;
$copia[0] = 99;
echo 'Array originale: ', $numeri[0], PHP_EOL;
echo 'Array copiato: ', $copia[0], PHP_EOL;

$studente = ['nome' => 'Ada', 'voti' => [7, 8]];
echo $studente['nome'], ': ', count($studente['voti']), ' voti', PHP_EOL;

$persona = (object) ['nome' => 'Ada'];
$altraVariabile = $persona;
$altraVariabile->nome = 'Grace';
echo 'Oggetto condiviso: ', $persona->nome, PHP_EOL;

$personaCopiata = clone $persona;
$personaCopiata->nome = 'Linus';
echo 'Dopo clone: ', $persona->nome, '/', $personaCopiata->nome, PHP_EOL;
```

Output atteso:

```text
Array originale: 3
Array copiato: 99
Ada: 2 voti
Oggetto condiviso: Grace
Dopo clone: Grace/Linus
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/01_Variabili_TipiDati/03_Tipi_Complessi.php). Nel catalogo web scegli **Variabili e tipi di dati → Array, oggetti e altri tipi**.

## Prova tu

Crea un array di due prodotti con nome e quantità. Modifica la copia di una quantità e verifica quale struttura cambia.

---

[Guida precedente](02_Tipi_Scalari_e_Null.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](04_Conversione_Tipi.md)
