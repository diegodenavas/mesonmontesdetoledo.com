<div id='modalWindowPlate' class='modalWindow'>
    <form id='recordFormPlate' class='recordForm' action='/mesonmontesdetoledo.com/app/src/controllers/' method='POST'>
        <div id='formCenterContainerDelete'>
            <p></p>
        </div>

        <div id='formCenterContainer'>
            <label for="inputNamePlate">Nombre del plato</label>
            <input type='text' value='' id='inputNamePlate' name='inputNamePlate'required>
            <label for="inputPricePlate">Precio del plato</label>
            <input type='text' value='' id='inputPricePlate' name='inputPricePlate'required>
            <label for="selectCategoryPrice">Categoría del plato</label>

            <select id='selectCategoryPlate' name='selectCategoryPlate'required>
                <?php
                foreach ($plateCategoriesList as $plateCategory){
                    echo
                    "<option value='".$plateCategory->getName()."' class='optionsCategoryPlate'>" . $plateCategory->getName() . "</option>";
                }
                ?>
            </select>
        </div>

        <input type="hidden" value='' id='inputCategoryPlate' name='inputCategoryPlate'>
        <input type='hidden' value='' id='inputIdPlate' name='inputIdPlate'>

        <div id='inputSubmitContainer'>
            <input type='submit' id='inputSubmitPlates' class='inputSubmit'>
        </div>
    </form>
</div>