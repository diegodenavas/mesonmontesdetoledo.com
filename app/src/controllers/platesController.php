<?php
            require_once(ROOT . "app/src/models/PlateCategory.php");
            require_once(ROOT . "app/src/models/Plate.php");

            $plateCategory = new PlateCategory();
            $resulsetPlateCategory = $plateCategory->getAllOrderByAsc("importance");
            $plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);


            foreach ($plateCategoriesList as $plateCategory) 
            {
                $plate = new Plate();
                $idCategory = $plateCategory->getId();
                $resulsetPlate = $plate->getByQuery("SELECT * FROM plate WHERE category = $idCategory ORDER BY importance ASC");
                $platesList = $plate->getObject($resulsetPlate);

                echo
                "<div class='categoryContainer'>
                    <div class='categoryTitle'>
                        <img src='/mesonmontesdetoledo.com/app/public/images/platesIcons/" . $plateCategory->getIconRoot() . "' alt='" . $plateCategory->getName() . "' class='menuCategoryIcon'>
                        <div class='categoryCenterContainer'>
                            <h3 id='categoryName'>" . $plateCategory->getName() . "</h3>
                            <img src='/mesonmontesdetoledo.com/app/public/images/webIcons/despliegue.png' alt='desplegar menu' class='menuCategoryArrowIcon'>
                        </div>
                    </div>

                    <div class='platesContainer'>";

                        foreach ($platesList as $plate) {
                            echo
                            "<div class='plate'>";
                                    if($plate->getIsTitle() == '0'){
                                        echo "<p class='plateName'>" . $plate->getName() . "</p>";
                                    }else{
                                        echo "<p class='plateName plateNameTitle'>" . $plate->getName() . "</p>";
                                    }
                                    
                                    if ($plate->getPrice() != 0) {
                                        echo "<p class='platePrice'>" . $plate->getPrice() . "€</p>";
                                    }
                            echo        
                            "</div>";
                        }
                          
                echo
                    "</div>
                </div>";
            }