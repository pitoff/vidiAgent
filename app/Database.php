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

    public function getAllProperty()
    {
        $statement = $this->pdo->prepare('SELECT * FROM properties ORDER BY id DESC');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSearchProperty($state='', $type='', $for='')
    {
        if ($state && $type && $for) {
            $statement = $this->pdo->prepare('SELECT * FROM properties WHERE state like :state AND p_type like :p_type AND p_for like :p_for ORDER BY created_at DESC');
            $statement->bindValue(":state", "%$state%");
            $statement->bindValue(":p_type", "%$type%");
            $statement->bindValue(":p_for", "%$for%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM properties ORDER BY created_at DESC LIMIT 6');
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPropertyById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM properties WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addProperty(Property $property)
    {
        $statement = $this->pdo->prepare("INSERT INTO properties (property, p_type, p_for, state, local_govt, address, image, description, price, bedroom, toilet, kitchen)
        VALUES (:property, :p_type, :p_for, :state, :local_govt, :address, :image, :description, :price, :bedroom, :toilet, :kitchen)");
        $statement->bindValue(':property', $property->name);
        $statement->bindValue(':p_type', $property->type);
        $statement->bindValue(':p_for', $property->for);
        $statement->bindValue(':state', $property->state);
        $statement->bindValue(':local_govt', $property->local_govt);
        $statement->bindValue(':address', $property->address);
        $statement->bindValue(':image', $property->imagePath);
        $statement->bindValue(':description', $property->description);
        $statement->bindValue(':price', $property->price);
        $statement->bindValue(':bedroom', $property->bedroom);
        $statement->bindValue(':toilet', $property->toilet);
        $statement->bindValue(':kitchen', $property->kitchen);

        $statement->execute();
    }

    public function updateProperty(Property $property)
    {
        $statement = $this->pdo->prepare("UPDATE properties SET property = :property,
        p_type = :p_type,
        p_for = :p_for,
        state = :state,
        local_govt = :local_govt, 
        address = :address,
        p_type = :p_type,
        image = :image, 
        description = :description,
        price = :price,
        bedroom = :bedroom,
        toilet = :toilet,
        kitchen = :kitchen WHERE id = :id");

        $statement->bindValue(':property', $property->name);
        $statement->bindValue(':p_type', $property->type);
        $statement->bindValue(':p_for', $property->for);
        $statement->bindValue(':state', $property->state);
        $statement->bindValue(':local_govt', $property->local_govt);
        $statement->bindValue(':address', $property->address);
        $statement->bindValue(':image', $property->imagePath);
        $statement->bindValue(':description', $property->description);
        $statement->bindValue(':price', $property->price);
        $statement->bindValue(':bedroom', $property->bedroom);
        $statement->bindValue(':toilet', $property->toilet);
        $statement->bindValue(':kitchen', $property->kitchen);
        $statement->bindValue(':id', $property->id);

        $statement->execute();
    }

    public function removeProperty($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM properties WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}
