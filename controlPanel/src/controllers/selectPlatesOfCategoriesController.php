<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/models/Plate.php");

$category = $_POST["category"];

$plate = new Plate();
$resulset = $plate->getByQuery("SELECT * FROM PLATE WHERE category=(SELECT id FROM platecategory WHERE name='$category')");
$platesList = $plate->getObject($resulset);

$allPlateImportanceToCategory = array();
$allPlateNameToCategory = array();

foreach ($platesList as $plateObject) {
    array_push($allPlateImportanceToCategory, $plateObject->getImportance());
    array_push($allPlateNameToCategory, $plateObject->getName());
}

$allPlateToCategory =  [$allPlateImportanceToCategory, $allPlateNameToCategory];

echo json_encode($allPlateToCategory);