<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/login.php");
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");
require_once(ROOT . "app/src/models/Event.php");
require_once(ROOT . "app/exceptions/PdoExecuteFailException.php");

$id = (int)$_POST["inputIdEvent"];
$name = $_POST["inputNameEvent"];
$imgTmpName = $_FILES["inputImgEvent"]["tmp_name"];
$imgName = $_FILES["inputImgEvent"]["name"];
$imgType = $_FILES["inputImgEvent"]["type"];
$imgSize = $_FILES["inputImgEvent"]['size'];
$imgError = $_FILES["inputImgEvent"]['error'];

$allowedTypes = array("image/jpg", "image/jpeg", "image/png", "image/gif");

if (in_array($imgType, $allowedTypes) && ($imgSize < 200000))
{
    if (move_uploaded_file($imgTmpName,  ROOT . "public/images/events/$imgName")){
        deleteDirectoryFiles($imgName);
        echo "El archivo ha sido cargado correctamente.";
    }else{
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
    }
}else{
    echo 
    "La extensión o el tamaño de los archivos no es correcta. 
    <br>Se permiten archivos .gif o .jpg 
    <br>Se permiten archivos de 100 Kb máximo.";
}

$event = new Event();
$resulset = $event->getAll();
$eventsList = $event->getObject($resulset);

if(count($eventsList) > 0){
    try{
        $event->updateById($id, array($name, $imgName));
        header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/events.php");
    }catch(PdoExecuteFailException $e){
        echo $e->getMessage();
    }
}else{
    try {
        $event->addEvent($name, $imgName);
        header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/events.php");
    } catch (PdoExecuteFailException $e) {
        echo $e->getMessage();
    }
}


function deleteDirectoryFiles(string $fileName){
    $directory = ROOT . "public/images/events";
    $dirint = dir($directory);

    while (($file = $dirint->read()) !== false)
    {
        if($file != $fileName && ($file != "." && $file != "..")) {
            unlink(ROOT . "public/images/events/".$file);
        }else{
            continue;
        }
    }
    $dirint->close();
}