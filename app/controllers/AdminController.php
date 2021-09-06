<?php

namespace app\controllers;

use app\models\Admin;
use app\Router;

class AdminController{

    public function login(Router $router)
    {
        $errors = [];

        $userData = [
            'email' => '',
            'password' => ''
        ];

        if($_SERVER["REQUEST_METHOD"] === 'POST'){

            $userData['email'] = $_POST['email'];
            $userData['password'] = $_POST['password'];

            $admin = new Admin();
            $admin->load($userData);
            $errors = $admin->validate();

            if(empty($errors)){
                header('location: /admin/property');
            }
        }
        $router->renderView('admin/login', [
            'user' => $userData,
            'errors' => $errors
        ]);
    }
    
    public function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
        header('location: /admin/login');

    }

}