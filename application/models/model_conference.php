<?php

include "db.php";

use BaseModel\Model;

class Model_Conference extends Model
{
    public $get_id;
    public $title;
    public $conf_date;
    public $latitude;
    public $longitude;
    public $country;

    function __construct()
    {
        $this->title = $_POST['title'];
        $this->conf_date = $_POST['conf_date'];
        $this->latitude = $_POST['latitude'];
        $this->longitude = $_POST['longitude'];
        $this->country = $_POST['country'];
        $this->get_id = $_GET['conference_id'];
    }

    public function get_multy()
    {
        $sql = $pdo->prepare("SELECT * FROM conference;");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function get_data()
    {
        $sql = $pdo->prepare("SELECT * FROM conference WHERE conference_id=?;");
        $sql->execute([$this->get_id]);
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function create_data()
    {
        $sql = ("INSERT INTO conference (title, conf_date, latitude, longitude, country) VALUES (?, ?, ?, ?, ?);");
        $query = $pdo->prepare($sql);
        $query->execute([$this->title, $this->conf_date, $this->latitude, $this->longitude, $this->country]);
//        if ($query){
//            header("Location: ". $_SERVER['HTTP_REFERER']);
//        }
    }

    public function update_data()
    {
        $sql = ("UPDATE conference SET title=?, conf_date=?, latitude=?, longitude=?, country=? WHERE conference_id=?;");
        $query = $pdo->prepare($sql);
        $query->execute([$this->title, $this->conf_date, $this->latitude, $this->longitude, $this->country, $this->get_id]);
//        if ($query){
//            header("Location: ". $_SERVER['HTTP_REFERER']);
//        }
    }

    public function delete_data()
    {
        $sql = ("DELETE FROM conference WHERE conference_id=?;");
        $query = $pdo->prepare($sql);
        $query->execute([$this->get_id]);
//        if ($query){
//            header("Location: ". $_SERVER['HTTP_REFERER']);
//        }
    }

}