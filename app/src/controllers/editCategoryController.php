<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/src/models/PlateCategory.php");
require_once(ROOT . "app/exceptions/PdoExecuteFailException.php");

$id = (int)$_POST["inputIdCategory"];
$name = $_POST["inputNameCategory"];
$icon = $_POST["inputIconCategory"];

$plateCategory = new PlateCategory();

try{
    $plateCategory->updateById($id, array($name, $icon));
    header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/categories.php");
}catch(PdoExecuteFailException $e){
    echo $e->getMessage();
}

