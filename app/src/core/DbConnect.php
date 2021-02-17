<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/config/database.php");

class DbConnect extends PDO{

    private $driver, $host, $user, $pass, $database, $charset;
    private $connect;

    public function __construct(){
        $this->driver = DRIVER;
        $this->host = HOST;
        $this->user = USER;
        $this->pass = PASS;
        $this->database = DATABASE;
        $this->charset = CHARSET;
    }


    public function connect(){
        try{
            $this->connect = new PDO($this->driver . ":dbname=" . $this->database . ";host=" . $this->host . ";charset=" . $this->charset, $this->user, $this->pass, array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
        }catch (PDOException $e){
            echo "No se pudo establecer la conexion<br>";
            echo $e->getMessage();
        }

        return $this->connect;
    }


    public function getconnect(){
        return $this->connect;
    }

    public function setConnect($connect){
        $this->connect = $connect;
    }

}