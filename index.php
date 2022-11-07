<?php ini_set('display_errors', 1);

$host='eu-cdbr-west-03.cleardb.net';
$db='heroku_3bf5f17ab1f53bb';
$user='b188abd32e12be';
$pass='a4a903f3';

$pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

echo 'OK';

require_once 'application/bootstrap.php';
