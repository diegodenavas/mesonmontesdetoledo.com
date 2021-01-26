<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/exceptions/PdoExecuteFailException.php");

class ModelCore
{
    private $dbTable;
    private $connection;

    public function __construct(string $dbTable)
    {
        $this->dbTable = $dbTable;
    }


    public function setConnection(){
        require_once(ROOT . "app/core/DbConnect.php");

        $pdoConnection = new DbConnect();
        $connection = $pdoConnection->connect();
        $this->connection = $connection;
    }


    public function getAll()
    {
        $this->setConnection();

        $sql = "SELECT * FROM $this->dbTable";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute();

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        return $results;
    }


    public function getById(int $id)
    {
        $this->setConnection();

        $sql = "SELECT * FROM $this->table WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($id));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        return $results;
    }


    public function getBy(string $column, string $value)
    {
        $this->setConnection();

        $sql = "SELECT * FROM $this->table WHERE $column=?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($value));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        return $results;
    }


    public function getByQuery(string $query)
    {
        $this->setConnection();

        $sql = $query;
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute();

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        return $results;
    }


    public function deleteById(int $id)
    {
        $this->setConnection();

        $sql = "DELETE FROM $this->table WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($id));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        return $results;
    }


    public function deleteBy(string $column, string $value)
    {
        $this->setConnection();

        $sql = "DELETE FROM $this->table WHERE $column=?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($value));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        return $results;
    }


    public function updateOneColumnById(int $id, string $column, string $value)
    {
        $this->setConnection();

        $sql = "UPDATE $this->table SET $column = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($value, $id));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        return $results;
    }

}