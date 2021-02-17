<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meson Montes de Toledo</title>
    
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/general.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/index.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/mesonmontesdetoledo.com/app/public/js/gallery.js"></script>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "/app/src/includes/header.php"); ?>

    <section>
        <?php 
        require_once(ROOT . "/app/src/includes/nav.php"); 
        require_once(ROOT . "/app/src/models/Event.php"); 
        
        $event = new Event();
        $resulset = $event->getAll();
        $eventsList = $event->getObject($resulset);

        if (count($eventsList) > 0) {
            echo 
            "<div id='eventImgContainer'>
                <img src='/mesonmontesdetoledo.com/app/public/images/events/".$eventsList[0]->getImgRoot()."' id='eventImg'>
            </div>";
        }
        ?>

        <div class="sectionContainer" id='sectionContainer1'>
            <div class="paragraphSectionContainer">
                <p>Clientes que regresan porque saben donde se 
                    encuentra la buena mesa
                </p>
                <a href="/mesonmontesdetoledo.com/contacto"><p class='paragraphSectionA'>Donde estamos</p></a>
            </div>
            <div class="gallery" id="gallery1img">
                <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/leftArrow.png" alt="preview image" class='leftArrowGallery'>
                <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/rightArrow.png" alt="next image" class='rightArrowGallery'>
            </div>
        </div>

        <div class="opinions">
            <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/comment.png" alt="opinions">
            <div class='commentsContainer'>
                <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/puntuacion.png" alt="punctuation">
                <p>"Estupendo restaurante para una comida en buena compañía"</p>
            </div>
        </div>

        <div class="sectionContainer" id='sectionContainer2'>
            <div class="gallery" id="gallery2img">
                <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/leftArrow.png" alt="preview image" class='leftArrowGallery'>
                <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/rightArrow.png" alt="next image" class='rightArrowGallery'>
            </div>
            <div class="paragraphSectionContainer">
                <p>Especialistas en carne de venado, de ternera, y vaca
                </p>
                <a href="/mesonmontesdetoledo.com/carta"><p class='paragraphSectionA'>Nuestra carta</p></a>
            </div>
        </div>

        <div class="opinions">
            <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/comment.png" alt="opinions">
            <div class='commentsContainer'>
                <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/puntuacion.png" alt="punctuation">
                <p>"Supera todas las expectativas"</p>
            </div>
        </div>

        <div class="sectionContainer" id='sectionContainer3'>
            <div class="paragraphSectionContainer2">
                <p>Disfruta de la mejor comida en pleno Parque Nacional de Cabañeros</p>
                <a href="/mesonmontesdetoledo.com/horario"><p class='paragraphSectionA'>Horario</p></a>
            </div>
            <div class="gallery" id="gallery3img">
                <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/leftArrow.png" alt="preview image" class='leftArrowGallery'>
                <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/rightArrow.png" alt="next image" class='rightArrowGallery'>
            </div>
        </div>
    </section>

    <?php require_once(ROOT . "/app/src/includes/footer.php"); ?>
</body>
</html>