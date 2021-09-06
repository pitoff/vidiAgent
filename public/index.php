<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../app/helpers/sessionHelper.php";

use app\Router;
use app\controllers\HomeController;
use app\controllers\AdminController;
use app\controllers\PropertyController;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);
$router->get('/services', [HomeController::class, 'services']);
$router->get('/listing', [HomeController::class, 'listing']);
$router->get('/contact', [HomeController::class, 'contact']);

$router->get('/admin/login', [AdminController::class, 'login']);
$router->post('/admin/login', [AdminController::class, 'login']);
$router->get('/admin/property', [PropertyController::class, 'properties']);
$router->get('/admin/createproperty', [PropertyController::class, 'create']);
$router->post('/admin/createproperty', [PropertyController::class, 'create']);
$router->get('/admin/updateproperty/{$id}', [PropertyController::class, 'update']);
$router->post('/admin/updateproperty/{$id}', [PropertyController::class, 'update']);
$router->get('/admin/removeproperty', [PropertyController::class, 'remove']);
$router->get('/logout', [AdminController::class, 'logout']);

$router->run();