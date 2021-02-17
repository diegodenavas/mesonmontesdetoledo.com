window.onload = function() {

    let html = $("html");

    var addButton = $("#addCategoryButton");
    var deleteButton = $(".deleteIcon");
    var updateButton = $(".editIcon");

    var modalWindow = $("#modalWindowCategory");
    var selectIcon = $("#selectIcon");
    var selectIconContainer = $("#selectIconsContainer");


    //ADD CATEGORY

    addButton.click(function() {
        scrollDisabled();
        modalWindow.fadeIn(150);
        $("#recordFormCategory").attr("action", $("#recordFormCategory").attr("action") + "addCategoryController.php");
        $("#inputSubmitCategories").css( "background-color", "rgb(0, 228, 0)");
    });

    selectIcon.click(function() {
        selectIconContainer.toggle();
    });


    $(".iconsForSelect").click(function() {
        $("#imgFormIcon").attr("src", "/mesonmontesdetoledo.com/app/public/images/platesIcons/" + $(this).attr("alt"));
        $("#imgFormIcon").attr("alt", $(this).attr("alt"));
        $("#inputIconCategory").val($(this).attr("alt"));
    });



    //DELETE CATEGORY

    deleteButton.click(function() {
        let id = $(this).parent().siblings(".categoryId").attr("value");
        let importance = $(this).parent().siblings(".categoryImportance").attr("value");
        scrollDisabled();
        modalWindow.fadeIn(150);
        $("#inputIdCategory").val(id);
        $("#importance1").val(importance);
        $("#recordFormCategory").attr("action", $("#recordFormCategory").attr("action") + "deleteCategoryController.php");
        $("#formCenterContainer").hide();
        $("#inputNameCategory").removeAttr("required");
        $("#formCenterContainerDelete").show();
        $("#formCenterContainerDelete>p").html("¿Deseas borrar la categoría con ID: " + id + "?<br><br>Si lo haces perderás todos los platos de ésta categoría");
        $("#inputSubmitCategories").val("Eliminar");
        $("#inputSubmitCategories").css( "background-color", "rgb(255, 77, 77)");
        $("#inputImportanceCategory").hide();
    });


    //UPDATE CATEGORY

    updateButton.click(function() {
        let id = $(this).parent().siblings(".categoryId").attr("value");
        let name = $(this).parent().siblings(".categoryName").attr("value");
        let icon = $(this).parent().siblings(".categoryIcon").attr("value");
        let importance = $(this).parent().siblings(".categoryImportance").attr("value");
        $("#noChangePosition").attr("selected", "");
        $("#noChangePosition").show();
        $("#lastPlace").removeAttr("selected");
        $("#importance1").val(importance);
        $("#recordFormCategory").attr("action", $("#recordFormCategory").attr("action") + "editCategoryController.php");
        $("#inputNameCategory").val(name);
        $("#inputIdCategory").val(id);
        $("#inputIconCategory").val(icon);
        $("#imgFormIcon").attr("src", "/mesonmontesdetoledo.com/app/public/images/platesIcons/" + icon);
        $("#inputSubmitCategories").val("Actualizar");
        scrollDisabled();
        modalWindow.fadeIn(150);
        $("#inputSubmitCategories").css( "background-color", "rgb(255, 208, 0)");
    });



    //This function close the modalWindow and restores it to the initial state
    modalWindow.click(function(e) {
        if(e.target.id == "modalWindowCategory" && e.target.parentNode.id != "recordFormCategory"){
            closeForm();
        }
    });


    $("#closeFormMobileX").click(function(e) {
        closeForm();
    });


    function closeForm() {
        modalWindow.fadeOut(150);
        selectIconContainer.hide();
        $("#noChangePosition").hide();
        $("#noChangePosition").removeAttr("selected");
        $("#lastPlace").attr("selected", "");
        $("#imgFormIcon").attr("src", "");
        $("#imgFormIcon").attr("alt", "");
        $("#inputIdCategory").val("");
        $("#inputIconCategory").val("");
        $("#inputNameCategory").val("");
        $("#recordFormCategory").attr("action", "/mesonmontesdetoledo.com/controlPanel/src/controllers/");
        $("#inputNameCategory").attr("required", "");
        $("#formCenterContainer").show();
        $("#formCenterContainerDelete").hide();
        $("#inputSubmitCategories").val("Añadir");
        $("#inputImportanceCategory").show();
        scrollEnabled();
    }




    //Functions

    function scrollDisabled(){
        html[0].style.overflow = "hidden";
    }

    function scrollEnabled(){
        html[0].style.overflow = "inherit";
    }
}