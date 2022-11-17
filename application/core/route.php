<?php

namespace Application\Core;

class Route
{

    function start()
    {

        $action = 'index';
        $model = '';
        $controllerName = '';

        //CREATE

        if (isset($_POST['add'])) {
            header("Location: /conferences");
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

        $route = explode('/', $_SERVER['REQUEST_URI']);

        if ( !empty($route[1]) )
        {
            $model = substr(ucfirst(strtolower($route[1])), 0, -1);
            $controllerName = $model;
        }

        $modelPath = "application/models/model".$model.".php";
        if (file_exists($modelPath)) {
            require_once $modelPath;
        }

        $controllerPath = "application/controllers/controller".$controllerName.".php";
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
        } else {
            $this->ErrorPage404();
        }

        $controllerClass = "Application\Controllers\Controller".$controllerName;
        $controller = new $controllerClass();

        if (method_exists($controller, $action)) {
            $controller->$action();
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
