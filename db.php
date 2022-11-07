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
        try {
            $pdo = new PDO("mysql:host=$this->host; dbname=$this->db", $this->user, $this->pass);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Database connection error!' . $e->getMessage();
        }
        return null;
    }

}

