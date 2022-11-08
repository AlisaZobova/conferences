<?php

namespace MainController;

use BaseController\Controller;
use MainModel\ModelConference;

require dirname(__FILE__) . '/../core/controller.php';
require dirname(__FILE__) . '/../models/model_conference.php';

class ControllerConference extends Controller
{
    function __construct()
    {
        $this->model = new ModelConference();
        parent::__construct();
    }

    function create()
    {
        $this->view->generate('create_view.php');
        $this->model->create_data();
    }

    function get()
    {
        $data = $this->model->get_data();
        $this->view->generate('get_view.php', $data);
    }

    function index()
    {
        $data = $this->model->get_multi();
        $this->view->generate('main_view.php', $data);
    }

    function getUpdateView() {
        $data = $this->model->get_data();
        $this->view->generate('update_view.php', $data);
    }

    function update()
    {
        $this->model->update_data();
        $data = $this->model->get_data();
        $this->view->generate('update_view.php', $data);
    }

    function delete()
    {
        $this->view->generate('delete_view.php');
        $this->model->delete_data();
    }

}
