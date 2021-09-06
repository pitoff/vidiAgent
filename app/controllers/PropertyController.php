<?php 

namespace app\controllers;

use app\Router;

class PropertyController{

    public function properties(Router $router)
    {
        $router->renderView('property/property');
    }

    public function create(Router $router)
    {
        $router->renderView('property/create');
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function remove()
    {

    }
}