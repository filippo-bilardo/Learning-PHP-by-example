<?php
session_start();

$errore = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        $_SESSION = [];
        session_destroy();
        header('Location: ./');
        exit;
    }

    // Credenziali fisse solo per questo esempio didattico, senza database.
    if (($_POST['username'] ?? '') === 'admin' && ($_POST['password'] ?? '') === 'php123') {
        session_regenerate_id(true);
        $_SESSION['utente'] = 'admin';
        header('Location: ./');
        exit;
    }

    $errore = 'Nome utente o password non corretti.';
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina riservata</title>
</head>
<body>
    <h1>Pagina riservata</h1>

    <?php if (isset($_SESSION['utente'])): ?>
        <p>Benvenuto, admin! Hai effettuato l'accesso all'area riservata.</p>
        <form method="post">
            <button type="submit" name="logout" value="1">Esci</button>
        </form>
    <?php else: ?>
        <p>Esempio didattico: nome utente <strong>admin</strong>, password <strong>php123</strong>.</p>

        <?php if ($errore !== ''): ?>
            <p role="alert"><?= $errore ?></p>
        <?php endif; ?>

        <form method="post">
            <p>
                <label for="username">Nome utente</label><br>
                <input id="username" name="username" type="text" autocomplete="username" required>
            </p>
            <p>
                <label for="password">Password</label><br>
                <input id="password" name="password" type="password" autocomplete="current-password" required>
            </p>
            <button type="submit">Accedi</button>
        </form>
    <?php endif; ?>

    <p><a href="../">Torna al corso</a></p>
</body>
</html>
