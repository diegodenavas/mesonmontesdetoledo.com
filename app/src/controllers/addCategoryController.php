<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
require_once(ROOT . "app/src/models/PlateCategory.php");

$id = $_POST["inputIdCategory"];
$name = $_POST["inputNameCategory"];
$icon = $_POST["inputIconCategory"];
$importance = $_POST['inputImportanceCategory'];

$plateCategory = new PlateCategory();

if($importance == "lastPlace"){
    $resulset = $plateCategory->getByQuery("SELECT * FROM platecategory WHERE importance=(SELECT MAX(importance) FROM platecategory)");
    $plateCategoryList = $plateCategory->getObject($resulset);

    $auxImportance = $plateCategoryList[0]->getImportance();

    $plateCategory->addCategory(array($name, $icon, $auxImportance+1));
}else{
    $response = $plateCategory->addCategoryWithPosition($name, $icon, (int)$importance);
}

if($response) header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/categories.php");
else echo "No se pudo insertar la categoría";