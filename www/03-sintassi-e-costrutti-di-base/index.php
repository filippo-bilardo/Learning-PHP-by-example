<?php
declare(strict_types=1);

$catalogo = require __DIR__ . '/catalogo.php';
$richiesta = $_GET['esempio'] ?? '';
$errore = !is_string($richiesta) || ($richiesta !== '' && !isset($catalogo[$richiesta]));

if ($errore) {
    http_response_code(404);
}

$lezione = !$errore && $richiesta !== '' ? $catalogo[$richiesta] : null;
$output = '';
$codice = '';

if ($lezione !== null) {
    // Esegue solo uno dei percorsi definiti dal catalogo del corso.
    ob_start();
    (static function (string $file): void {
        require $file;
    })($lezione['file']);
    $output = ob_get_clean();
    $codice = file_get_contents($lezione['file']);
}

$escape = static fn (string $testo): string => htmlspecialchars($testo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sintassi e costrutti di base — PHP</title>
    <style>
        body { max-width: 960px; margin: 2rem auto; padding: 0 1rem; font: 1rem/1.6 system-ui, sans-serif; color: #243047; }
        h1, h2, h3 { color: #494c80; }
        a { color: #393e91; }
        pre { padding: 1rem; overflow: auto; background: #f0f0f7; border-radius: .4rem; }
        li { margin-bottom: .35rem; }
    </style>
</head>
<body>
    <p><a href="../">Torna al corso</a></p>
    <h1>Sintassi e costrutti di base</h1>
    <p>Scegli un esempio per confrontare il codice PHP con il suo risultato.</p>
    <p><a href="https://github.com/filippo-bilardo/Learning-PHP-by-example/blob/main/docs/03-Sintassi_e_costrutti_di_base/README.md">Guide ed esercizi del capitolo</a></p>

    <?php if ($errore): ?>
        <p role="alert">Esempio non trovato. Scegli uno dei collegamenti del catalogo.</p>
    <?php endif; ?>

    <?php if ($lezione !== null): ?>
        <section aria-labelledby="esempio-selezionato">
            <h2 id="esempio-selezionato"><?= $escape($lezione['titolo']) ?></h2>
            <p><a href="<?= $escape($lezione['guida']) ?>">Leggi la guida</a></p>
            <h3>Risultato</h3>
            <pre><?= $escape($output) ?></pre>
            <details>
                <summary>Codice PHP dell'esempio</summary>
                <pre><code><?= $escape($codice) ?></code></pre>
            </details>
        </section>
    <?php endif; ?>

    <nav aria-label="Catalogo degli esempi">
        <h2>Tutti gli esempi</h2>
        <?php $gruppo = null; ?>
        <?php foreach ($catalogo as $id => $esempio): ?>
            <?php if ($esempio['gruppo'] !== $gruppo): ?>
                <?php if ($gruppo !== null): ?></ul><?php endif; ?>
                <?php $gruppo = $esempio['gruppo']; ?>
                <h3><?= $escape($gruppo) ?></h3>
                <ul>
            <?php endif; ?>
            <li><a href="?esempio=<?= $escape($id) ?>"<?= $richiesta === $id ? ' aria-current="page"' : '' ?>><?= $escape($esempio['titolo']) ?></a></li>
        <?php endforeach; ?>
        <?php if ($gruppo !== null): ?></ul><?php endif; ?>
    </nav>
</body>
</html>
