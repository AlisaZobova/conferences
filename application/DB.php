<?php

namespace Application;

use PDO, PDOException;

class DB
{

    private $host;
    private $db;
    private $user;
    private $pass;

    public function __construct()
    {
        include 'config.php';

        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function createPDO(): ?PDO
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
