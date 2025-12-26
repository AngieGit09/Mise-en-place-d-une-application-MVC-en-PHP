<?php

class Agence
{
    public static function all()
    {
        $pdo = getPDO();
        return $pdo->query("SELECT * FROM agences ORDER BY ville")->fetchAll(PDO::FETCH_ASSOC);
    }
}