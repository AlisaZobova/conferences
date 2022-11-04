<?php

use BaseController\Controller;

class Controller_Conference extends Controller
{
    function __construct()
    {
        $this->model = new Model_Conference();
        parent::__construct();
    }

    function create()
    {
        $this->view->generate('create_view.php', 'base_view.php');
        $this->model->create_data();
    }

    function get()
    {
        $data = $this->model->get_data();
        $this->view->generate('get_view.php', 'base_view.php', $data);
    }

    function index()
    {
        $data = $this->model->get_multy();
        $this->view->generate('main_view.php', 'base_view.php', $data);
    }

    function update()
    {
        $this->view->generate('update_view.php', 'base_view.php');
        $this->model->update_data();
    }

    function delete()
    {
        $this->view->generate('delete_view.php', 'base_view.php');
        $this->model->delete_data();
    }

}