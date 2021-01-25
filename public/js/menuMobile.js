    var html = document.getElementsByTagName("html");
    var header = document.getElementsByTagName("header");
    var nav = document.getElementsByTagName("nav");
    var menuMobile = document.getElementById("menuMobileContainer");
    var menuMobileIcon = document.getElementById("menuIcon");
    var menuIconContainer = document.getElementById("menuIconContainer");
    
    menuIconContainer.style.height = window.innerHeight;


    menuMobileIcon.addEventListener("click", toggleMenuMobile, false);


    function toggleMenuMobile(){
        if(menuMobile.style.display == "none" || menuMobile.style.display == ""){
            showMenuMobile();
            scrollToNav();
            scrollDisabled();
        }else{
            hideMenuMobile();
            scrollToInitialPoint();
            scrollEnabled();
        }
    }


    function showMenuMobile(){
        $("#menuMobileContainer").fadeIn(200);
    }

    function scrollToNav() {
        $('html, body').animate({scrollTop: $("#nav").offset().top});
    }

    function scrollDisabled(){
        html[0].style.overflow = "hidden";
    }

    
    function hideMenuMobile(){
        $("#menuMobileContainer").fadeOut(200);
    }

    function scrollToInitialPoint() {
        $('html, body').animate({scrollTop: $("header").offset().top});
    }

    function scrollEnabled(){
        html[0].style.overflow = "inherit";
    }
      