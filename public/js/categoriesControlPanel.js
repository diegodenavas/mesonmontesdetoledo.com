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
    });

    selectIcon.click(function() {
        selectIconContainer.toggle();
    });


    $(".iconsForSelect").click(function() {
        $("#imgFormIcon").attr("src", "/mesonmontesdetoledo.com/public/images/platesIcons/" + $(this).attr("alt"));
        $("#imgFormIcon").attr("alt", $(this).attr("alt"));
        $("#inputIconCategory").val($(this).attr("alt"));
    });



    //DELETE CATEGORY

    deleteButton.click(function() {
        let id = $(this).parent().siblings(".categoryId").attr("value");
        scrollDisabled();
        modalWindow.fadeIn(150);
        $("#inputIdCategory").val(id);
        $("#recordFormCategory").attr("action", $("#recordFormCategory").attr("action") + "deleteCategoryController.php");
        $("#formCenterContainer").hide();
        $("#inputNameCategory").removeAttr("required");
        $("#formCenterContainerDelete").show();
        $("#formCenterContainerDelete>p").html("¿Deseas borrar la categoría con ID: " + id + "?<br><br>Si lo haces perderás todos los platos de ésta categoría");
        $("#inputSubmitCategories").val("Eliminar");
    });


    //UPDATE CATEGORY

    updateButton.click(function() {
        let id = $(this).parent().siblings(".categoryId").attr("value");
        let name = $(this).parent().siblings(".categoryName").attr("value");
        let icon = $(this).parent().siblings(".categoryIcon").attr("value");
        $("#recordFormCategory").attr("action", $("#recordFormCategory").attr("action") + "editCategoryController.php");
        $("#inputNameCategory").val(name);
        $("#inputIdCategory").val(id);
        $("#inputIconCategory").val(icon);
        $("#imgFormIcon").attr("src", "/mesonmontesdetoledo.com/public/images/platesIcons/" + icon);
        $("#inputSubmitCategories").val("Actualizar");
        scrollDisabled();
        modalWindow.fadeIn(150);
    });



    //This function close the modalWindow and restores it to the initial state
    modalWindow.click(function(e) {
        if(e.target.id == "modalWindowCategory" && e.target.parentNode.id != "recordFormCategory"){
            modalWindow.fadeOut(150);
            selectIconContainer.hide();
            $("#imgFormIcon").attr("src", "");
            $("#imgFormIcon").attr("alt", "");
            $("#inputIdCategory").val("");
            $("#inputIconCategory").val("");
            $("#inputNameCategory").val("");
            $("#recordFormCategory").attr("action", "/mesonmontesdetoledo.com/app/src/controllers/");
            $("#inputNameCategory").attr("required", "");
            $("#formCenterContainer").show();
            $("#formCenterContainerDelete").hide();
            $("#inputSubmitCategories").val("Añadir");
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