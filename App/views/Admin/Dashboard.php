<?php $base = defined('BASE_URL') ? BASE_URL : ''; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="<?= $base ?>/css/style.css">
</head>
<body>
    <main class="l-main">
        <h1>Tableau de bord</h1>

        <p>
            Bonjour <?= htmlspecialchars($user['firstname']) ?>
            (<?= htmlspecialchars($user['role']) ?>)
        </p>

        <a class="button" href="<?= $base ?>/logout">Se déconnecter</a>
    </main>
</body>
</html>