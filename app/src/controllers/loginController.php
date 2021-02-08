<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/src/models/User.php");
require_once(ROOT . "app/src/controllers/loginController.php");

$userName = $_POST["loginUser"];
$pass = $_POST["loginPass"];

$user = new User();
$resulset = $user->getBy("name", $userName);
$userList = $user->getObject($resulset);

if(count($userList) == 1){
    if ($pass == $userList[0]->getPass()) {
        session_start();
        $_SESSION['user'] = $userList[0]->getName();
        header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/home.php");
    }else{
        echo "Contraseña incorrecta";
    }
}else{
    echo "ERROR: PONER EXCEPCIÓN AQUÍ";
}