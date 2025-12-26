<?php

require_once __DIR__ . '/../../config/database.php';

class Employe
{
    public static function findByEmail($email)
    {
        $pdo = getPDO();
        $stmt = $pdo->prepare("SELECT * FROM employes WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
