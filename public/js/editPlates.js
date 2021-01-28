window.onload = function() {
    
    var namePlate = $(".recordsName");
    var pricePlate = $(".recordsPrice");
    var editIcon = $(".editIcon");
    var recordForm = $(".recordFormClass");
    var recordsIcon = $(".recordsIcons");
    var inputSubmit = $(".inputSubmit");

    for (let i = 0; i < editIcon.length; i++) {
        editIcon[i].addEventListener("click", function() {
            $("#modalWindow").show();
            document.getElementById("inputIdPlate").value = $("#recordId"+i).text();
            document.getElementById("inputNamePlate").value = $("#recordName"+i).text();
            document.getElementById("inputPricePlate").value = $("#recordPrice"+i).text().replace("€", "");
            let category = document.getElementById("recordCategory"+i).value;
            $("#selectCategoryPlate>option[value="+category+"]").attr("selected", "");
            
        }, false);
    }

    document.getElementById("modalWindow").addEventListener("click", function(e) {
        if (e.target.id == "recordForm" || e.target.tagName == "INPUT" || e.target.tagName == "SELECT" || e.target.tagName == "LABEL") return;
        else $("#modalWindow").hide();
    }, false);

    function showFormRecord(i) {
        recordForm[i].style.display = "flex";
    }
}