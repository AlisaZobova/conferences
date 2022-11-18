<?php

namespace Application\Controllers;

use Application\Core\Controller;
use Appllication\Models\ModelConference;

class ControllerConference extends Controller
{
    public function __construct()
    {
        $this->model = new ModelConference();
        parent::__construct();
    }

    public function create()
    {
        $this->view->generate('createView.php');
        $this->model->createData();
    }

    public function get()
    {
        $data = $this->model->getData();
        $this->view->generate('getView.php', $data);
    }

    public function index()
    {
        $data = $this->model->getMulti();
        $this->view->generate('mainView.php', $data);
    }

    public function getUpdateView() {
        $data = $this->model->getData();
        $this->view->generate('updateView.php', $data);
    }

    public function update()
    {
        $this->model->updateData();
        $data = $this->model->getData();
        $this->view->generate('updateView.php', $data);
    }

    public function delete()
    {
        $this->view->generate('deleteView.php');
        $this->model->deleteData();
    }

}
