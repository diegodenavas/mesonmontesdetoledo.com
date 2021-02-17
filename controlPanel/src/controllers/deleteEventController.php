<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");
require_once(ROOT . "app/src/models/Event.php");
require_once(ROOT . "app/src/exceptions/PdoExecuteFailException.php");

$id = (int)$_POST["inputIdEvent"];

$event = new Event();

try{
    $event->deleteById($id);
    header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/events.php");
}catch(PdoExecuteFailException $e){
    echo $e->getMessage();
}