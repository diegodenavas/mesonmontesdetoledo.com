<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/generalControlPanel.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/platesControlPanel.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/mesonmontesdetoledo.com/public/js/platesControlPanel.js"></script>

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
            <div id="informationContainer">
                <?php require_once(ROOT . "app/src/controllers/platesControlPanelController.php"); ?>
            </div>
        </section>
    </div>

    <footer>

    </footer>
</body>
</html>