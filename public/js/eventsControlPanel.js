window.onload = function() {

    var html = $("html");

    var addButton = $("#eventButton");
    var modalWindow = $(".modalWindow");


    addButton.click(function() {
        $("#modalWindowEvent").fadeIn(150);
        let id = $(this).siblings(".inputId").val();
        $("#inputIdEvent").val(id);
        scrollDisabled();
    })



    //This function close the modalWindow and restores it to the initial state
    modalWindow.click(function(e) {
        if(e.target.id == "modalWindowEvent" && e.target.parentNode.id != "recordFormEvent"){
            modalWindow.fadeOut(150);
            $("#inputIdEvent").val("");
            $("#inputNameEvent").val("");
            $("#inputSubmitEvents").val("Añadir");
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