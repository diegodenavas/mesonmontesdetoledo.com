<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");

class DbConnect extends PDO{

    private $driver, $host, $user, $pass, $database, $charset;

    public function __construct(){
        $dbConfig = require_once(ROOT . "app/config/DATABASE.php");

        $this->driver = $dbConfig["driver"];
        $this->host = $dbConfig["host"];
        $this->user = $dbConfig["user"];
        $this->pass = $dbConfig["pass"];
        $this->database = $dbConfig["database"];
        $this->charset = $dbConfig["charset"];
    }


    public function connect(){
        try{
            $connection = new PDO($this->driver . ":dbname=" . $this->database . ";host=" . $this->host . ";charset=" . $this->charset, $this->user, $this->pass, array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
            return $connection;
        }catch (PDOException $e){
            echo "No se pudo establecer la conexion";
            echo $e->getMessage();
        }
    }

}