    var html = document.getElementsByTagName("html");
    var header = document.getElementsByTagName("header");
    var nav = document.getElementsByTagName("nav");
    var menuMobile = document.getElementById("menuMobileContainer");
    var menuMobileIcon = document.getElementById("menuIcon");
    var menuIconContainer = document.getElementById("menuIconContainer");

    menuMobileIcon.addEventListener("click", toggleMenuMobile, false);
    

    function toggleMenuMobile(){
        if(menuMobile.style.display == "none" || menuMobile.style.display == ""){
            showMenuMobile();
            scrollToNav();
            scrollDisabled();
            changeMenuIcon();
        }else{
            hideMenuMobile();
            scrollEnabled();
            changeMenuIcon();
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

    function changeMenuIcon() {      
        if($("#menuIcon").attr("src") == "/mesonmontesdetoledo.com/app/public/images/webIcons/iconoMenuPlegado.png"){
            $("#menuIcon").attr("src", "/mesonmontesdetoledo.com/app/public/images/webIcons/iconoMenuPlegado2.png");
        }else{
            $("#menuIcon").attr("src", "/mesonmontesdetoledo.com/app/public/images/webIcons/iconoMenuPlegado.png");
        }
        
    }

    
    function hideMenuMobile(){
        $("#menuMobileContainer").fadeOut(200);
    }

    function scrollEnabled(){
        html[0].style.overflow = "inherit";
    }
      