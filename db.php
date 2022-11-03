<?php

$host = 'localhost';
$db = 'conferences';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
} catch(PDOException $e){
    echo 'Database connection error!'.$e->getMessage();
}
