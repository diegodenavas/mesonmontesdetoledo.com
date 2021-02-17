<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/app/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/controlPanel/public/css/generalControlPanel.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/controlPanel/public/css/login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/mesonmontesdetoledo.com/controlPanel/public/js/registerUser.js"></script>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "controlPanel/src/includes/controlPanelHeader.php"); ?>

    <section>
        <div class='formContainer'>
            <form action="/mesonmontesdetoledo.com/controlPanel/src/controllers/registerController.php" method='POST' id='formRegister'>
                <label for="registerUser">Usuario</label>
                <input type="text" class='registerUser' name='registerUser' required>
                <label for="registerPass" >Contraseña</label>
                <input type="password" id='registerPass' class='registerPass' name='registerPass' required>
                <label for="repeatPass" >Repetir contraseña</label>
                <input type="password" class='repeatPass' id='repeatPass' name='repeatPass' required>
                <input type="button" value='Registrar' id='registerSubmit'>
            </form>
        </div>
    </section>
</body>
</html>