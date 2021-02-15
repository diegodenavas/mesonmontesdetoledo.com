<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/exceptions/PdoExecuteFailException.php");

class ModelCore
{
    protected $dbTable;
    private $dbConnect;

    protected $connection;

    

    public function __construct(string $dbTable)
    {
        $this->dbTable = $dbTable;
    }


    public function setConnection(){
        require_once(ROOT . "app/core/DbConnect.php");

        $this->dbConnect = new DbConnect();
        $connection = $this->dbConnect->connect();
        $this->dbConnect->setConnect(null);
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

        $statement = null;
        $this->connection = null;

        return $results;
    }


    public function getAllOrderByAsc(string $column)
    {
        $this->setConnection();

        $sql = "SELECT * FROM $this->dbTable ORDER BY $column ASC";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute();

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        $statement = null;
        $this->connection = null;

        return $results;
    }


    public function getAllOrderByDesc(string $column)
    {
        $this->setConnection();

        $sql = "SELECT * FROM $this->dbTable ORDER BY $column DESC";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute();

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        $statement = null;
        $this->connection = null;

        return $results;
    }


    public function getById(int $id)
    {
        $this->setConnection();

        $sql = "SELECT * FROM $this->dbTable WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($id));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        $statement = null;
        $this->connection = null;

        return $results;
    }


    public function getBy(string $column, string $value)
    {
        $this->setConnection();

        $sql = "SELECT * FROM $this->dbTable WHERE $column=?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($value));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        $statement = null;
        $this->connection = null;

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

        $statement = null;
        $this->connection = null;

        return $results;
    }


    public function deleteById(int $id)
    {
        $this->setConnection();

        $sql = "DELETE FROM $this->dbTable WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($id));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        $statement = null;
        $this->connection = null;

        return $results;
    }


    public function deleteBy(string $column, string $value)
    {
        $this->setConnection();

        $sql = "DELETE FROM $this->dbTable WHERE $column=?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($value));

        if($response == true){
            $results = $statement->fetchAll();
        }else{
            throw new PdoExecuteFailException();
        }

        $statement = null;
        $this->connection = null;

        return $results;
    }


    public function updateOneColumnById(int $id, string $column, string $value)
    {
        $this->setConnection();

        $sql = "UPDATE $this->dbTable SET $column = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $response = $statement->execute(array($value, $id));

        if($response == true){
            $statement = null;
            $this->connection = null;
        }else{
            throw new PdoExecuteFailException();
        }

    }


    public function getDbTable(){
        return $this->dbTable;
    }


    public function getConnection(){
        return $this->connection;
    }


    public function setDbTable($dbTable){
        $this->dbTable = $dbTable;
    }


    public function getDbConnect(){
        return $this->dbConnect;
    }

}