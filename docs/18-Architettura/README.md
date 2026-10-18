# Esercitazione 18: Architettura e servizi

## Obiettivi

- Applicare separazione in layer e architettura esagonale.
- Estrarre servizi per email, cache e code.
- Valutare monolite modulare prima dei microservizi.

## Esempio

```text
HTTP Controller -> Application Service -> Domain -> Repository interface
                                           |
                                  Infrastructure adapters
```

Un confine architetturale è utile quando protegge regole di business e permette
test rapidi. Un microservizio aggiunge rete, osservabilità e failure mode: non
è un obiettivo automatico.

## Esercizi

1. Separa il caso d'uso `CreateTask` dal controller.
2. Progetta una coda per notificare la scadenza delle attività.

