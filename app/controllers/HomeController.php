<?php

namespace app\controllers;

use app\Router;

class HomeController{

    public function index(Router $router)
    {
        $router->renderView('home/index');
    }

    public function about(Router $router)
    {
        $router->renderView('home/about');
    }

    public function services(Router $router)
    {
        $router->renderView('home/services');
    }

    public function listing(Router $router)
    {
        $property = $router->db->getAllProperty();
        $router->renderView('home/listing', [
            'properties' => $property
        ]);
    }

    public function contact(Router $router)
    {
        $router->renderView('home/contact');
    }

    
}
