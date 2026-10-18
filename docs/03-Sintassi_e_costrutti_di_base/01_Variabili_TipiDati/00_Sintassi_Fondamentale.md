# Sintassi fondamentale di PHP

Uno script PHP inizia con `<?php`. Le istruzioni terminano normalmente con `;`;
le parentesi graffe `{}` delimitano blocchi di istruzioni. I commenti si possono
scrivere con `//`, `#` oppure `/* ... */`.

Nei file che contengono soltanto codice PHP omettiamo il tag di chiusura `?>`.
In un documento misto, PHP elabora i blocchi delimitati dai tag e lascia passare
l'HTML esterno. La forma `<?= $valore ?>` equivale a stampare quel valore.

## Output e tipi

`echo` invia testo all'output; `var_dump()` mostra anche il tipo dei dati.
`PHP_EOL` separa righe di testo: in una pagina HTML i ritorni a capo non producono
automaticamente interruzioni visive. Il catalogo degli esempi usa un blocco
`<pre>` per conservarli.

Quando inserisci dati esterni nel testo HTML devi codificarli per quel contesto,
per esempio con `htmlspecialchars()`. Stampare una variabile non la rende
automaticamente un testo sicuro per ogni possibile contesto della pagina.

## Come eseguire e controllare un file

Usa `php percorso/file.php` per eseguirlo da terminale e `php -l percorso/file.php`
per controllarne la sintassi. Per il browser serve un server che esegua PHP:
aprire il sorgente con `file://` non avvia l'interprete.

Gli esempi iniziano con `declare(strict_types=1)`: approfondiremo la sua
relazione con i parametri delle funzioni nella guida sulle conversioni.

Riferimenti: [Sintassi di base](https://www.php.net/manual/en/language.basic-syntax.php).

## Esempio completo

```php
<?php
declare(strict_types=1);

// Un commento su una riga.
$linguaggio = 'PHP';

/* Un commento
   su più righe. */
echo "Ciao, $linguaggio!", PHP_EOL;
echo '2 + 3 = ', 2 + 3, PHP_EOL;
```

Output atteso:

```text
Ciao, PHP!
2 + 3 = 5
```

[Sorgente eseguibile](../../../www/03-sintassi-e-costrutti-di-base/esempi/01_Variabili_TipiDati/00_Sintassi_Fondamentale.php). Nel catalogo web scegli **Variabili e tipi di dati → Sintassi fondamentale di PHP**.

## Prova tu

Aggiungi un commento con il tuo nome e una seconda istruzione echo. Togli temporaneamente un punto e virgola, controlla il file con php -l e poi correggilo.

---

[Indice della sezione](README.md) · [Esercizi](esercizi/README.md) · [Guida successiva](01_Dichiarazione_Variabili.md)
