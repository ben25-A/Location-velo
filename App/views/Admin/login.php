<?php $base = defined('BASE_URL') ? BASE_URL : ''; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion employés</title>
    <link rel="stylesheet" href="<?= $base ?>/css/style.css">
</head>
<body>
    <main class="l-main">
        <h1>Espace employés</h1>

        <?php if (!empty($error)): ?>
            <p class="form-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form class="form" method="post" action="<?= $base ?>/login">
            <label for="login">Identifiant</label>
            <input type="text" id="login" name="login" required autofocus>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="button">Se connecter</button>
        </form>
    </main>
</body>
</html>