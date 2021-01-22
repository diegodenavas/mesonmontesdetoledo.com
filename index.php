<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meson Montes de Toledo</title>
    
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/general.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/index.css">
</head>
<body>
    <?php 
    require_once(__DIR__ . "/app/src/includes/header.php"); 
    ?>

    <section>
        <?php require_once(__DIR__ . "/app/src/includes/nav.php"); ?>

        <div class="sectionContainer">
            <p class="paragraphSectionContainer">Especialistas en clientes que regresan porque saben donde se 
                encuentra la buena mesa
            </p>
            <div class="gallery" id="gallery1">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/BarraCaptura.JPG" alt="" class="imgGallery">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/fachada1.jpeg" alt="" class="imgGallery" id="imgGalleryCenterTop">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/fachada2.jpeg" alt="" class="imgGallery">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/header.jpg" alt="" class="imgGallery" id="imgGalleryCenterLeft">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/PlatoCaptura.JPG" alt="" class="imgGallery">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/terraza1.jpeg" alt="" class="imgGallery" id="imgGalleryCenterRight">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/terraza2.jpeg" alt="" class="imgGallery">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/terraza3.jpeg" alt="" class="imgGallery" id="imgGalleryCenterBottom">
                <img src="/mesonmontesdetoledo.com/public/images/gallery/terraza4.jpeg" alt="" class="imgGallery">
            </div>
        </div>

        <div class="opinions"></div>

        <div class="sectionContainer">
            <div class="gallery"></div>
            <p class="paragraphSectionContainer">Especialistas en carne de venado a la plancha, cordero al horno,
            chuletas de cordero a la barbacoa y chuletón a los Montes de Toledo.
            </p>
        </div>

        <div class="opinions"></div>
            
        <div class="sectionContainer2">
            <p id="paragraphSectionContainer3">Disfruta de la mejor comida en pleno Parque Nacional de Cabañeros.
            </p>
            <div id="gallery3"></div>
        </div>
    </section>

    <?php require_once(__DIR__ . "/app/src/includes/footer.php"); ?>
</body>
</html>