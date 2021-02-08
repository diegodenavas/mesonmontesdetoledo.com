<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>

    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/reset.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/generalControlPanel.css">
    <link rel="stylesheet" href="/mesonmontesdetoledo.com/public/css/login.css">

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); ?>
</head>
<body>
    <?php require_once(ROOT . "app/src/includes/controlPanelHeader.php"); ?>

    <section>
        <div class='formContainer'>
            <form action="/mesonmontesdetoledo.com/app/src/controllers/loginController.php" method='POST' id='formLogin'>
                <label for="loginUser">Usuario</label>
                <input type="text" class='loginUser' name='loginUser'>
                <label for="loginPass" >Contraseña</label>
                <input type="text" class='loginPass' name='loginPass'>
                <input type="submit" id='loginSubmit'>
            </form>
        </div>
    </section>
</body>
</html>