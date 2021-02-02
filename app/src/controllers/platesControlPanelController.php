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
    </div>

    <table>
        <tr class='records'>
            <th class='recordsIdTitlte'>ID</th>
            <th>PLATOS</th>
            <th>PRECIO</th>
            <th><button class='addPlateButton'>Añadir</button></th>
            <input type='hidden' value='" . $plateCategory->getName()."' id='plateCategory".$count."' class='plateCategory'>
        </tr>";

    $countCategory++;

    foreach ($platesList as $plate) {

        echo 
        "<tr class='records' >
            <td class='recordsId' id='recordId".$count."'>" . $plate->getId() . "</td>
            <td class='recordsName' id='recordName".$count."'>" . $plate->getName() . "</td>
            <td class='recordsPrice' id='recordPrice".$count."'>" . $plate->getPrice() . "€</td>
            <input type='hidden' value='".$plate->getId()."' id='plateId".$count."' class='plateId'>
            <input type='hidden' value='".$plate->getName()."' id='plateName".$count."' class='plateName'>
            <input type='hidden' value='".$plate->getPrice()."' id='platePrice".$count."' class='platePrice'>
            <input type='hidden' value='".$plate->getPlateCategory()->getName()."' id='plateCategory".$count."' class='plateCategory'>
            <td class='recordIconsContainer'>
                <img src='/mesonmontesdetoledo.com/public/images/webIcons/lapiz.png' class='recordsIcons editIcon'>
                <img src='/mesonmontesdetoledo.com/public/images/webIcons/delete.png' class='recordsIcons deleteIcon'>
            </td>
        </tr>";

        $count++;
    }

    echo
    "</table>";
}

require_once(ROOT . "app/src/includes/platesControlPanelForms.php");