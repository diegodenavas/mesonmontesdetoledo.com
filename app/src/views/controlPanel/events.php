<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/generalControlPanel.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/eventsControlPanel.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/mesonmontesdetoledo.com/public/js/eventsControlPanel.js"></script>

    <?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /mesonmontesdetoledo.com/app/src/views/controlPanel/login.php");
    }
    ?>
</head>
<body>
    <?php 
    require_once(ROOT . "app/src/includes/controlPanelHeader.php"); 
    require_once(ROOT . "app/src/includes/navControlPanel.php");
    ?>

    <div id="centerContainer">
        <?php require_once(ROOT . "app/src/includes/controlPanelAside.php"); ?>

        <section>
            <?php 
            require_once(ROOT . "app/src/models/Event.php");

            $event = new Event();
            $resulset = $event->getAll();
            $eventsList = $event->getObject($resulset);

            $count = 0;

                echo 
                "<div class='eventsContainer'>
                    <div id='eventButtonsContainer'>
                        <button id='deleteEventButton'>Eliminar evento</button>
                        <button id='eventButton'>Nuevo evento</button>
                    </div>";
                
                    foreach ($eventsList as $event) {
                    echo"
                    <img src='/mesonmontesdetoledo.com/public/images/events/".$event->getImgRoot()."' class='eventImg'>
                    <input type='hidden' name='inputId".$count."' value='".$event->getId()."' id='inputId".$count."' class='inputId'>
                    <input type='hidden' name='inputName".$count."' value='".$event->getName()."' id='inputName".$count."' class='inputName'>
                    <input type='hidden' name='inputImg".$count."' value='".$event->getImgRoot()."' id='inputImg".$count."' class='inputImg'>
                 </div>";

                 $count++;
            }
            require_once(ROOT . "app/src/includes/eventsControlPanelForms.php");
            ?>
        </section>

    </div>

    <footer>

    </footer>
</body>
</html>