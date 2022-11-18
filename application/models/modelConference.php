<?php

namespace Appllication\Models;

use Application\Core\Model;
use Application\Database\DB;
use PDO;

require dirname(__FILE__) . '/../db.php';


class ModelConference extends Model
{
    public $getId;
    public $title;
    public $confDate;
    public $latitude;
    public $longitude;
    public $country;
    private $connection;
    private $errors;

    public function __construct()
    {
        $db = new DB();
        $this->connection = $db->createPDO();
        $this->title = $_POST['title'];
        $this->confDate = $_POST['conf_date'];
        $this->latitude = $_POST['latitude'];
        $this->longitude = $_POST['longitude'];
        $this->country = $_POST['country'];
        $this->getId = $_GET['conference_id'];
        $this->errors = [];
    }

    public function errors()
    {
        return $this->errors;
    }

    public function isValid()
    {
        $this->validateTitle();
        $this->validateConfDate();
        $this->validateLatLng();

        return count($this->errors) === 0;
    }

    private function validateTitle()
    {
        if (!preg_match('/[A-Z][a-z]*(\s(([A-Z][a-z]*)|([a-z]+))|(\s[0-9]+)*)*/', $this->title)) {
            $this->errors['title'] = 'Not a valid title.';
        }
    }

    private function validateConfDate()
    {
        if (strtotime($this->confDate) < strtotime('now')) {
            $this->errors['conf_date'] = 'Conference date is less than current.';
        }

        if (!preg_match('/^(2\d{3})-((0\d)|(1[1,2]))-(([0-2]\d)|(3[0,1]))$/', $this->confDate)) {
            $this->errors['conf_date'] = 'Not a valid date.';
        }
    }

    private function validateLatLng()
    {
        if (!preg_match('/^(-?(\d|([1-8][0-9])(\.\d+)?)|(90(\.0)?))?$/', $this->latitude)) {
            $this->errors['latitude'] = 'Not a valid latitude.';
        }

        if (!preg_match('/^(-?(\d|([1-8][0-9])(\.\d+)?)|(90(\.0)?))?$/', $this->longitude)) {
            $this->errors['longitude'] = 'Not a valid longitude.';
        }
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
        if ($this->isValid()) {
            $sql = ("INSERT INTO conference (title, conf_date, latitude, longitude, country) VALUES (?, ?, ?, ?, ?);");
            $query = $this->connection->prepare($sql);
            $query->execute([$this->title, $this->confDate, $this->latitude, $this->longitude, $this->country]);
        } else {
            echo "The conference cannot be created because the following data errors are present: ";
            foreach ($this->errors() as $key => $value) {
                echo $value . "\n";
            };
        }
    }

    public function updateData()
    {
        if ($this->isValid()) {
            $sql = ("UPDATE conference SET title=?, conf_date=?, latitude=?, longitude=?, country=? WHERE conference_id=?;");
            $query = $this->connection->prepare($sql);
            $query->execute([$this->title, $this->confDate, $this->latitude, $this->longitude, $this->country, $this->getId]);
        } else {
            echo "The conference cannot be updated because the following data errors are present: ";
            foreach ($this->errors() as $key => $value) {
                echo $value . "\n";
            };
        }
    }

    public function deleteData()
    {
        $sql = ("DELETE FROM conference WHERE conference_id=?;");
        $query = $this->connection->prepare($sql);
        $query->execute([$this->getId]);
    }

}
