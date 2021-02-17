<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/models/User.php");

$userName = $_POST["loginUser"];
$pass = $_POST["loginPass"];

$user = new User();
$resulset = $user->getBy("name", $userName);
$userList = $user->getObject($resulset);

if(count($userList) == 1){
    if (password_verify($pass, $userList[0]->getPass())) {
        session_start();
        $_SESSION['user'] = $userList[0]->getName();
        echo "1";
    }else{
        echo "Error pass";
    }
}else{
    echo "0";
}