<?php

namespace Application\Core;

use Appllication\Core\View;

require 'view.php';

class Controller
{

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function index()
    {

    }

    function get()
    {

    }

    function create()
    {

    }

    function update()
    {

    }

    function delete()
    {

    }

}
