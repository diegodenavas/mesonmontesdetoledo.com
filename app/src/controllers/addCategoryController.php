<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
require_once(ROOT . "app/src/models/PlateCategory.php");

$id = $_POST["inputIdCategory"];
$name = $_POST["inputNameCategory"];
$icon = $_POST["inputIconCategory"];

$plateCategory = new PlateCategory();
$plateCategory->addCategory(array($name, $icon));

header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/categories.php");