<?php

include 'db.php';

$title = $_POST['title'];
$conf_date = $_POST['conf_date'];
$address = $_POST['address'];
$country = $_POST['country'];
$get_id = $_GET['conference_id'];

//CREATE

if (isset($_POST['add'])){
    $sql = ("INSERT INTO conference (title, conf_date, address, country) VALUES (?, ?, ?, ?);");
    $query = $pdo->prepare($sql);
    $query->execute([$title, $conf_date, $address, $country]);
    if ($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//READ

$sql = $pdo->prepare("SELECT * FROM conference;");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//UPDATE

if (isset($_POST['edit'])) {
    $sql = ("UPDATE conference SET title=?, conf_date=?, address=?, country=? WHERE conference_id=?;");
    $query = $pdo->prepare($sql);
    $query->execute([$title, $conf_date, $address, $country, $get_id]);
    if ($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//DELETE

if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM conference WHERE conference_id=?;");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}
