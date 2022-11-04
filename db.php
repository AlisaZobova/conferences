<?php

namespace Database;

class DB {

    protected $host;
    protected $db;
    protected $user;
    protected $pass;

    function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'conferences';
        $this->user = 'root';
        $this->pass = '';
    }

    function create_pdo(){
        try {
            $pdo = new \PDO("mysql:host=$this->host; dbname=$this->db", $this->user, $this->pass);
            return $pdo;
        } catch(\PDOException $e){
            echo 'Database connection error!'.$e->getMessage();
        }
        return null;
    }

}