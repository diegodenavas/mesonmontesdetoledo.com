<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");

$id = (int)$_POST["inputIdPlate"];

$plate = new Plate();
$resulset = $plate->deleteById($id);

header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/plates.php");