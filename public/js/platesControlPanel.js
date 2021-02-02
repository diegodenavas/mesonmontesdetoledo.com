window.onload = function() {
    
    var html = document.getElementsByTagName("html");

    var addPlateButton = $(".addPlateButton");
    var editIcon = $(".editIcon");
    var deleteIcon = $(".deleteIcon");


    //Edit plates

    for (let i = 0; i < editIcon.length; i++) {
        editIcon[i].addEventListener("click", function() {
            $("#modalWindowEditPlate").show();

            let id = $("#plateId"+i).val();
            $("#inputIdPlate2").val(id);

            let name = $("#plateName"+i).val();
            $("#inputNamePlate2").val(name);

            let price = $("#platePrice"+i).val();
            $("#inputPricePlate2").val(price);

            let category = $("#plateCategory"+i).val();
            $("option[value='"+category+"']").attr("selected", "");

            scrollDisabled();
        }, false);
    }

    document.getElementById("modalWindowEditPlate").addEventListener("click", function(e) {
        if (e.target.id == "recordFormEditPlate" || e.target.tagName == "INPUT" || e.target.tagName == "SELECT" || e.target.tagName == "LABEL") return;
        else $("#modalWindowEditPlate").hide();
        scrollEnabled();
    }, false);



    //Delete plates

    for (let i = 0; i < deleteIcon.length; i++) {
        deleteIcon[i].addEventListener("click", function() {
            $("#modalWindowDeletePlate").show();

            let id = $("#plateId"+i).val();
            $("#inputIdPlate3").val(id);

            $("#textDeletePlate").html("¿Deseas borrar el plato con ID: " + id + "?");

            scrollDisabled();
        }, false);
    }

    document.getElementById("modalWindowDeletePlate").addEventListener("click", function(e) {
        if (e.target.id == "recordFormDeletePlate" || e.target.tagName == "INPUT" || e.target.tagName == "P" || e.target.tagName == "LABEL") return;
        else $("#modalWindowDeletePlate").hide();
        scrollEnabled();
    }, false);



    //Add plates

    for (let i = 0; i < addPlateButton.length; i++) {
        addPlateButton[i].addEventListener("click", function() {
            $("#modalWindowAddPlate").show();

            let id = $("#plateId"+i).val();
            $("#inputIdPlate").val(id);

            let name = $("#plateName"+i).val();
            $("#inputNamePlate").val(name);

            let price = $("#platePrice"+i).val();
            $("#inputPricePlate").val(price);

            let category = $("#category"+i).text();
            $("#inputCategoryPlate").val(category);

            scrollDisabled();
        }, false);
    }

    document.getElementById("modalWindowAddPlate").addEventListener("click", function(e) {
        if (e.target.id == "recordFormAddPlate" || e.target.tagName == "INPUT" || e.target.tagName == "SELECT" || e.target.tagName == "LABEL") return;
        else $("#modalWindowAddPlate").hide();
        scrollEnabled();
    }, false);



    //Functions

    function scrollDisabled(){
        html[0].style.overflow = "hidden";
    }

    function scrollEnabled(){
        html[0].style.overflow = "inherit";
    }
}