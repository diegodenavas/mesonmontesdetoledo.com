<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/models/PlateCategory.php");
require_once(ROOT . "app/src/exceptions/PdoExecuteFailException.php");

$id = (int)$_POST["inputIdCategory"];
$name = $_POST["inputNameCategory"];
$icon = $_POST["inputIconCategory"];
$importance1 = (int)$_POST["importance1"];
$importance2 = (int)$_POST["inputImportanceCategory"];
$turn = $_POST['inputTurn'];

$plateCategory = new PlateCategory();

if($importance2 == -1){
    $plateCategory->updateById($id, array($name, $icon, $turn));
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/categories.php");
}else{
    if($importance2 == 0){
        $resulset = $plateCategory->getByQuery("SELECT * FROM platecategory WHERE importance=(SELECT MAX(importance) FROM platecategory)");
        $plateCategoryList = $plateCategory->getObject($resulset);
        $importance2 = $plateCategoryList[0]->getImportance() + 1;
    }
    
    try{
        $plateCategory->updateCategoryWithPosition($id, $name, $icon, $importance1, $importance2, $turn);
        header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/categories.php");
    }catch(PdoExecuteFailException $e){
        echo $e->getMessage();
    }
}