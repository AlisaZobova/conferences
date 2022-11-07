<?php
namespace Bootstrap;
//use BaseModel\Model;
//use BaseView\View;
//use BaseController\Controller;
use MainRoute\Route;

include 'dev.php';

require 'core/route.php';

$route = new Route();
$route->start(); // запускаем маршрутизатор
