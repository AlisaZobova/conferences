<?php

namespace MainRoute;

class Route
{
    public $controller;

    function __construct()
    {
        $this->controller = new \Controller_Conference();
    }

    function start()
    {
        $action = 'get_multy';

        //CREATE

        if (isset($_POST['add'])){
            // создаем контроллер
            $action = 'create';
        }

        //READ

        if (isset($_GET['conference_id'])){
            // создаем контроллер
            $action = 'get';
        }

        //UPDATE

        if (isset($_POST['edit'])) {
            $action = 'update';
        }

        //DELETE

        if (isset($_POST['delete'])) {
            $action = 'delete';
        }


        // файл с классом модели (файла модели может и не быть)

        $model_file = 'model_conference.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }

        // файл с классом контроллера
        $controller_file = 'controller_conference.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            (new Route)->ErrorPage404();
        }

        if(method_exists($this->controller, $action))
        {
            // вызываем действие контроллера
            $this->controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            (new Route)->ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
