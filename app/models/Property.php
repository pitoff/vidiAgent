<?php

namespace app\models;

use app\config\MyConfig;
use app\Database;

class Property{

    public ?int $id = null;
    public string $type;
    public string $for;
    public string $name;
    public string $description;
    public string $price;
    public string $state;
    public string $local_govt;
    public string $address;
    public ?string $bedroom = null;
    public ?string $toilet = null;
    public ?string $kitchen = null;
    public ?string $imagePath = null;
    public ?array $imageFile = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->type = $data['type'];
        $this->for = $data['for'];
        $this->name = $data['name'];
        $this->state = $data['state'];
        $this->local_govt = $data['local_govt'] ?? '';
        $this->address = $data['address'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->bedroom = $data['bedroom'] ?? null;
        $this->toilet = $data['toilet'] ?? null;
        $this->kitchen = $data['kitchen'] ?? null;
        $this->imageFile = $data['imageFile'] ?? null;
        $this->imagePath = $data['image'] ?? null;
    }

    public function validate()
    {
        $errors = [];

        if(!$this->type){
            $errors[] = "property type is required";
        }
        if(!$this->for){
            $errors[] = "for what is required";
        }
        if(!$this->name){
            $errors[] = "property is required";
        }
        if(!$this->state){
            $errors[] = "state is required";
        }
        if(!$this->local_govt){
            $errors[] = "local government is required";
        }
        if(!$this->address){
            $errors[] = "address is required";
        }
        if(!$this->description){
            $errors[] = "description is required";
        }
        if(!$this->price){
            $errors[] = "price is required";
        }

        if(!is_dir(__DIR__."/../../public/images")){
            mkdir(__DIR__."/../../public/images");
        }

        if(empty($errors)){

            if($this->imageFile && $this->imageFile['tmp_name']){

                if($this->imagePath){
                    unlink(__DIR__."/../../public/".$this->imagePath);
                }

                $this->imagePath = 'images/' .MyConfig::randomString(8). '/' .$this->imageFile['name'];
                mkdir(dirname(__DIR__.'/../../public/'.$this->imagePath));
                move_uploaded_file($this->imageFile['tmp_name'], __DIR__."/../../public/".$this->imagePath);

            }

            $db = Database::$db;

            if($this->id){
                $db->updateProperty($this);
            }else{
                $db->addProperty($this);
            }

        }

        return $errors;
    }

}