<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/general.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/horario.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "/app/src/includes/header.php"); ?>

    <section class="sectionBackgroundAlternative">
        <?php require_once(ROOT . "/app/src/includes/nav.php"); ?>

        <div class="sectionTitle">
            <h2>HORARIO</h2>
        </div>

        <div class="centerContainer">

            <div class="season">
                <div class="menuCategory seasonTitle">
                    <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/iconoInvierno.png" alt="" class="menuCategoryIcon">
                    <h3 class="categoryName">Invierno (octubre - junio)</h3>
                </div>

                <div class="scheduleDescriptionContainer">
                    <div class="menuCategory scheduleParagraph">
                        <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/calendar.png" alt="" class="menuCategoryIcon">
                        <p>Viernes: 18:00 a cierre</p>
                    </div>
                    <div class="menuCategory scheduleParagraph">
                        <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/calendar.png" alt="" class="menuCategoryIcon">
                        <p>Sábados<br>
                        Domingos y: 11:00 a cierre<br>
                        Festivos</p>
                    </div>
                </div>
            </div>

            <div class="season">
                <div class="menuCategory seasonTitle">
                    <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/iconoVerano.png" alt="" class="menuCategoryIcon">
                    <h3 class="categoryName">Verano (julio - septiembre)</h3>
                </div>

                <div class="scheduleDescriptionContainer">
                    <div class="menuCategory scheduleParagraph">
                        <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/calendar.png" alt="" class="menuCategoryIcon">
                        <p>Martes a viernes: 19:00 a cierre</p>
                    </div>
                    <div class="menuCategory scheduleParagraph">
                        <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/calendar.png" alt="" class="menuCategoryIcon">
                        <p>Sábados<br>
                        Domingos y: 11:00 a cierre<br>
                        Festivos</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php require_once(ROOT . "app/src/includes/footer.php"); ?>
</body>
</html>