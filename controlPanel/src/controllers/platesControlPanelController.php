<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$plateCategory = new PlateCategory();
$resulsetPlateCategory = $plateCategory->getAll();
$plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);

$count=0;
$countCategory=0;

foreach ($plateCategoriesList as $plateCategory) {        
    $plate = new Plate();
    $resulsetPlate = $plate->getByQuery("SELECT * FROM plate WHERE category=".$plateCategory->getId()." ORDER BY importance ASC");
    $platesList = $plate->getObject($resulsetPlate);

    echo 
    "<table>
        <div class='records categoryTitleContainer'>
            <p class='categories' id='category".$countCategory."'>" . $plateCategory->getName() . "</p>
        </div>

        <tr class='records recordsTh'>
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
            <td class='recordsId' id='recordId".$count."'>" . $plate->getId() . "</td>";

            if($plate->getIsTitle() == '1'){
                echo "<td class='recordsName recordsNameTitle' id='recordName".$count."'>" . $plate->getName() . "</td>";
            }else{
                echo "<td class='recordsName' id='recordName".$count."'>" . $plate->getName() . "</td>";
            }

            echo
            "<td class='recordsPrice' id='recordPrice".$count."'>" . $plate->getPrice() . "€</td>
            <input type='hidden' value='".$plate->getId()."' id='plateId".$count."' class='plateId'>
            <input type='hidden' value='".$plate->getName()."' id='plateName".$count."' class='plateName'>
            <input type='hidden' value='".$plate->getPrice()."' id='platePrice".$count."' class='platePrice'>
            <input type='hidden' value='".$plate->getPlateCategory()->getName()."' id='plateCategory".$count."' class='plateCategory'>
            <input type='hidden' value='".$plate->getImportance()."' id='plateImportance".$count."' class='plateImportance'>
            <input type='hidden' value='".$plate->getIsTitle()."' id='plateIsTitle".$count."' class='plateIsTitle'>
            <td class='recordIconsContainer'>
                <img src='/mesonmontesdetoledo.com/app/public/images/webIcons/lapiz.png' class='recordsIcons editIcon'>
                <img src='/mesonmontesdetoledo.com/app/public/images/webIcons/delete.png' class='recordsIcons deleteIcon'>
            </td>
        </tr>";

        $count++;
    }

    echo
    "</table>";
}

require_once(ROOT . "controlPanel/src/includes/platesControlPanelForms.php");