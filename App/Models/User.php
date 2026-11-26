<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    public function findByLogin(string $login): ?array
    {
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare(
            'SELECT user_id, firstname, lastname, login, password, role
             FROM users
             WHERE login = :login
             LIMIT 1'
        );
        $stmt->execute(['login' => $login]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}
