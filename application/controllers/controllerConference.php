<?php

namespace Application\Controllers;

use Application\Core\Controller;
use Appllication\Models\ModelConference;

require dirname(__FILE__) . '/../core/controller.php';
require dirname(__FILE__) . '/../models/modelConference.php';

class ControllerConference extends Controller
{
    function __construct()
    {
        $this->model = new ModelConference();
        parent::__construct();
    }

    function create()
    {
        $this->view->generate('createView.php');
        $this->model->createData();
    }

    function get()
    {
        $data = $this->model->getData();
        $this->view->generate('getView.php', $data);
    }

    function index()
    {
        $data = $this->model->getMulti();
        $this->view->generate('mainView.php', $data);
    }

    function getUpdateView() {
        $data = $this->model->getData();
        $this->view->generate('updateView.php', $data);
    }

    function update()
    {
        $this->model->updateData();
        $data = $this->model->getData();
        $this->view->generate('updateView.php', $data);
    }

    function delete()
    {
        $this->view->generate('deleteView.php');
        $this->model->deleteData();
    }

}
