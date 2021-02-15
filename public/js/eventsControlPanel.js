window.onload = function() {

    var html = $("html");

    var addButton = $("#eventButton");
    var deleteButton = $("#deleteEventButton");
    var modalWindow = $(".modalWindow");



    //ADD EVENT

    addButton.click(function() {
        $("#modalWindowEvent").fadeIn(150);
        $("#recordFormEvent").attr("action", "/mesonmontesdetoledo.com/app/src/controllers/updateEventController.php");
        let id = $(this).parent().siblings(".inputId").val();
        $("#inputIdEvent").val(id);
        scrollDisabled();
    })



    //DELETE EVENT

    deleteButton.click(function() {
        $("#modalWindowEvent").fadeIn(150);
        $("#recordFormEvent").attr("action", "/mesonmontesdetoledo.com/app/src/controllers/deleteEventController.php");
        let id = $(this).parent().siblings(".inputId").val();
        $("#formCenterContainer").hide();
        $("#formCenterContainerDelete").show();
        $("#formCenterContainerDelete>p").html("¿Deseas borrar el evento?");
        $("#inputSubmitEvents").val("Eliminar");
        $("#inputSubmitEvents").css( "background-color", "rgb(255, 77, 77)");
        $("#inputIdEvent").val(id);
        $("#inputNameEvent").removeAttr("required");
        scrollDisabled();
    })



    //This function close the modalWindow and restores it to the initial state
    modalWindow.click(function(e) {
        if(e.target.id == "modalWindowEvent" && e.target.parentNode.id != "recordFormEvent"){
            closeForm();
        }
    });


    $("#closeFormMobileX").click(function(e) {
            closeForm();
    });


    function closeForm() {
        modalWindow.fadeOut(150);
        $("#inputIdEvent").val("");
        $("#inputNameEvent").val("");
        $("#inputSubmitEvents").val("Añadir");
        $("#inputSubmitEvents").css( "background-color", "rgb(0, 228, 0)");
        $("#recordFormEvent").attr("action", "/mesonmontesdetoledo.com/app/src/controllers/");
        $("#formCenterContainerDelete").hide();
        $("#formCenterContainer").show();
        $("#inputNameEvent").attr("required", "");
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