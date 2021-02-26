<div class='modalWindow' id='modalWindowCategory'>
    <form id='recordFormCategory' class='recordForm' action='/mesonmontesdetoledo.com/controlPanel/src/controllers/' method='POST'>
        <div id='closeFormMobile'>
            <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/close.png" alt="cerrar ventana" id="closeFormMobileX">
        </div>
        <div id='formCenterContainerDelete'>
            <p></p>
        </div>
        <div id='formCenterContainer'>
            <label for="inputNameCategory">Nombre de la categoría
                <input type='text' value='' id='inputNameCategory' name='inputNameCategory' required>
            </label>
            <label>Icono</label>
            <img src="" alt="" id='imgFormIcon'>
            <span id=selectIcon>Seleccionar icono</span>

            <div id="selectIconsContainer">

                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php");

                $directory = ROOT . "app/public/images/platesIcons";
                $dirint = dir($directory);
                while (($archivo = $dirint->read()) !== false)
                {
                    if($archivo == "." || $archivo == "..") continue;
                    echo "<img src='/mesonmontesdetoledo.com/app/public/images/platesIcons/" . $archivo . "' alt='" . $archivo . "' class='iconsForSelect'>";
                }
                $dirint->close();
                ?>

            </div>

            <label for="inputImportanceCategory">Colocar antes de:</label>
            <select id='inputImportanceCategory' name='inputImportanceCategory'>
                <option class='importanceOption' value='-1' id='noChangePosition'></option>
                <?php 
                foreach ($plateCategoriesList as $plateCategory) {
                    echo
                    "<option class='importanceOption' value='".$plateCategory->getImportance()."' id='plateCategoryOption".$plateCategory->getId()."'>".$plateCategory->getName()."</option>";
                }
                ?>
                <option class='importanceOption' value='0' id='lastPlace' selected>ÚLTIMA POSICIÓN</option>
            </select>

            <label for="inputIsTitle">¿En que turno desea que aparezca?</label>
            <div class='radioContainer'>
                <input type="radio" name='inputTurn' id='inputIsLunch' class='radioTurn' value='comida'>
                <p class='radioInputP'>Comida</p>
            </div>
            <div class='radioContainer'>
                <input type="radio" name='inputTurn' id='inputIsDinner' class='radioTurn' value='cena'>
                <p class='radioInputP'>Cena</p>
            </div>
            <div class='radioContainer'>
                <input type="radio" name='inputTurn' id='inputIsLunchAndDinner' class='radioTurn' value='comida y cena' checked>
                <p class='radioInputP'>Comida y cena</p>
            </div>
        </div>

        <input type='hidden' value='' id='inputIdCategory' name='inputIdCategory'>
        <input type='hidden' value='' id='inputIconCategory' name='inputIconCategory'>
        <input type='hidden' value='' id='importance1' name='importance1'>
        <input type='hidden' value='' id='importance2' name='importance2'>

        <div id='inputSubmitContainer'>
            <input type='submit' id='inputSubmitCategories' class='inputSubmit' value='Añadir'>
        </div>
    </form>
</div>