<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/core/ModelCore.php");
require_once(ROOT . "app/src/core/IResulsetToObject.php");

class PlateCategory extends ModelCore implements IResulsetToObject
{ 
    private $id, $name, $iconRoot, $importance, $turn;
    
    public function __construct()
    {
        parent::__construct(get_class($this));
    }

    public static function setPlateCategoryWhithAllProperties(int $id, string $name, string $iconRoot, int $importance, string $turn){
        $plateCategory = new PlateCategory();

        $plateCategory->setId($id);
        $plateCategory->setName($name);
        $plateCategory->setIconRoot($iconRoot);
        $plateCategory->setImportance($importance);
        $plateCategory->setTurn($turn);

        return $plateCategory;
    }


    public function getObject(array $resulset){
        $plateCategories = array();

        foreach ($resulset as $row) {
            array_push($plateCategories, PlateCategory::setPlateCategoryWhithAllProperties($row[0], $row[1], $row[2], $row[3], $row[4]));
        }

        return $plateCategories;
    }


    public function addCategory(array $values)
    {
        $this->setConnection();

        $sql = "INSERT INTO $this->dbTable(name, iconRoot, importance, turn) VALUES(?, ?, ?, ?)";
        
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($values[0], $values[1], $values[2], $values[3]));

        if($response == true){
            $statement = null;
            $this->connection = null;
        }else{
            $statement = null;
            $this->connection = null;
            throw new PdoExecuteFailException();
        }
    }


    public function updateById(int $id, array $values)
    {
        $this->setConnection();

        $sql = "UPDATE $this->dbTable SET name = ?, iconRoot = ?, turn = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($values[0], $values[1], $values[2], $id));

        if($response == true){
            $statement = null;
            $this->connection = null;
        }else{
            $statement = null;
            $this->connection = null;
            throw new PdoExecuteFailException();
        }

    }


    public function addCategoryWithPosition(string $name, string $icon, int $importance, string $turn){
        $this->setConnection();
        $pdoConnection = $this->getConnection();

        try{
            $pdoConnection->beginTransaction();

            $pdoConnection->exec("UPDATE platecategory SET importance=importance+1 WHERE importance >= $importance");
            $pdoConnection->exec("INSERT INTO platecategory(name, iconRoot, importance, turn) VALUES('$name', '$icon', $importance, '$turn')");
            $response = $pdoConnection->commit();
        }catch(Exception $e){
            $pdoConnection->rollBack();
            echo $e->getMessage();
        }

        $statement = null;
        $this->connection = null;

        return $response;

    }


    public function deleteCategoryWithPosition(string $id, int $importance){
        $this->setConnection();
        $pdoConnection = $this->getConnection();

        try{
            $pdoConnection->beginTransaction();

            $pdoConnection->exec("DELETE FROM platecategory WHERE id=$id");
            $pdoConnection->exec("UPDATE platecategory SET importance=importance-1 WHERE importance > $importance");
            $pdoConnection->commit();
        }catch(Exception $e){
            $pdoConnection->rollBack();
            echo $e->getMessage();
        }

        $statement = null;
        $this->connection = null;
    }


    public function updateCategoryWithPosition(int $id, string $name, string $icon, int $importance1, int $importance2, string $turn){
        $this->setConnection();
        $pdoConnection = $this->getConnection();

        try{
            if($importance1 < $importance2){
                $pdoConnection->beginTransaction();
                $pdoConnection->exec("UPDATE platecategory SET importance=importance+1 WHERE importance >= $importance2");
                $pdoConnection->exec("UPDATE platecategory SET name='$name', iconRoot='$icon', importance=$importance2, turn='$turn' WHERE id = $id");
                $pdoConnection->exec("UPDATE platecategory SET importance=importance-1 WHERE importance > $importance1");
                $pdoConnection->commit();
            }
            else if($importance1 > $importance2){
                $pdoConnection->beginTransaction();
                $pdoConnection->exec("UPDATE platecategory SET importance=importance+1 WHERE importance >= $importance2");
                $pdoConnection->exec("UPDATE platecategory SET name='$name', iconRoot='$icon', importance=$importance2, turn='$turn' WHERE id = $id");
                $pdoConnection->exec("UPDATE platecategory SET importance=importance-1 WHERE importance > $importance1");
                $pdoConnection->commit(); 
            }
            else{
                $pdoConnection->exec("UPDATE platecategory SET name='$name', iconRoot='$icon' WHERE id = $id");
            }
        }catch(Exception $e){
            $pdoConnection->rollBack();
            echo $e->getMessage();
        }
        $statement = null;
        $this->connection = null;
    }



    public function setId($id){
        $this->id = $id;
    }


    public function setName($name){
        $this->name = $name;
    }


    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }


    public function setIconRoot($iconRoot){
        $this->iconRoot = $iconRoot;
    }

    public function getIconRoot(){
        return $this->iconRoot;
    }


    public function setImportance(int $importance){
        $this->importance = $importance;
    }

    public function getImportance(){
        return $this->importance;
    }


    public function setTurn(string $turn){
        $this->turn = $turn;
    }

    public function getTurn(){
        return $this->turn;
    }

}