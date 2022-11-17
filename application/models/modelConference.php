<?php

namespace Appllication\Models;

use Application\Core\Model;
use Application\Database\DB;
use PDO;

require dirname(__FILE__) . '/../core/model.php';
require dirname(__FILE__) . '/../db.php';

class ModelConference extends Model
{
    public $getId;
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
        $this->getId = $_GET['conference_id'];
    }

    public function getMulti()
    {
        $sql = $this->connection->prepare("SELECT * FROM conference;");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getData()
    {
        $sql = $this->connection->prepare("SELECT * FROM conference WHERE conference_id=?;");
        $sql->execute([$this->getId]);
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function createData()
    {
        $sql = ("INSERT INTO conference (title, conf_date, latitude, longitude, country) VALUES (?, ?, ?, ?, ?);");
        $query = $this->connection->prepare($sql);
        $query->execute([$this->title, $this->conf_date, $this->latitude, $this->longitude, $this->country]);
    }

    public function updateData()
    {
        $sql = ("UPDATE conference SET title=?, conf_date=?, latitude=?, longitude=?, country=? WHERE conference_id=?;");
        $query = $this->connection->prepare($sql);
        $query->execute([$this->title, $this->conf_date, $this->latitude, $this->longitude, $this->country, $this->getId]);
    }

    public function deleteData()
    {
        $sql = ("DELETE FROM conference WHERE conference_id=?;");
        $query = $this->connection->prepare($sql);
        $query->execute([$this->getId]);
    }

}
