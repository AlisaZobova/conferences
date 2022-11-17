<?php

namespace Application\Core;

use Application\Controllers\ControllerConference;

require dirname(__FILE__) . "/../controllers/controllerConference.php";

class Route
{
    public $controller;

    function __construct()
    {
        $this->controller = new ControllerConference();
    }

    function start()
    {

        $action = 'index';

        //CREATE

        if (isset($_POST['add'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            $action = 'create';
        }


        if (isset($_GET['conference_id'])) {

            //READ

            $action = 'get';

            //UPDATE

            if (isset($_POST['edit-view'])) {
                $action = 'getUpdateView';
            }

            if (isset($_POST['edit'])) {
                $action = 'update';
            }

            //DELETE

            if (isset($_POST['delete'])) {
                header("Location: /conferences");
                $action = 'delete';
            }

        }

        $model_file = 'modelConference.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            require_once "application/models/" . $model_file;
        }

        $controller_file = 'controllerConference.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            require_once "application/controllers/" . $controller_file;
        } else {
            $this->ErrorPage404();
        }

        if (method_exists($this->controller, $action)) {
            $this->controller->$action();
        } else {
            $this->ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
