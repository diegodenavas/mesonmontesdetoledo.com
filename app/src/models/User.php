<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/core/ModelCore.php");
require_once(ROOT . "app/core/IResulsetToObject.php");

class User extends ModelCore implements IResulsetToObject
{ 
    private $id, $name, $pass, $lastConnection;
    
    public function __construct()
    {
        parent::__construct(get_class($this));
    }

    public static function setObjectWhithAllProperties(int $id, string $name, string $pass, string $lastConnection){
        $user = new User();

        $user->setId($id);
        $user->setName($name);
        $user->setPass($pass);
        $user->setLastConnection($lastConnection);

        return $user;
    }


    public function getObject(array $resulset){
        $users = array();

        foreach ($resulset as $row) {
            array_push($users, User::setObjectWhithAllProperties($row[0], $row[1], $row[2], $row[3]));
        }

        return $users;
    }


    public function addUser(string $name, string $pass)
    {
        $this->setConnection();

        $sql = "INSERT INTO $this->dbTable(name, pass, lastConnection) VALUES(?, ?, CURDATE())";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($name, $pass));

        if($response == true){
            $statement = null;
            $this->connection = null;
        }else{
            throw new PdoExecuteFailException();
        }

    }


    public function setId($id){
        $this->id = $id;
    }


    public function setName($name){
        $this->name = $name;
    }


    public function setPass($pass){
        $this->pass = $pass;
    }


    public function setLastConnection($lastConnection){
        $this->lastConnection = $lastConnection;
    }



    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getPass(){
        return $this->pass;
    }

    public function getLastConnection(){
        return $this->lastConnection;
    }

}