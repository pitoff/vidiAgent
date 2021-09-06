<?php

namespace app;

use app\models\Property;
use PDO;

class Database
{

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
        if (password_verify($password, $hashpass)) {
            return $row;
        } else {
            return false;
        }
    }

    public function addProperty(Property $property)
    {
        $statement = $this->pdo->prepare("INSERT INTO properties (property, p_type, p_for, image, description, price, bedroom, toilet, kitchen)
        VALUES (:property, :p_type, :p_for, :image, :description, :price, :bedroom, :toilet, :kitchen)");
        $statement->bindValue(':property', $property->name);
        $statement->bindValue(':p_type', $property->type);
        $statement->bindValue(':p_for', $property->for);
        $statement->bindValue(':image', $property->imagePath);
        $statement->bindValue(':description', $property->description);
        $statement->bindValue(':price', $property->price);
        $statement->bindValue(':bedroom', $property->bedroom);
        $statement->bindValue(':toilet', $property->toilet);
        $statement->bindValue(':kitchen', $property->kitchen);

        $statement->execute();
    }

    public function removeProperty()
    {
    }
}
