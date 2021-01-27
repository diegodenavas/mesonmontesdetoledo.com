window.onload = function(){

    var platesContainer = document.getElementsByClassName("platesContainer");
    var categoryTitle = document.getElementsByClassName("categoryTitle");


    for (let i = 0; i < categoryTitle.length; i++) {

        categoryTitle[i].addEventListener("click", function(){

            if (platesContainer[i].style.display == "none" || platesContainer[i].style.display == "") platesContainer[i].style.display = "block";
            else platesContainer[i].style.display = "none";

        }, false);
    }

}