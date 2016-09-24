<?php
class Database
{
    public static function Conectar()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=programathon2016;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}
