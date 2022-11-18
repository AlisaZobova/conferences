<?php

namespace Application\Core;

use Appllication\Core\View;

require 'View.php';

class Controller
{

    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function index()
    {

    }

    public function get()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}
