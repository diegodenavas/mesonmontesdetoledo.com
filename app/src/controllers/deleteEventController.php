<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/src/models/Event.php");
require_once(ROOT . "app/exceptions/PdoExecuteFailException.php");

$id = (int)$_POST["inputIdEvent"];

$event = new Event();

try{
    $event->deleteById($id);
    header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/events.php");
}catch(PdoExecuteFailException $e){
    echo $e->getMessage();
}