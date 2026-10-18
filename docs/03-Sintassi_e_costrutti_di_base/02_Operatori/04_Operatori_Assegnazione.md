# Operatori di assegnazione

`=` assegna il risultato di un'espressione. Le forme composte aggiornano una
variabile: `+=`, `-=`, `*=`, `/=`, `%=`, `**=` e `.=` combinano operazione e assegnazione.

```php
$punti = 10;
$punti += 5;             // Equivale a $punti = $punti + 5.
$messaggio = 'Ciao';
$messaggio .= ', Ada';   // Concatena testo.
```

`??=` assegna un valore soltanto se la variabile o la chiave è assente oppure
vale `null`. Non sostituisce `0`, `false` o una stringa vuota già presenti.

## Copie e riferimenti

Una normale assegnazione di valori scalari permette di modificare la nuova
variabile senza cambiare quella originale. Con `=&` crei invece un alias:
modificare una delle due variabili modifica il valore condiviso. Usa un
riferimento soltanto quando vuoi davvero questo collegamento.

Gli oggetti hanno una propria identità condivisa anche senza `&`, come visto
nella guida sui tipi complessi. L'assegnazione di un oggetto non è una clonazione.

Riferimenti: [Assegnazione](https://www.php.net/manual/en/language.operators.assignment.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

$punti = 10;
$punti += 5;
$punti *= 2;
echo 'Punti: ', $punti, PHP_EOL;

$messaggio = 'Ciao';
$messaggio .= ', Ada';
echo $messaggio, PHP_EOL;

$opzioni = ['limite' => 0, 'tema' => null];
$opzioni['limite'] ??= 10;
$opzioni['tema'] ??= 'chiaro';
echo 'Opzioni: ', $opzioni['limite'], '/', $opzioni['tema'], PHP_EOL;

$originale = 4;
$copia = $originale;
$copia = 9;
$alias = &$originale;
$alias += 2;
echo 'Valori: ', $originale, '/', $copia, PHP_EOL;
```

Output atteso:

```text
Punti: 30
Ciao, Ada
Opzioni: 0/chiaro
Valori: 6/9
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/02_Operatori/04_Operatori_Assegnazione.php). Nel catalogo web scegli **Operatori → Operatori di assegnazione**.

## Prova tu

Crea opzioni con una chiave assente, una null e una zero. Applica ??= e verifica quali valori vengono sostituiti.

---

[Guida precedente](03_Operatori_Logici.md) · [Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](05_Operatori_Avanzati.md)
