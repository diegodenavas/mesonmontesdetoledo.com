<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donde estamos</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/general.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/contacto.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "/app/src/includes/header.php"); ?>

    <section class="sectionBackgroundAlternative">
        <?php require_once(ROOT . "/app/src/includes/nav.php"); ?>

        <div class="sectionTitle">
            <h2>DONDE ESTAMOS</h2>
        </div>

        <div class="centerContainer">
            <div id="contactCard">
                <p id="contactCardTitle">Mesón Montes de Toledo</p>
                <p class="contactCardDescription">Av. Montes de Toledo, 8<br>
                    13194 Navas de Estena<br>
                    Ciudad Real</p>
                <p class="contactCardDescription">Información y reservas</p>
                <div class="telephones">
                    <img src="/mesonmontesdetoledo.com/public/images/webIcons/telefono.png" alt="" class="telephoneIcon">
                    <p>925 409 146</p>
                </div>
                <div class="telephones">
                    <img src="/mesonmontesdetoledo.com/public/images/webIcons/movil.png" alt="" class="telephoneIcon">
                    <p>696 731 232</p>
                </div>
            </div>
        </div>
    </section>

    <?php require_once(ROOT . "app/src/includes/footer.php"); ?>
</body>
</html>