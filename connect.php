<?php
$host = 'localhost';
$db   = 'list';
$user = 'root';
$pass = '4752';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        } 
    catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
        }
?>