<?php

namespace MainModel;

use BaseModel\Model;
use Database\DB;

require realpath(dirname(__FILE__) . '\..\core\model.php');
require realpath(dirname(__FILE__) . '\..\..\db.php');

class ModelConference extends Model
{
    public $get_id;
    public $title;
    public $conf_date;
    public $latitude;
    public $longitude;
    public $country;
    public $connection;

    function __construct()
    {
        $db = new DB();
        $this->connection = $db->create_pdo();
        $this->title = $_POST['title'];
        $this->conf_date = $_POST['conf_date'];
        $this->latitude = $_POST['latitude'];
        $this->longitude = $_POST['longitude'];
        $this->country = $_POST['country'];
        $this->get_id = $_GET['conference_id'];
    }

    public function get_multi()
    {
        $sql = $this->connection->prepare("SELECT * FROM conference;");
        $sql->execute();
        $result = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function get_data()
    {
        $sql = $this->connection->prepare("SELECT * FROM conference WHERE conference_id=?;");
        $sql->execute([$this->get_id]);
        $result = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function create_data()
    {
        $sql = ("INSERT INTO conference (title, conf_date, latitude, longitude, country) VALUES (?, ?, ?, ?, ?);");
        $query = $this->connection->prepare($sql);
        $query->execute([$this->title, $this->conf_date, $this->latitude, $this->longitude, $this->country]);
    }

    public function update_data()
    {
        $sql = ("UPDATE conference SET title=?, conf_date=?, latitude=?, longitude=?, country=? WHERE conference_id=?;");
        $query = $this->connection->prepare($sql);
        $query->execute([$this->title, $this->conf_date, $this->latitude, $this->longitude, $this->country, $this->get_id]);
    }

    public function delete_data()
    {
        $sql = ("DELETE FROM conference WHERE conference_id=?;");
        $query = $this->connection->prepare($sql);
        $query->execute([$this->get_id]);
    }

}
