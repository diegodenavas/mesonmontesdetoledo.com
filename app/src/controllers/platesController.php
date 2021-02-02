<?php
            require_once(ROOT . "app/src/models/PlateCategory.php");
            require_once(ROOT . "app/src/models/Plate.php");

            $plateCategory = new PlateCategory();
            $resulsetPlateCategory = $plateCategory->getAll();
            $plateCategoriesList = $plateCategory->getObject($resulsetPlateCategory);


            foreach ($plateCategoriesList as $plateCategory) 
            {
                $plate = new Plate();
                $resulsetPlate = $plate->getBy("category", $plateCategory->getId());
                $platesList = $plate->getObject($resulsetPlate);

                echo
                "<div class='categoryContainer'>
                    <div class='categoryTitle'>
                        <img src='/mesonmontesdetoledo.com/public/images/platesIcons/" . $plateCategory->getIconRoot() . "' alt='" . $plateCategory->getName() . "' class='menuCategoryIcon'>
                        <div class='categoryCenterContainer'>
                            <h3 id='categoryName'>" . $plateCategory->getName() . "</h3>
                            <img src='/mesonmontesdetoledo.com/public/images/webIcons/despliegue.png' alt='desplegar menu' class='menuCategoryArrowIcon'>
                        </div>
                    </div>

                    <div class='platesContainer'>";

                        foreach ($platesList as $plate) {
                            echo
                            "<div class='plate'>
                                    <p class='plateName'>" . $plate->getName() . "</p>
                                    <p class='platePrice'>" . $plate->getPrice() . "€</p>
                            </div>";
                        }
                          
                echo
                    "</div>
                </div>";
            }