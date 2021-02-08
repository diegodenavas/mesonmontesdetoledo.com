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

        $("#recordFormPlate").attr("action", $("#recordFormPlate").attr("action") + "editPlateController.php");
        $("#inputIdPlate").val(id);
        $("#inputNamePlate").val(name);
        $("#inputPricePlate").val(price);

        $(".optionsCategoryPlate[value='"+category+"']").attr("selected", "");
        $("#inputSubmitPlates").val("Actualizar");
        $("#inputSubmitPlates").css( "background-color", "rgb(244, 229, 96)");
        scrollDisabled();
        modalWindow.fadeIn(150);
        $("#inputSubmitCategories").css( "background-color", "rgb(255, 208, 0)");
    });




    //This function close the modalWindow and restores it to the initial state
    modalWindow.click(function(e) {
        if(e.target.id == "modalWindowPlate" && e.target.parentNode.id != "recordFormPlate"){
            modalWindow.fadeOut(150);
            $("#inputIdPlate").val("");
            $("#inputNamePlate").val("");
            $("#inputPricePlate").val("");
            $("#selectCategoryPlate").show();
            $("label[for='selectCategoryPrice']").show();
            $("#recordFormPlate").attr("action", "/mesonmontesdetoledo.com/app/src/controllers/");
            $("#inputNamePlate").attr("required", "");
            $("#inputPricePlate").attr("required", "");
            $("#formCenterContainer").show();
            $("#formCenterContainerDelete").hide();
            $("#inputSubmitPlates").val("Añadir");
            scrollEnabled();
        }
    });



    //Functions

    function scrollDisabled(){
        html[0].style.overflow = "hidden";
    }

    function scrollEnabled(){
        html[0].style.overflow = "inherit";
    }
}