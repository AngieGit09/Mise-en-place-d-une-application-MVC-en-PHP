<?php

class AuthController
{
    public function loginForm()
    {
        require __DIR__ . '/../Views/login.php';
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $employe = Employe::findByEmail($email);

        if ($employe && password_verify($password, $employe['password'])) {
            $_SESSION['user'] = [
                'id' => $employe['id'],
                'prenom' => $employe['prenom'],
                'nom' => $employe['nom'],
                'email' => $employe['email'],
                'role' => $employe['role'] ?? 'employe'
            ];

            header('Location: /');
            exit;
        }

        $_SESSION['error'] = "Identifiants incorrects";
        header('Location: /login');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}