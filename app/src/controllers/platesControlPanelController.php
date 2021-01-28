<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$plateCategory = new PlateCategory();
$resulsetPlateCategory = $plateCategory->getAll();
$plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);

$count=0;

foreach ($plateCategoriesList as $plateCategory) {        
    $plate = new Plate();
    $resulsetPlate = $plate->getBy("category", $plateCategory->getId());
    $platesList = $plate->getObject($resulsetPlate);

    echo "<p class='categories'>" . $plateCategory->getName() . "<button class='addPlateButton'>Añadir</button></p>

    <div class='recordsContainer recordsHeader'>
        <div class='records'>
            <p class='recordsIdTitlte'>ID</p>
            <div class='recordsCenterContainer'>
                <p>PLATOS</p>
                <p>PRECIO</p>
            </div>
        </div>
    </div>";

    foreach ($platesList as $plate) {

        echo 
        "<div class='recordsContainer'>
            <div class='records' >
                <p class='recordsId' id='recordId".$count."'>" . $plate->getId() . "</p>
                <div class='recordsCenterContainer'>
                    <p class='recordsName' id='recordName".$count."'>" . $plate->getName() . "</p>
                    <p class='recordsPrice' id='recordPrice".$count."'>" . $plate->getPrice() . "€</p>
                    <input type='hidden' value='".$plate->getPlateCategory()->getName()."' id='recordCategory".$count."'>
                </div>

            </div>

            <div class='recordIconsContainer'>
                <img src='/mesonmontesdetoledo.com/public/images/webIcons/lapiz.png' class='recordsIcons editIcon'>
                <img src='/mesonmontesdetoledo.com/public/images/webIcons/delete.png' class='recordsIcons deleteIcon'>
            </div>
        </div>";

        $count++;
    }
}
?>

    <div id='modalWindow'>
        <form id='recordForm' action='/mesonmontesdetoledo.com/app/src/controllers/editPlateController.php' method='POST'>
            <input type='hidden' value='' id='inputIdPlate' name='inputIdPlate' required>
            <label for="inputNamePlate">Nombre del plato</label>
            <input type='text' value='' id='inputNamePlate' name='inputNamePlate'required>
            <label for="inputPricePlate">Precio del plato</label>
            <input type='text' value='' id='inputPricePlate' name='inputPricePlate'required>
            <label for="selectCategoryPrice">Categoría del plato</label>
            <select id='selectCategoryPlate' name='selectCategoryPrice'required>
                <?php
                foreach ($plateCategoriesList as $plateCategory){
                    echo
                    "<option value='".$plateCategory->getName()."'>" . $plateCategory->getName() . "</option>";
                }
                ?>
            </select>
            <input type='submit' id='inputSubmitId' class='inputSubmit' form='recordForm'>
        </form>
    </div>
