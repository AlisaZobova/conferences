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
        include 'config.php';

        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
    }

    function create_pdo()
    {

        try {
            $pdo = new PDO("mysql:host=$this->host; dbname=$this->db", $this->user, $this->pass);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Database connection error!' . $e->getMessage();
        }
        return null;
    }

}
