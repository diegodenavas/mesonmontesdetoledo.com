<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/mesonmontesdetoledo.com/app/src/config/global.php"); 
require_once(ROOT . "app/src/models/Plate.php");
require_once(ROOT . "app/src/models/PlateCategory.php");

$plateCategory = new PlateCategory();
$resulsetPlateCategory = $plateCategory->getAllOrderByAsc("importance");
$plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);

$count=0;

echo
"<table id='recordsTable' border='1'>
    <tr class='tableHeader'>
        <th>ID</th>
        <th>CATEGORÍA</th>
        <th>ICONO</th>
        <th><button id='addCategoryButton'>Añadir</button></th>
    </tr>";

foreach ($plateCategoriesList as $plateCategory) {        
    $plate = new Plate();
    $resulsetPlate = $plate->getBy("category", $plateCategory->getId());
    $platesList = $plate->getObject($resulsetPlate);

    echo 
    "<tr>
        <td>" . $plateCategory->getId() . "</td>
        <td>" . $plateCategory->getName() . "</td>
        <td><img src='/mesonmontesdetoledo.com/app/public/images/platesIcons/" . $plateCategory->getIconRoot() . "' class='categoriesIcons'></td>
        <td>
            <img src='/mesonmontesdetoledo.com/app/public/images/webIcons/lapiz.png' class='recordsIcons editIcon'>
            <img src='/mesonmontesdetoledo.com/app/public/images/webIcons/delete.png' class='recordsIcons deleteIcon'>
        </td>
        <input type='hidden' value='".$plateCategory->getId()."' id='categoryId".$count."' name='categoryId".$count."' class='categoryId'>
        <input type='hidden' value='".$plateCategory->getName()."' id='categoryName".$count."' name='categoryName".$count."' class='categoryName'>
        <input type='hidden' value='".$plateCategory->getIconRoot()."' id='categoryIconRoot".$count."' name='categoryIconRoot".$count."' class='categoryIcon'>
        <input type='hidden' value='".$plateCategory->getImportance()."' id='categoryImportance".$count."' name='categoryImportance".$count."' class='categoryImportance'>
        <input type='hidden' value='".$plateCategory->getTurn()."' id='categoryTurn".$count."' name='categoryTurn".$count."' class='categoryTurn'>
     </tr>";
    
    $count++;
}

    echo 
    "</table>";

require_once(ROOT . "controlPanel/src/includes/categoriesControlPanelForms.php");
?>