<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/controlPanel.css">

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "app/src/includes/controlPanelHeader.php"); ?>

    <div id="centerContainer">
        <?php require_once(ROOT . "app/src/includes/controlPanelAside.php"); ?>

        <section>
            <?php 
            require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
            require_once(ROOT . "app/src/models/Plate.php");

            $plate = new Plate();
            $resulset = $plate->getAll();
            $platesList = $plate->getObject($resulset);

            for ($i=0; $i < count($platesList); $i++) { 
                echo "<p>" . 
                $platesList[$i]->getId() . " " .
                $platesList[$i]->getName() . 
                "</p>";
            }
            ?>        
        </section>
    </div>

    <footer>

    </footer>
</body>
</html>