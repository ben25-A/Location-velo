<?php

namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();

        $this->render('admin/dashboard', ['user' => $_SESSION['user']]);
    }
}