<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
require_once(ROOT . "app/src/models/PlateCategory.php");

$id = $_POST["inputIdCategory"];
$importance = (int)$_POST["importance1"];

echo $importance;

$plateCategory = new PlateCategory();
$plateCategory->deleteCategoryWithPosition($id, $importance);

header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/categories.php");