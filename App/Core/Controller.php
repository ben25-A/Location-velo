<?php

namespace App\Core;

class Controller
{
    /**
     * Charge une vue : $this->render('admin/login', ['error' => '...']);
     * Les clés du tableau deviennent des variables ($error) dans la vue.
     */
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../Views/' . $view . '.php';
    }

    protected function redirect(string $path): void
    {
        $base = defined('BASE_URL') ? BASE_URL : '';
        header('Location: ' . $base . $path);
        exit;
    }

    protected function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }

    /** À appeler au début de chaque page du tableau de bord. */
    protected function requireAuth(): void
    {
        if (!$this->isLoggedIn()
            || !in_array($_SESSION['user']['role'], ['admin', 'employee'], true)) {
            $this->redirect('/login');
        }
    }

    /** À appeler pour les actions réservées à l'admin (suppressions...). */
    protected function requireAdmin(): void
    {
        $this->requireAuth();

        if (($_SESSION['user']['role'] ?? '') !== 'admin') {
            http_response_code(403);
            exit('Accès refusé : réservé à l\'administrateur.');
        }
    }
}