<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function login(): void
    {
        if ($this->isLoggedIn()) {
            $this->redirect('/dashboard');
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login    = trim($_POST['login'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = (new User())->findByLogin($login);

            if ($user && password_verify($password, $user['password'])) {
                // Protège contre la fixation de session
                session_regenerate_id(true);

                $_SESSION['user'] = [
                    'id'        => $user['user_id'],
                    'firstname' => $user['firstname'],
                    'lastname'  => $user['lastname'],
                    'role'      => $user['role'],
                ];

                $this->redirect('/dashboard');
            }

            // Message volontairement vague : on ne dit pas si c'est le login ou le mdp
            $error = 'Identifiant ou mot de passe incorrect.';
        }

        $this->render('admin/login', ['error' => $error]);
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();

        $this->redirect('/login');
    }
}