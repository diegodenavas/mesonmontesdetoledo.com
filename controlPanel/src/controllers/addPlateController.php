<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$name = $_POST["inputNamePlate"];
$price = $_POST["inputPricePlate"];
$category = $_POST["inputCategoryPlate"];

$plateCategory = new PlateCategory();
$resulsetPlateCategory = $plateCategory->getBy("name", $category);
$plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);

$plate = new Plate();
$plate->addPlate($name, $price, $plateCategoriesList[0]->getId());

header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/plates.php");