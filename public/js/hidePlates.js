window.onload = function(){

    $(".categoryTitle").click(function(e) {
        let display = $(this).siblings(".platesContainer").css("display");

        let heightMenu = $("#menuIconContainer").height();

        if(display == "none"){
            $(this).siblings(".platesContainer").slideDown();
            $(this).find(".menuCategoryArrowIcon").attr("src", "/mesonmontesdetoledo.com/public/images/webIcons/despliegue2.png");
            $('html, body').animate({scrollTop: $(this).offset().top - heightMenu});
        }else{
            $(this).siblings(".platesContainer").slideUp();
            $(this).find(".menuCategoryArrowIcon").attr("src", "/mesonmontesdetoledo.com/public/images/webIcons/despliegue.png");
        }
    })

}