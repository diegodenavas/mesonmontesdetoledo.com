<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/core/ModelCore.php");
require_once(ROOT . "app/core/IResulsetToObject.php");

class Event extends ModelCore implements IResulsetToObject
{ 
    private $id, $name, $imgRoot;
    
    public function __construct()
    {
        parent::__construct(get_class($this));
    }

    public static function setEventWhithAllProperties(int $id, string $name, string $imgRoot){
        $event = new Event();

        $event->setId($id);
        $event->setName($name);
        $event->setImgRoot($imgRoot);

        return $event;
    }


    public function getObject(array $resulset){
        $events = array();

        foreach ($resulset as $row) {
            array_push($events, Event::setEventWhithAllProperties($row[0], $row[1], $row[2]));
        }

        return $events;
    }


    public function updateById(int $id, array $values)
    {
        $this->setConnection();

        $sql = "UPDATE $this->dbTable SET name = ?, imgRoot = ? WHERE id = ?";
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


    public function getImgRoot(){
        return $this->imgRoot;
    }

    public function setImgRoot($imgRoot){
        $this->imgRoot = $imgRoot;
    }

}