<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$plateCategory = new PlateCategory();
$resulsetPlateCategory = $plateCategory->getAll();
$plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);

foreach ($plateCategoriesList as $plateCategory) {        
    $plate = new Plate();
    $resulsetPlate = $plate->getBy("category", $plateCategory->getId());
    $platesList = $plate->getObject($resulsetPlate);

    echo "<p class='categories'>" . $plateCategory->getName() . "<button class='addPlateButton'>Añadir</button></p>

    <div class='recordsContainer recordsHeader'>
        <div class='records'>
            <p class='recordsId'>ID</p>
            <div class='recordsCenterContainer'>
                <p class='recordsName'>PLATOS</p>
                <p class='recordsPrice'>PRECIO</p>
            </div>
        </div>
    </div>";

    foreach ($platesList as $plate) {
        echo 
        "<div class='recordsContainer'>
            <div class='records'>
                <p class='recordsId'>" . $plate->getId() . "</p>
                <div class='recordsCenterContainer'>
                    <p class='recordsName'>" . $plate->getName() . "</p>
                    <p class='recordsPrice'>" . $plate->getPrice() . "€</p>
                </div>
            </div>
            <div class='recordIconsContainer'>
                <img src='/mesonmontesdetoledo.com/public/images/webIcons/lapiz.png' class='recordsIcons editIcon'>
                <img src='/mesonmontesdetoledo.com/public/images/webIcons/delete.png' class='recordsIcons deleteIcon'>
            </div>
        </div>";
    }
}
?>