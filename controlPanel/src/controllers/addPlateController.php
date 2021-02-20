<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$name = $_POST["inputNamePlate"];
$price = (float)$_POST["inputPricePlate"];
$category = $_POST["inputCategoryPlate"];
$important = (int)$_POST["inputImportanceCategory"];
$isTitle = $_POST["inputIsTitle"];

$plateCategory = new PlateCategory();
$resulsetPlateCategory = $plateCategory->getBy("name", $category);
$plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);

$plate = new Plate();

if($important == "lastPlace"){
    $resulset = $plate->getByQuery("SELECT * FROM plate WHERE importance=(SELECT MAX(importance) FROM plate)");
    $plateList = $plate->getObject($resulset);

    $auxImportance = $plateList[0]->getImportance();

    $plate->addPlate($name, $price, $plateCategoriesList[0]->getId(), $auxImportance+1, $isTitle);

    $response = true;
}else{
    $response = $plate->addPlateWithPosition($name, $price, $plateCategoriesList[0]->getId(), $important, $isTitle);
}

if($response) header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/plates.php");
else echo "No se pudo insertar el plato";