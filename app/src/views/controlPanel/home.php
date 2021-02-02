<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/generalControlPanel.css">

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "app/src/includes/controlPanelHeader.php"); ?>

    <div id="centerContainer">
        <?php require_once(ROOT . "app/src/includes/controlPanelAside.php"); ?>

        <section>
            <?php 
            require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
            ?>
        </section>
    </div>

    <footer>

    </footer>
</body>
</html>