# Esercizi: operatori

Per ogni programma separa dati iniziali, calcolo e output. Non usare input
casuale: prepara casi ripetibili, compresi valori limite e valori zero.

| N. | Consegna | Risultati o casi attesi |
|---|---|---|
| 1 | Realizza quattro operazioni con due numeri e gestisci il divisore zero. | Con 12 e 3: 15, 9, 36, 4; nessuna divisione se il divisore è 0 |
| 2 | Calcola quoziente intero e resto. | 23 diviso 4: quoziente 5, resto 3 |
| 3 | Confronta una matrice di valori con `==` e `===`. | Includi `0`, `'0'`, `false` e `null`; indica i tipi |
| 4 | Verifica account attivo e ruolo tra admin e docente. | Account inattivo sempre escluso; account attivo con ruolo studente escluso |
| 5 | Completa opzioni mancanti con `??=`. | Preserva `0` e `false`; sostituisci `null` e chiave assente |
| 6 | Unisci due array di configurazione con `+` e con unpacking. | Con chiave tema duplicata, osserva quale valore prevale |
| 7 | Usa i bit 1, 2 e 4 per lettura, scrittura ed esecuzione. | Con permessi 3: lettura e scrittura sì, esecuzione no |

## Spiega prima di eseguire

Quali valori vengono assegnati dalle espressioni seguenti?

```php
$a = true and false;
$b = true && false;
$c = 'Ada' || 'Ospite';
$d = '0' ?: 'Ospite';
$e = '0' ?? 'Ospite';
```

Controlla anche i tipi: `$c` è un booleano, non il nome selezionato.


---

[Indice della sezione](../README.md) · [Indice del capitolo](../../README.md)
