<?php

namespace app\models;

class Property{

    public string $type;
    public string $for;
    public string $name;
    public string $description;
    public string $price;
    public ?string $bedroom = null;
    public ?string $toilet = null;
    public ?string $kitchen = null;

    public function load($data)
    {
        $this->type = $data['type'];
        $this->for = $data['for'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->bedroom = $data['bedroom'] ?? null;
        $this->toilet = $data['toilet'] ?? null;
        $this->kitchen = $data['kitchen'] ?? null;
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
            $errors[] = "name is required";
        }
        if(!$this->description){
            $errors[] = "description is required";
        }
        if(!$this->price){
            $errors[] = "price is required";
        }
    }

}