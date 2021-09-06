<?php

namespace app;

use PDO;

class Database{

    public PDO $pdo;
    public static Database $db;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=vidinuel;', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getUser($email, $password)
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $hashpass = $row['password'] ?? null;
        if(password_verify($password, $hashpass)){
            return $row;
        }else{
            return false;
        }
    }

    public function addProperty()
    {

    }

    public function removeProperty()
    {

    }
    
}