<?php

namespace app\controllers;

use app\models\Property;
use app\Router;

class HomeController{

    public function index(Router $router)
    {
        $state = $_GET['state'] ?? '';
        $type = $_GET['type'] ?? '';
        $for = $_GET['for'] ?? '';

        $propertySearch = $router->db->getSearchProperty($state, $type, $for);
       
        $router->renderView('home/index', [
            'properties' => $propertySearch,
            'state' => $state,
            'type' => $type,
            'for' => $for
        ]);
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
