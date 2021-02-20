window.onload = function() {
    
    var html = document.getElementsByTagName("html");

    var modalWindow = $("#modalWindowPlate");

    var addPlateButton = $(".addPlateButton");
    var deleteIcon = $(".deleteIcon");
    var updateIcon = $(".editIcon");


    //ADD PLATES

    addPlateButton.click(function() {
        scrollDisabled();
        modalWindow.fadeIn(150);
        $("#recordFormPlate").attr("action", $("#recordFormPlate").attr("action") + "addPlateController.php");
        $("#inputSubmitPlates").css( "background-color", "rgb(0, 228, 0)");
        let category = $(this).parent().siblings(".plateCategory").val();
        $("#selectCategoryPlate").hide();
        $("label[for='selectCategoryPrice']").hide();
        $("#inputCategoryPlate").val(category);

        $(".importanceOptionForCategory").remove();

        let url = '/mesonmontesdetoledo.com/controlPanel/src/controllers/selectPlatesOfCategoriesController.php';

        let data = {"category" : category};

        getPlatesOfCategory(url, data, "add");

        $("#noChangePosition").hide();
        $("#lastPlace").attr("selected", "");
    });



    //DELETE PLATES
    deleteIcon.click(function() {
        scrollDisabled();
        modalWindow.fadeIn(150);
        $("#recordFormPlate").attr("action", $("#recordFormPlate").attr("action") + "deletePlateController.php");
        $("#inputSubmitPlates").val("Eliminar");
        $("#inputSubmitPlates").css( "background-color", "rgb(255, 77, 77)");
        $("#inputSubmitCategories").val("Eliminar");
        $("#inputNamePlate").removeAttr("required");
        $("#inputPricePlate").removeAttr("required");
        
        let importance = $(this).parent().siblings(".plateImportance").val();
        $("#importance1").val(importance);

        let id = $(this).parent().siblings(".plateId").val();
        $("#inputIdPlate").val(id);

        $("#formCenterContainer").hide();
        $("#formCenterContainerDelete>p").html("¿Deseas borrar EL PLATO con ID: " + id + "?");
        $("#formCenterContainerDelete").show();

        $("#inputCategoryPlate").val(id);
    });



    //UPDATE PLATES
    updateIcon.click(function() {
        let id = $(this).parent().siblings(".plateId").val();
        let name = $(this).parent().siblings(".plateName").val();
        let price = $(this).parent().siblings(".platePrice").val();
        let category = $(this).parent().siblings(".plateCategory").val();
        let importance1 = $(this).parent().siblings(".plateImportance").val();
        let isTitle = $(this).parent().siblings(".plateIsTitle").val();

        $("#recordFormPlate").attr("action", $("#recordFormPlate").attr("action") + "editPlateController.php");
        $("#inputIdPlate").val(id);
        $("#inputNamePlate").val(name);
        $("#inputPricePlate").val(price);
        $("#importance1").val(importance1);

        $(".optionsCategoryPlate[value='"+category+"']").attr("selected", "");
        $("#inputSubmitPlates").val("Actualizar");
        $("#inputSubmitPlates").css( "background-color", "rgb(244, 229, 96)");

        $("#lastPlace").removeAttr("selected");
        $("#noChangePosition").attr("selected", "");

        if(isTitle == '1'){
            $("#inputIsTitleFalse").removeAttr("checked");
            $("#inputIsTitleTrue").attr("checked", "");
        }

        $("#noChangePosition").show();

        $(".importanceOptionForCategory").remove();

        let url = '/mesonmontesdetoledo.com/controlPanel/src/controllers/selectPlatesOfCategoriesController.php';

        let plateCategory = $("#selectCategoryPlate").val();
        let data = {"category" : plateCategory};

        getPlatesOfCategory(url, data, "edit");

        scrollDisabled();
        modalWindow.fadeIn(150);
        $("#inputSubmitCategories").css( "background-color", "rgb(255, 208, 0)");
    });
    

    //SHOW PLATES FOR CATEGORIES IN SELECT
    $("#selectCategoryPlate").change(function() {
        $(".importanceOptionForCategory").remove();

        let url = '/mesonmontesdetoledo.com/controlPanel/src/controllers/selectPlatesOfCategoriesController.php';

        let category = $("#selectCategoryPlate").val();
        let data = {"category" : category};

        getPlatesOfCategory(url, data, "edit");
    });



    //This function close the modalWindow and restores it to the initial state
    modalWindow.click(function(e) {
        if(e.target.id == "modalWindowPlate" && e.target.parentNode.id != "recordFormPlate"){
            closeForm();
        }
    });

    $("#closeFormMobileX").click(function(e) {
        closeForm();
    });


    function closeForm() {
        modalWindow.fadeOut(150);
        $("#inputIdPlate").val("");
        $("#inputNamePlate").val("");
        $("#inputPricePlate").val("");
        $("#selectCategoryPlate").show();
        $("label[for='selectCategoryPrice']").show();
        $("#recordFormPlate").attr("action", "/mesonmontesdetoledo.com/controlPanel/src/controllers/");
        $("#inputNamePlate").attr("required", "");
        $("#inputPricePlate").attr("required", "");
        $("#formCenterContainer").show();
        $("#formCenterContainerDelete").hide();
        $("#inputSubmitPlates").val("Añadir");
        $("#inputIsTitleTrue").removeAttr("checked");
        $("#inputIsTitleFalse").attr("checked");
        $("#lastPlace").attr("selected", "");
        $("#noChangePosition").removeAttr("selected");
        $("#noChangePosition").hide();
        scrollEnabled();
    }




    //Functions

    function scrollDisabled(){
        html[0].style.overflow = "hidden";
    }

    function scrollEnabled(){
        html[0].style.overflow = "inherit";
    }

    function getPlatesOfCategory(urlString, category, addOrEdit) {
        $.ajax({
            url: urlString,
            data: category,
            type: "post",
            dataType: "json",
            success: function(response) {
                if(addOrEdit == "edit"){
                    if(response == ""){
                        $("#noChangePosition").hide();
                        $("#noChangePosition").removeAttr("selected");
                        $("#lastPlace").attr("selected", "");
                    }else{
                        $("#noChangePosition").show();
                        $("#lastPlace").removeAttr("selected");
                        $("#noChangePosition").attr("selected", "");
                    }
                }else{
                    $("#noChangePosition").removeAttr("selected");
                    $("#noChangePosition").hide();
                    $("#lastPlace").attr("selected", "");
                }

                for(let i = 0; i < response[0].length; i++){
                    $("#lastPlace").before("<option class='importanceOption importanceOptionForCategory' value='"+response[0][i]+"'>"+response[1][i]+"</option>");
                }
            },
            error: function() {
                $("#registerErrorMessage").remove();
                $("#loginPass").after("<p id='registerErrorMessage'>No se pudo ingresar al Panel de Control</p>");
                for (let i = 0; i < 4; i++) {
                    $("#registerErrorMessage").animate({left: "5px"}, 60);
                    $("#registerErrorMessage").animate({left: "-5px"}, 60);
                    $("#registerErrorMessage").animate({left: "0px"}, 60);    
                }
            }
        });
    }
}