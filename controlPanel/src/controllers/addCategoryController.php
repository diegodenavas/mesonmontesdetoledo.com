<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
require_once(ROOT . "app/src/models/PlateCategory.php");

$id = $_POST["inputIdCategory"];
$name = $_POST["inputNameCategory"];
$icon = $_POST["inputIconCategory"];
$importance = (int)$_POST['inputImportanceCategory'];
$turn = $_POST['inputTurn'];

$plateCategory = new PlateCategory();

if($importance == 0){
    $resulset = $plateCategory->getByQuery("SELECT * FROM platecategory WHERE importance=(SELECT MAX(importance) FROM platecategory)");
    $plateCategoryList = $plateCategory->getObject($resulset);

    $auxImportance = $plateCategoryList[0]->getImportance();

    $plateCategory->addCategory(array($name, $icon, $auxImportance+1, $turn));

    $response = true;
}else{
    $response = $plateCategory->addCategoryWithPosition($name, $icon, (int)$importance, $turn);
}

if($response) header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/categories.php");
else echo "No se pudo insertar la categoría";