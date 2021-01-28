<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/core/ModelCore.php");
require_once(ROOT . "app/core/IResulsetToObject.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

class Plate extends ModelCore implements IResulsetToObject
{ 
    private $id, $name, $price;
    private $plateCategory;
    
    public function __construct()
    {
        parent::__construct(get_class($this));
    }

    public static function setPlateWhithAllProperties(int $id, string $name, string $price, int $plateCategory){
        $category = new PlateCategory();
        $resulset = $category->getById($plateCategory);
        $plateCategoryList = $category->getObject($resulset);

        $plate = new Plate();

        $plate->setId($id);
        $plate->setName($name);
        $plate->setPrice($price);
        $plate->setPlateCategory($plateCategoryList[0]);

        return $plate;
    }


    public function getObject(array $resulset){
        $plates = array();

        foreach ($resulset as $row) {
            array_push($plates, Plate::setPlateWhithAllProperties($row[0], $row[1], $row[2], $row[3]));
        }

        return $plates;
    }


    public function updateById(int $id, string $name, float $price, int $category)
    {
        $this->setConnection();

        echo "$id<br>$name<br>$price<br>$category";

        $sql = "UPDATE $this->dbTable SET name = ?, price = ?, category = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($name, $price, $category, $id));

        if($response == true){
            $statement = null;
            $this->connection = null;
            echo "completado";
            header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/plates.php");
        }else{
            $statement = null;
            $this->connection = null;
            throw new PdoExecuteFailException();
        }
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


    public function setPlateCategory($plateCategory){
        $this->plateCategory = $plateCategory;
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

    public function getPlateCategory(){
        return $this->plateCategory;
    }

}