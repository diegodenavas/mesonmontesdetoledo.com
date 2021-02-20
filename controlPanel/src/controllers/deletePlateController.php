<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");

$id = (int)$_POST["inputIdPlate"];
$importance = (int)$_POST["importance1"];

$plate = new Plate();
$resulset = $plate->deletePlateWithPosition($id, $importance);

header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/plates.php");