<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$id = (int)$_POST["inputIdPlate"];
$name = $_POST["inputNamePlate"];
$price = (float)$_POST["inputPricePlate"];
$category = $_POST["selectCategoryPlate"];
$importance1 = $_POST["importance1"];
$importance2 = $_POST["inputImportanceCategory"];
$isTitle = $_POST["inputIsTitle"];

$plateCategory = new PlateCategory();
$resulset = $plateCategory->getBy("name", $category);
$plateCategoriesList = $plateCategory->getObject($resulset);

$plate = new Plate();

if($importance2 == -1){
    $plate->updateById($id, $name, $price, $plateCategoriesList[0]->getId(), $isTitle);
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/plates.php");
}else{
    if($importance2 == 0){
        $resulset = $plate->getByQuery("SELECT * FROM plate WHERE importance=(SELECT MAX(importance) FROM plate)");
        $plateList = $plate->getObject($resulset);
        $importance2 = $plateList[0]->getImportance() + 1;
    }

    try{
        $plate->updatePlateWithPosition($id, $name, $price, $plateCategoriesList[0]->getId(), $importance1, $importance2, $isTitle);
        header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/plates.php");
    }catch(PdoExecuteFailException $e){
        echo $e->getMessage();
    }
}