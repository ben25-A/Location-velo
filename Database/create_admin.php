<?php
/**
 * Crée un compte administrateur avec un mot de passe hashé.
 *
 * Usage (depuis la racine du projet) :
 *   php database/create_admin.php admin MonMotDePasse
 */

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

if ($argc < 3) {
    exit("Usage : php database/create_admin.php <login> <mot_de_passe>\n");
}

[$script, $login, $password] = $argv;

$pdo = Database::getInstance()->getConnection();

$stmt = $pdo->prepare(
    'INSERT INTO users (firstname, lastname, login, password, role)
     VALUES (:firstname, :lastname, :login, :password, :role)'
);

$stmt->execute([
    'firstname' => 'Admin',
    'lastname'  => 'Admin',
    'login'     => $login,
    'password'  => password_hash($password, PASSWORD_DEFAULT),
    'role'      => 'admin',
]);

echo "Admin '$login' créé.\n";