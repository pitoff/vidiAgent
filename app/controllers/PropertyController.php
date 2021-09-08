<?php 

namespace app\controllers;

use app\models\Property;
use app\Router;

class PropertyController{

    public function properties(Router $router)
    {
        $router->renderView('property/property');
    }

    public function create(Router $router)
    {
        $errors = [];

        $propertyData = [
            'image' => '',
            'type' => '',
            'for' => '',
            'name' => '',
            'description' => '',
            'state' => '',
            'local_govt' => '',
            'price' => '',
            'bedroom' => '',
            'toilet' => '',
            'kitchen' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $propertyData['imageFile'] = $_FILES['image'] ?? null;
            $propertyData['type'] = $_POST['type'];
            $propertyData['for'] = $_POST['for'];
            $propertyData['name'] = $_POST['name'];
            $propertyData['description'] = $_POST['description'];
            $propertyData['state'] = $_POST['state'];
            $propertyData['local_govt'] = $_POST['local_govt'];
            $propertyData['price'] = $_POST['price'];
            $propertyData['bedroom'] = $_POST['bedroom'];
            $propertyData['toilet'] = $_POST['toilet'];
            $propertyData['kitchen'] = $_POST['kitchen'];

            $property = new Property();
            $property->load($propertyData);
            $errors = $property->validate();

            if(empty($errors)){
                header('Location: /admin/property');
            }
        }

        $router->renderView('property/create', [
            'property' => $propertyData,
            'errors' => $errors
        ]);
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