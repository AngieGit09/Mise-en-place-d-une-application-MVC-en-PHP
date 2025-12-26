<?php

class AuthController
{
    public function loginForm()
    {
        require __DIR__ . '/../Views/login.php';
    }

   public function login()
{
    session_start();

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    

$employe = Employe::findByEmail($email);


    // ✅ BONNE vérification
    if ($employe && password_verify($password, $employe['password'])) {

        // On stocke uniquement ce qui est utile en session
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
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}