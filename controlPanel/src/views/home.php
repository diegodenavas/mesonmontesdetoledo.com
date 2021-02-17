<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/controlPanel/public/css/generalControlPanel.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
            <div id='homeInstructionsContainer'>
                <h2>Sobre el panel de control</h2>
                <p>
                    Éste es el panel de control de la página web mesonmontesdetoledo.com<br><br>
                    En él podrás gestionar diferente información de la página para hacer que cambie de cara a los usuarios que la visualicen.<br><br>
                    Dicha información es la siguiente:
                </p>

                <p>
                    <span>- Anuncio de evento: correspondiente a la pestaña <b>Eventos</b></span>
                    <span>- Platos de la carta: correspondiente a la pestaña <b>Platos carta</b></span>
                    <span>- Categorías a las que pertenecen los platos: correspondiente a la pestaña <b>Categorías carta</b></span>
                </p>

                <h2>Eventos</h2>
                <p>
                    Podrás elegir una fotografía que se mostrará en la página principal (la página de inicio) de la web.<br><br>
                    Al pinchar en la pestaña del menú "Eventos" se abrirá un página en la que aparecerán 2 botones:
                </p>
                <p>
                    <span>
                    - Mediante el botón verde <b>"Nuevo evento"</b> podrás subir una imagen guardada en el ordenador o en el móvil a la página web. Ésta imagen
                    se mostrará en la página principal de la web.
                    </span>
                    <span>
                    - Además si tuvieses ya una imagen subida podrías cambiarla pulsando éste boton y sustituirla por otra imagen de tu ordenador o movil.
                    Mediante el botón rojo <b>"Eliminar evento"</b> puedes eliminar la imagen activa en caso de que haya alguna subida para que no se muestre nada 
                    en la web.
                    </span>
                </p>
                <p>
                    Si no hay ninguna imagen subida no se mostrará nada en la página principal.
                </p>

                <h2>Platos carta</h2>
                <p>
                    En ésta pestaña podrás crear nuevos platos, actualizar el nombre, precio y categoría de los existentes, y eliminar los que desees.<br><br>
                    Para ello tienes 3 botones disponibles:
                </p>
                <p>
                    <span>
                        - <b>El botón verde con el texto "Añadir"</b> te permitirá agregar nuevos platos. Cómo verás hay un boton "Añadir" en cada categoría por lo que 
                        el plato se añadirá en la categoría en la que pulses el botón.
                    </span>
                    <span>
                        - <b>El boton amarillo con el icono de un lápiz</b> sirve para actualizar el plato elegido. Al pulsar sobre el te aparecerá un formulario 
                        con la información actual de ése plato. Sólo tendras que modificarla y enviarla.
                    </span>
                    <span>
                        - <b>El botón rojo</b> te permite eliminar el plato que elijas.
                    </span>
                </p>
                <p>
                    Todos los platos que crees, actualices o borres se reflajarán en la carta de la web.
                </p>

                <h2>Categorías carta</h2>
                <p>
                    En éste apartado puedes crear, actualizar o eliminar las categorías existentes.<br><br>
                    Cada plato pertenece a una categoría. Aquí podras añadir categorías (por ejemplo si quisieses añadir la 
                    categoría "Cócteles"), podras cambiarle el nombre y el icono a las categorías (por ejemplo si quisieses que la categoría 
                    "postres" pasase a llamarse "postres caseros" y que su icono fuese un helado) y eliminar las categorías que desees (por 
                    ejemplo si quisieses que la categoría "Sandwiches" dejase de existir).
                    Para ello hay 3 botones:
                </p>
                <p>
                    <span>
                        - <b>El botón verde "Añadir"</b> añade una nueva categoría con el nombre e icono que desees.
                    </span>
                    <span>
                        - <b>El botón amarillo con el icono de un lápiz</b> actualiza la categoría que elijas. Podrás cambiarle el nombre y el icono.
                    </span>
                    <span>
                        - <b>El botón rojo</b> elimina la categoría que elijas<br><br><strong><i>¡¡CUIDADO!! Si eliminas una categoría, todos los platos que hay en ella
                        serán eliminados, por lo que a lo mejor es conveniente que pienses si merece más la pena actualizarla.</i></strong>
                    </span>
                </p>
                <p>
                    Todos los cambios que hagas aquí se reflejarán en la carta de la web.
                </p>
            </div>
        </section>
    </div>

    <footer>

    </footer>
</body>
</html>