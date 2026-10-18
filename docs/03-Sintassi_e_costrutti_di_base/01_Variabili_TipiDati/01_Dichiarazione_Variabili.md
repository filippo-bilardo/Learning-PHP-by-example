# Dichiarazione di variabili e costanti

Una variabile PHP si scrive con `$` seguito dal nome. L'assegnazione iniziale
crea la variabile e le associa un valore: non servono `let`, `var` o `const`
come dichiarazioni di variabili locali. I nomi distinguono maiuscole e minuscole;
nel corso usiamo nomi descrittivi con lettere ASCII, numeri e underscore,
senza iniziare con una cifra.

## Assegnazione e tipo

`=` assegna un valore; non verifica l'uguaglianza. Una variabile ordinaria può
contenere valori di tipi diversi in momenti successivi. Inizializzala prima
di leggerla: una lettura diretta di una variabile inesistente produce un warning.

Per osservare i dati usa `echo` per il testo, `var_dump()` per tipo e valore,
oppure `get_debug_type()` per il nome del tipo. `PHP_EOL` produce una nuova riga
adatta all'ambiente console.

## Costanti

Una costante definita con `const` non ha `$` e conserva il proprio valore durante
l'esecuzione. Per convenzione i nomi sono maiuscoli. È utile per dati fissati
dal programma, come il numero massimo di tentativi. Le proprietà degli oggetti
e la loro visibilità verranno approfondite nel capitolo sulla programmazione a oggetti.

Riferimenti: [Variabili PHP](https://www.php.net/manual/en/language.variables.basics.php), [Costanti](https://www.php.net/manual/en/language.constants.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$nome = 'Ada';
$tentativi = 1;
$tentativi = $tentativi + 1;
const MAX_TENTATIVI = 3;

echo "Studente: $nome", PHP_EOL;
echo 'Tentativi: ', $tentativi, '/', MAX_TENTATIVI, PHP_EOL;

$dato = 42;
echo get_debug_type($dato), PHP_EOL;
$dato = 'quarantadue';
echo get_debug_type($dato), PHP_EOL;
```

Output atteso:

```text
Studente: Ada
Tentativi: 2/3
int
string
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/01_Variabili_TipiDati/01_Dichiarazione_Variabili.php). Nel catalogo web scegli **Variabili e tipi di dati → Dichiarazione di variabili e costanti**.

## Prova tu

Aggiungi una variabile per la classe e una costante per il nome del corso. Modifica solo i valori che devono poter cambiare.

---

[Guida precedente](00_Sintassi_Fondamentale.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](02_Tipi_Scalari_e_Null.md)
