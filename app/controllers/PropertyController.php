<?php 

namespace app\controllers;

use app\models\Property;
use app\Router;

class PropertyController{

    public function properties(Router $router)
    {
        if(!loggedIn()){
            header('location:/admin/login');
        }
        $property = $router->db->getAllProperty();
        $router->renderView('property/property', [
            'properties' => $property
        ]);
    }

    public function create(Router $router)
    {
        if(!loggedIn()){
            header('location:/admin/login');
        }
        $errors = [];

        $propertyData = [
            'image' => '',
            'type' => '',
            'for' => '',
            'name' => '',
            'description' => '',
            'state' => '',
            'local_govt' => '',
            'address' => '',
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
            $propertyData['address'] = $_POST['address'];
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
        if(!loggedIn()){
            header('location:/admin/login');
        }
    }

    public function update(Router $router)
    {
        // if(!loggedIn()){
        //     header('location:/admin/login');
        // }

        // $id = $_GET['id'] ?? null;
        // if(!$id){
        //     header('location: /admin/property');
        // }

        // $propertyData = $router->db->getPropertyById($id);
        // $errors = [];

        // if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //     $propertyData['imageFile'] = $_FILES['image'] ?? null;
        //     $propertyData['type'] = $_POST['type'];
        //     $propertyData['for'] = $_POST['for'];
        //     $propertyData['name'] = $_POST['name'];
        //     $propertyData['description'] = $_POST['description'];
        //     $propertyData['state'] = $_POST['state'];
        //     $propertyData['local_govt'] = $_POST['local_govt'];
        //     $propertyData['address'] = $_POST['address'];
        //     $propertyData['price'] = $_POST['price'];
        //     $propertyData['bedroom'] = $_POST['bedroom'];
        //     $propertyData['toilet'] = $_POST['toilet'];
        //     $propertyData['kitchen'] = $_POST['kitchen'];

        //     $property = new Property();
        //     $property->load($propertyData);
        //     $errors = $property->validate();

        //     if(empty($errors)){
        //         header('location: /admin/property');
        //     }
        // }

        // $router->renderView('property/update', [
        //     'property' => $propertyData,
        //     'errors' => $errors
        // ]);

    }

    public function remove()
    {
        
    }

}