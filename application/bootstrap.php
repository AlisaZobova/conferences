<?php
namespace Bootstrap;
use BaseModel\Model;
use BaseView\View;
use BaseController\Controller;
use MainRoute\Route;

$route = new Route();
$route->start(); // запускаем маршрутизатор
