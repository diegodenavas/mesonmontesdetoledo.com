<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/models/User.php");

$userName = $_POST["registerUser"];
$pass = $_POST["registerPass"];
$repeatPass = $_POST["repeatPass"];

$user = new User();
$resulset = $user->getBy("name", $userName);
$userList = $user->getObject($resulset);

if ($pass != $repeatPass) {
    echo "Passwords do not match";
    return;
}


if(count($userList) == 0){
    $user->addUser($userName, password_hash($pass, PASSWORD_DEFAULT));
    echo "1";
}else{
    echo "0";
}