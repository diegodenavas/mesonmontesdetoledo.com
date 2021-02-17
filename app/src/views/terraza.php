<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terraza de verano</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/general.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/terraza.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "/app/src/includes/header.php"); ?>

    <section id="sectionTerraza">
        <?php require_once(ROOT . "/app/src/includes/nav.php"); ?>

        <div id="terrazaSectionTitle" class="sectionTitle">
            <h2>TERRAZA DE VERANO</h2>
        </div>

        <div class="centerContainer">
            <p class="terrazaParagraph">El placer del verano: compartir la comida con los tuyos al aire fresco. 
            El olor de la carne asándose en la parrilla y una jarra de cerveza fresca.</p>

            <img src="/mesonmontesdetoledo.com/app/public/images/gallery/terraza5.jpeg" alt="" class="terrazaImages">

            <p class="terrazaParagraph">Las noches sin prisa, las cenas sin fin charlando del mundo, de lo que significa disfrutar, de la 
            vida en la sierra, de esas chuletas que están en la brasa y pronto pasarán a tu plato...</p>

            <img src="/mesonmontesdetoledo.com/app/public/images/gallery/terraza6.jpg" alt="" class="terrazaImages">

            <p class="terrazaParagraph">En suma, se trata de disfrutar; y nuestro mesón te lo facilita habilitando en verano una estupenda 
            terraza con comida a la brasa y los sabores que el mesón pone en tu mesa; esos sabores que permanecen en el recuerdo y que te llevan de nuevo al verano.</p>
        </div>
    </section>

    <?php require_once(ROOT . "/app/src/includes/footer.php"); ?>
</body>
</html>