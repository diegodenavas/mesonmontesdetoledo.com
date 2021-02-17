<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/controlPanel/public/css/generalControlPanel.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/controlPanel/public/css/categoriesControlPanel.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/mesonmontesdetoledo.com/controlPanel/public/js/categoriesControlPanel.js"></script>

    <?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: /mesonmontesdetoledo.com/controlPanel/src/views/login.php");
    }
    ?>
</head>
<body>
    <?php 
    require_once(ROOT . "controlPanel/src/includes/controlPanelHeader.php"); 
    require_once(ROOT . "controlPanel/src/includes/navControlPanel.php");
    ?>

    <div id="centerContainer">
        <?php require_once(ROOT . "controlPanel/src/includes/controlPanelAside.php"); ?>

        <section>
            <div id="informationContainer">
                <?php require_once(ROOT . "controlPanel/src/controllers/categoriesControlPanelController.php"); ?>
            </div>
        </section>
    </div>

    <footer>

    </footer>
</body>
</html>