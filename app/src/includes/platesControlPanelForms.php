<div id='modalWindowAddPlate'>
    <form id='recordFormAddPlate' action='/mesonmontesdetoledo.com/app/src/controllers/addPlateController.php' method='POST'>
        <input type='hidden' value='' id='inputIdPlate' name='inputIdPlate' required>
        <label for="inputNamePlate">Nombre del plato</label>
        <input type='text' value='' id='inputNamePlate' name='inputNamePlate'required>
        <label for="inputPricePlate">Precio del plato</label>
        <input type='text' value='' id='inputPricePlate' name='inputPricePlate'required>
        <input type="hidden" id='inputCategoryPlate' value='' name='inputCategoryPlate'></input>
        <input type='submit' id='inputSubmitId' class='inputSubmit'>
    </form>
</div>

<div id='modalWindowEditPlate'>
    <form id='recordFormEditPlate' action='/mesonmontesdetoledo.com/app/src/controllers/editPlateController.php' method='POST'>
        <input type='hidden' value='' id='inputIdPlate2' name='inputIdPlate' required>
        <label for="inputNamePlate">Nombre del plato</label>
        <input type='text' value='' id='inputNamePlate2' name='inputNamePlate'required>
        <label for="inputPricePlate">Precio del plato</label>
        <input type='text' value='' id='inputPricePlate2' name='inputPricePlate'required>
        <label for="selectCategoryPrice">Categoría del plato</label>
        <select id='selectCategoryPlate' name='selectCategoryPlate'required>
            <?php
            foreach ($plateCategoriesList as $plateCategory){
                echo
                "<option value='".$plateCategory->getName()."'>" . $plateCategory->getName() . "</option>";
            }
            ?>
        </select>
        <input type='submit' id='inputSubmitId' class='inputSubmit'>
    </form>
</div>

<div id='modalWindowDeletePlate'>
    <form id='recordFormDeletePlate' action='/mesonmontesdetoledo.com/app/src/controllers/deletePlateController.php' method='POST'>
        <p id='textDeletePlate'></p>
        <input type='hidden' value='' id='inputIdPlate3' name='inputIdDeletePlate'>
        <input type='submit' id='inputSubmitId' class='inputSubmit' value='Eliminar'>
    </form>
</div>