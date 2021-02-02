<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$id = (int)$_POST["inputIdPlate"];
$name = $_POST["inputNamePlate"];
$price = $_POST["inputPricePlate"];
$category = $_POST["selectCategoryPlate"];

$plateCategory = new PlateCategory();
$resulset = $plateCategory->getBy("name", $category);
$plateCategoriesList = $plateCategory->getObject($resulset);

$plate = new Plate();

$plate->updateById($id, $name, $price, $plateCategoriesList[0]->getId());