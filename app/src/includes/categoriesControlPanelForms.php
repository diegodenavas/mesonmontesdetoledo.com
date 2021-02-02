<div class='modalWindow' id='modalWindowCategory'>
    <form id='recordFormCategory' class='recordForm' action='/mesonmontesdetoledo.com/app/src/controllers/' method='POST'>
        <div id='formCenterContainerDelete'>
            <p></p>
        </div>
        <div id='formCenterContainer'>
            <label for="inputNameCategory">Nombre de la categoría
                <input type='text' value='' id='inputNameCategory' name='inputNameCategory' required>
            </label>
            <p>Icono</p>
            <img src="" alt="" id='imgFormIcon'>
            <span id=selectIcon>Seleccionar icono</span>

            <div id="selectIconsContainer">

            <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php");

            $directory = ROOT . "public/images/platesIcons";
            $dirint = dir($directory);
            while (($archivo = $dirint->read()) !== false)
            {
                if($archivo == "." || $archivo == "..") continue;
                echo "<img src='/mesonmontesdetoledo.com/public/images/platesIcons/" . $archivo . "' alt='" . $archivo . "' class='iconsForSelect'>";
            }
            $dirint->close();
            ?>

            </div>
        </div>

        <input type='hidden' value='' id='inputIdCategory' name='inputIdCategory' required>
        <input type='hidden' value='' id='inputIconCategory' name='inputIconCategory'required>

        <div id='inputSubmitContainer'>
            <input type='submit' id='inputSubmitCategories' class='inputSubmit' value='Añadir'>
        </div>
    </form>
</div>