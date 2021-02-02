<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/core/ModelCore.php");
require_once(ROOT . "app/core/IResulsetToObject.php");

class PlateCategory extends ModelCore implements IResulsetToObject
{ 
    private $id, $name, $iconRoot;
    
    public function __construct()
    {
        parent::__construct(get_class($this));
    }

    public static function setPlateCategoryWhithAllProperties(int $id, string $name, string $iconRoot){
        $plateCategory = new PlateCategory();

        $plateCategory->setId($id);
        $plateCategory->setName($name);
        $plateCategory->setIconRoot($iconRoot);

        return $plateCategory;
    }


    public function getObject(array $resulset){
        $plateCategories = array();

        foreach ($resulset as $row) {
            array_push($plateCategories, PlateCategory::setPlateCategoryWhithAllProperties($row[0], $row[1], $row[2]));
        }

        return $plateCategories;
    }


    public function addCategory(array $values)
    {
        $this->setConnection();

        $sql = "INSERT INTO $this->dbTable(name, iconRoot) VALUES(?, ?)";
        
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($values[0], $values[1]));

        if($response == true){
            $statement = null;
            $this->connection = null;
            header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/categories.php");
        }else{
            $statement = null;
            $this->connection = null;
            throw new PdoExecuteFailException();
        }
    }


    public function updateById(int $id, array $values)
    {
        $this->setConnection();

        $sql = "UPDATE $this->dbTable SET name = ?, iconRoot = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($values[0], $values[1], $id));

        if($response == true){
            $statement = null;
            $this->connection = null;
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

}