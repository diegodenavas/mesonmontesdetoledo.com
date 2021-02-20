<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/core/ModelCore.php");
require_once(ROOT . "app/src/core/IResulsetToObject.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

class Plate extends ModelCore implements IResulsetToObject
{ 
    private $id, $name, $price, $importance, $isTitle;
    private $plateCategory;
    
    public function __construct()
    {
        parent::__construct(get_class($this));
    }

    public static function setPlateWhithAllProperties(int $id, string $name, string $price, $plateCategory, int $importance, string $isTitle){
        $category = new PlateCategory();
        $resulset = $category->getById($plateCategory);
        $plateCategoryList = $category->getObject($resulset);

        $plate = new Plate();

        $plate->setId($id);
        $plate->setName($name);
        $plate->setPrice($price);
        $plate->setPlateCategory($plateCategoryList[0]);
        $plate->setImportance($importance);
        $plate->setIsTitle($isTitle);

        return $plate;
    }


    public function getObject(array $resulset){
        $plates = array();

        foreach ($resulset as $row) {
            array_push($plates, Plate::setPlateWhithAllProperties($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));
        }

        return $plates;
    }


    public function updateById(int $id, string $name, float $price, int $category, string $isTitle)
    {
        $this->setConnection();

        $sql = "UPDATE $this->dbTable SET name = ?, price = ?, category = ?, isTitle=? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($name, $price, $category, $isTitle, $id));

        if($response == true){
            $statement = null;
            $this->connection = null;
        }else{
            $statement = null;
            $this->connection = null;
            throw new PdoExecuteFailException();
        }
    }

    
    public function addPlate(string $name, float $price, int $category, int $importance, string $isTitle)
    {
        $this->setConnection();

        $sql = "INSERT INTO $this->dbTable(name, price, category, importance, isTitle) VALUES(?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($name, $price, $category, $importance, $isTitle));

        if($response == true){
            $statement = null;
            $this->connection = null;
        }else{
            $statement = null;
            $this->connection = null;
            throw new PdoExecuteFailException();
        }
    }




    public function addPlateWithPosition(string $name, float $price, int $category, int $importance, string $isTitle){
        $this->setConnection();
        $pdoConnection = $this->getConnection();

        try{
            $pdoConnection->beginTransaction();

            $pdoConnection->exec("UPDATE plate SET importance=importance+1 WHERE importance >= $importance");
            $pdoConnection->exec("INSERT INTO plate(name, price, category, importance, isTitle) VALUES('$name', $price, $category, $importance, '$isTitle')");
            $response = $pdoConnection->commit();
        }catch(Exception $e){
            $pdoConnection->rollBack();
            echo $e->getMessage();
        }

        $statement = null;
        $this->connection = null;

        return $response;
    }


    public function deletePlateWithPosition(int $id, int $importance){
        $this->setConnection();
        $pdoConnection = $this->getConnection();

        try{
            $pdoConnection->beginTransaction();

            $pdoConnection->exec("DELETE FROM plate WHERE id=$id");
            $pdoConnection->exec("UPDATE plate SET importance=importance-1 WHERE importance > $importance");
            $pdoConnection->commit();
        }catch(Exception $e){
            $pdoConnection->rollBack();
            echo $e->getMessage();
        }

        $statement = null;
        $this->connection = null;
    }


    public function updatePlateWithPosition(int $id, string $name, float $price, int $category, int $importance1, int $importance2, string $isTitle){
        $this->setConnection();
        $pdoConnection = $this->getConnection();

        try{
            if($importance1 < $importance2){
                echo "entra aqui 1";

                $pdoConnection->beginTransaction();
                $pdoConnection->exec("UPDATE plate SET importance=importance+1 WHERE importance >= $importance2");
                $pdoConnection->exec("UPDATE plate SET name='$name', price='$price', category='$category', importance=$importance2, isTitle='$isTitle' WHERE id = $id");
                $pdoConnection->exec("UPDATE plate SET importance=importance-1 WHERE importance > $importance1");
                $pdoConnection->commit();
            }
            else if($importance1 > $importance2){
                echo "entra aqui 2";

                $pdoConnection->beginTransaction();
                $pdoConnection->exec("UPDATE plate SET importance=importance+1 WHERE importance >= $importance2");
                $pdoConnection->exec("UPDATE plate SET name='$name', price='$price', category='$category', importance=$importance2, isTitle='$isTitle' WHERE id = $id");
                $pdoConnection->exec("UPDATE plate SET importance=importance-1 WHERE importance > $importance1");
                $pdoConnection->commit(); 
            }
            else{
                echo "entra aqui 3";
                $pdoConnection->exec("UPDATE plate SET name='$name', price='$price', category='$category', isTitle='$isTitle' WHERE id = $id");
            }
        }catch(Exception $e){
            $pdoConnection->rollBack();
            echo $e->getMessage();
        }
        $statement = null;
        $this->connection = null;
    }



    public function setId(int $id)
    {
        $this->id = $id;
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }


    public function setPrice(float $price)
    {
        $this->price = $price;
    }


    public function setPlateCategory($plateCategory)
    {
        $this->plateCategory = $plateCategory;
    }


    public function setImportance(int $importance)
    {
        $this->importance = $importance;
    }

    public function setIsTitle(int $isTitle){
        $this->isTitle = $isTitle;
    }



    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPlateCategory()
    {
        return $this->plateCategory;
    }

    public function getImportance()
    {
        return $this->importance;
    }

    public function getIsTitle(){
        return $this->isTitle;
    }

}