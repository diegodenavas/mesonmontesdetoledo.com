<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/core/ModelCore.php");
require_once(ROOT . "app/core/IResulsetToObject.php");

class Plate extends ModelCore implements IResulsetToObject
{ 
    private $id, $name, $price, $category;
    
    public function __construct()
    {
        parent::__construct(get_class($this));
    }

    public static function setPlateWhithAllProperties(int $id, string $name, string $price, string $category){
        $plate = new Plate();

        $plate->setId($id);
        $plate->setName($name);
        $plate->setPrice($price);
        $plate->setCategory($category);

        return $plate;
    }


    public function getObject(array $resulset){
        $plates = array();

        for($row = 0; $row < count($resulset); $row++){
            array_push($plates, Plate::setPlateWhithAllProperties($resulset[$row][0], $resulset[$row][1], $resulset[$row][2], $resulset[$row][3]));
        }

        return $plates;
    }


    public function setId($id){
        $this->id = $id;
    }


    public function setName($name){
        $this->name = $name;
    }


    public function setPrice($price){
        $this->price = $price;
    }


    public function setCategory($category){
        $this->category = $category;
    }



    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getCategory(){
        return $this->category;
    }

}