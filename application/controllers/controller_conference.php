<?php

namespace MainController;

use BaseController\Controller;
use MainModel\ModelConference;

require realpath(dirname(__FILE__) . '\..\core\controller.php');
require realpath(dirname(__FILE__) . '\..\models\model_conference.php');

class Controller_Conference extends Controller
{
    function __construct()
    {
        $this->model = new ModelConference();
        parent::__construct();
    }

    function create()
    {
        header("Location: ". $_SERVER['HTTP_REFERER']);
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
        $data = $this->model->get_multi();
        $this->view->generate('main_view.php', 'base_view.php', $data);
    }

    function update()
    {
        $this->model->update_data();
        $data = $this->model->get_data();
        $this->view->generate('update_view.php', 'base_view.php', $data);
    }

    function delete()
    {
        header("Location: /conferences");
        $this->view->generate('delete_view.php', 'base_view.php');
        $this->model->delete_data();
    }

}