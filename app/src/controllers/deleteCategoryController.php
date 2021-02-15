<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
require_once(ROOT . "app/src/models/PlateCategory.php");

$id = $_POST["inputIdCategory"];
$importance = (int)$_POST["inputImportanceCategory"];

echo $id."<br>";
echo $importance;

$plateCategory = new PlateCategory();
$plateCategory->deleteCategoryWithPosition($id, $importance);

header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/categories.php");