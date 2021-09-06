<?php 

namespace app\models;

use app\Database;

class Admin{

    public string $email;
    public string $password;

    public function load($data)
    {
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    public function validate()
    {
        $errors = [];
        if(!$this->email){
            $errors[] = 'email field is required *';
        }
        if(!$this->password){
            $errors[] = 'password field is required *';
        }

        $db = Database::$db;
        if(empty($errors)){
            $user = $db->getUser($this->email, $this->password);
            if($user){
                $_SESSION['user_id'] = $user['id'];
            }else{
                $errors[] = 'This is an invalid Admin';
            }
        }
        return $errors;
    }

}