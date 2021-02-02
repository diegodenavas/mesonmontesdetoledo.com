<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/generalControlPanel.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/categoriesControlPanel.css">

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/mesonmontesdetoledo.com/public/js/categoriesControlPanel.js"></script>
</head>
<body>
    <?php require_once(ROOT . "app/src/includes/controlPanelHeader.php"); ?>

    <div id="centerContainer">
        <?php require_once(ROOT . "app/src/includes/controlPanelAside.php"); ?>

        <section>
            <div id="informationContainer">
                <?php require_once(ROOT . "app/src/controllers/categoriesControlPanelController.php"); ?>
            </div>
        </section>
    </div>

    <footer>

    </footer>
</body>
</html>