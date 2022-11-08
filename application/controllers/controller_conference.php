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
        $this->model->createData();
    }

    function get()
    {
        $data = $this->model->getData();
        $this->view->generate('get_view.php', $data);
    }

    function index()
    {
        $data = $this->model->getMulti();
        $this->view->generate('main_view.php', $data);
    }

    function getUpdateView() {
        $data = $this->model->getData();
        $this->view->generate('update_view.php', $data);
    }

    function update()
    {
        $this->model->updateData();
        $data = $this->model->getData();
        $this->view->generate('update_view.php', $data);
    }

    function delete()
    {
        $this->view->generate('delete_view.php');
        $this->model->deleteData();
    }

}
