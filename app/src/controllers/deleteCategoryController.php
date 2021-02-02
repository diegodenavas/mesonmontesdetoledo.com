<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
require_once(ROOT . "app/src/models/PlateCategory.php");

$id = $_POST["inputIdCategory"];

$plateCategory = new PlateCategory();
$plateCategory->deleteById($id);

header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/categories.php");