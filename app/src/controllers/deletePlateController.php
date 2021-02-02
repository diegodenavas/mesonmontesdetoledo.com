<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");

$id = (int)$_POST["inputIdPlate"];

$plate = new Plate();
$resulset = $plate->deleteById($id);

header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/plates.php");