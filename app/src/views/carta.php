<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/general.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/carta.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "app/src/includes/header.php"); ?>

    <section class="sectionBackgroundAlternative">
    <?php require_once(ROOT . "app/src/includes/nav.php"); ?>

    <div class="sectionTitle">
        <h2>NUESTRA CARTA</h2>
    </div>

    <div id="menuRestaurantComplete">
        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/entrantes.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Menú degustación</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/entrantes.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Entrantes</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/primeros.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Primeros</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/carnes.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Carnes</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/pescados.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Pescados</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/hamburgo.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Hamburguesas</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/sandwiches.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Sandwiches</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/raciones.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Raciones</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/postres.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Postres</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>

        <div class="menuCategory">
            <img src="/mesonmontesdetoledo.com/public/images/menu/vinos.png" alt="" class="menuCategoryIcon">
            <div class="categoryCenterContainer">
                <h3 id="categoryName">Vinos</h3>
                <img src="/mesonmontesdetoledo.com/public/images/menu/despliegue.png" alt="" class="menuCategoryArrowIcon">
            </div>
        </div>
    </div>
    </section>

    <?php require_once(ROOT . "app/src/includes/footer.php"); ?>
</body>
</html>