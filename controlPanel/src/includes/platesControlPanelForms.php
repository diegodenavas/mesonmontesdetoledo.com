<div id='modalWindowPlate' class='modalWindow'>
    <form id='recordFormPlate' class='recordForm' action='/mesonmontesdetoledo.com/controlPanel/src/controllers/' method='POST'>
        <div id='closeFormMobile'>
            <img src="/mesonmontesdetoledo.com/app/public/images/webIcons/close.png" alt="cerrar ventana" id="closeFormMobileX">
        </div>
        <div id='formCenterContainerDelete'>
            <p></p>
        </div>

        <div id='formCenterContainer'>
            <label for="inputNamePlate">Nombre</label>
            <input type='text' value='' id='inputNamePlate' name='inputNamePlate'required>
            <label for="inputPricePlate">Precio</label>
            <input type='text' value='' id='inputPricePlate' name='inputPricePlate' required>
            <label for="selectCategoryPrice">Categoría</label>

            <select id='selectCategoryPlate' name='selectCategoryPlate'required>
                <?php
                foreach ($plateCategoriesList as $plateCategory){
                    echo
                    "<option value='".$plateCategory->getName()."' class='optionsCategoryPlate'>" . $plateCategory->getName() . "</option>";
                }
                ?>
            </select>

            <label for="inputImportanceCategory">Colocar antes de:</label>
            <select id='inputImportanceCategory' name='inputImportanceCategory'>
                <option class='importanceOption' value='-1' id='noChangePosition'>NO MOVER DE SU POSICIÓN</option>
                
                <option class='importanceOption' value='0' id='lastPlace' selected>ÚLTIMA POSICIÓN</option>
            </select>

            <label for="inputIsTitle">¿Es un título?</label>
            <input type="radio" name='inputIsTitle' id='inputIsTitleTrue' value='1'>Si
            <input type="radio" name='inputIsTitle' id='inputIsTitleFalse' value='0' checked>No
        </div>

        <input type="hidden" value='' id='inputCategoryPlate' name='inputCategoryPlate'>
        <input type='hidden' value='' id='inputIdPlate' name='inputIdPlate'>
        <input type='hidden' value='' id='importance1' name='importance1'>
        <input type='hidden' value='' id='importance2' name='importance2'>

        <div id='inputSubmitContainer'>
            <input type='submit' id='inputSubmitPlates' class='inputSubmit'>
        </div>
    </form>
</div>