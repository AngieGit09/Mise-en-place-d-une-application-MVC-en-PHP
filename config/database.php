<?php

function getPDO()
{
    static $pdo = null;

    if ($pdo === null) {
        $host = 'localhost';
        $db   = 'covoiturage';
        $user = 'root';
        $pass = '';
        $port = 3306;

        $pdo = new PDO(
            "mysql:host=$host;dbname=$db;port=$port;charset=utf8",
            $user,
            $pass,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    return $pdo;
}