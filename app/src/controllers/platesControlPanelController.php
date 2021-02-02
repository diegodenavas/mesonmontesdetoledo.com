<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$plateCategory = new PlateCategory();
$resulsetPlateCategory = $plateCategory->getAll();
$plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);

$count=0;
$countCategory=0;

foreach ($plateCategoriesList as $plateCategory) {        
    $plate = new Plate();
    $resulsetPlate = $plate->getBy("category", $plateCategory->getId());
    $platesList = $plate->getObject($resulsetPlate);

    echo 
    "<div class='categoryTitleContainer'>
        <p class='categories' id='category".$countCategory."'>" . $plateCategory->getName() . "</p>
        <button class='addPlateButton'>Añadir</button>
    </div>

    <div class='recordsContainer recordsHeader'>
        <div class='records'>
            <p class='recordsIdTitlte'>ID</p>
            <div class='recordsCenterContainer'>
                <p>PLATOS</p>
                <p>PRECIO</p>
            </div>
        </div>
    </div>";

    $countCategory++;

    foreach ($platesList as $plate) {

        echo 
        "<div class='recordsContainer'>
            <div class='records' >
                <p class='recordsId' id='recordId".$count."'>" . $plate->getId() . "</p>
                <div class='recordsCenterContainer'>
                    <p class='recordsName' id='recordName".$count."'>" . $plate->getName() . "</p>
                    <p class='recordsPrice' id='recordPrice".$count."'>" . $plate->getPrice() . "€</p>
                    <input type='hidden' value='".$plate->getId()."' id='plateId".$count."'>
                    <input type='hidden' value='".$plate->getName()."' id='plateName".$count."'>
                    <input type='hidden' value='".$plate->getPrice()."' id='platePrice".$count."'>
                    <input type='hidden' value='".$plate->getPlateCategory()->getName()."' id='plateCategory".$count."'>
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

require_once(ROOT . "app/src/includes/platesControlPanelForms.php");