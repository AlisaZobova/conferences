<?php

namespace Database;

use PDO, PDOException;

class DB
{

    protected $host;
    protected $db;
    protected $user;
    protected $pass;

    function __construct()
    {
        $this->host = getenv('HOST');
        $this->db = getenv('DB');
        $this->user = getenv('USER');
        $this->pass = getenv('PASS');
    }

    function create_pdo()
    {
        include 'config.php';

        try {
            $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Database connection error!' . $e->getMessage();
        }
        return null;
    }

}
