window.onload = function() {

    var gallery1 = ["fachada1", "fachada1", "barraCaptura.jpg", "header.jpg", "IMG_1604.JPEG"];
    var gallery2 = ["chuleton.jpg", "chuleton.jpg", "ensalada.jpg", "medallonesCiervo.jpg", "platoCaptura.jpg", "migas.jpg", "coulant.jpg", "tartaQueso.jpg"];
    var gallery3 = ["rutaLasTorres.jpg", "rutaLasTorres.jpg", "rutaLasTorres2.jpg", "ciervo.jpg"];

    changeImage();
    arrowsHover();



    let index1 = 1;
    let index2 = 1;
    let index3 = 1;

    function changeImage() {
        $(".rightArrowGallery").click(function() {
            let galleryId = $(this).parent().attr("id");

            if(galleryId == "gallery1img"){
                if (index1 == gallery1.length - 1) index1 = 0;
                index1++;
                $("#gallery1img").css("background-image", "url('/mesonmontesdetoledo.com/public/images/gallery/" + gallery1[index1] + "')");
                
            }
            else if(galleryId == "gallery2img"){
                if (index2 == gallery2.length - 1) index2 = 0;
                index2++;
                $("#gallery2img").css("background-image", "url('/mesonmontesdetoledo.com/public/images/gallery/" + gallery2[index2] + "')");
            }
            else{
                if (index3 == gallery3.length - 1) index3 = 0;
                index3++;
                $("#gallery3img").css("background-image", "url('/mesonmontesdetoledo.com/public/images/gallery/" + gallery3[index3] + "')");
            }
        });


        $(".leftArrowGallery").click(function() {
            let galleryId = $(this).parent().attr("id");

            if(galleryId == "gallery1img"){
                if (index1 == 1) index1 = gallery1.length;
                index1--;
                $("#gallery1img").css("background-image", "url('/mesonmontesdetoledo.com/public/images/gallery/" + gallery1[index1] + "')");
            }
            else if(galleryId == "gallery2img"){
                if (index2 == 1) index2 = gallery2.length;
                index2--;
                $("#gallery2img").css("background-image", "url('/mesonmontesdetoledo.com/public/images/gallery/" + gallery2[index2] + "')"); 
            }
            else{
                if (index3 == 1) index3 = gallery3.length;
                index3--;
                $("#gallery3img").css("background-image", "url('/mesonmontesdetoledo.com/public/images/gallery/" + gallery3[index3] + "')");
            }
        });
    }


    function arrowsHover() {
        $(".rightArrowGallery").mouseover(function() {
            $(this).attr("src", "/mesonmontesdetoledo.com/public/images/webIcons/rightArrowHover.png");
        }).mouseout(function() {
            $(this).attr("src", "/mesonmontesdetoledo.com/public/images/webIcons/rightArrow.png");
        });
    
    
        $(".leftArrowGallery").mouseover(function() {
            $(this).attr("src", "/mesonmontesdetoledo.com/public/images/webIcons/leftArrowHover.png");
        }).mouseout(function() {
            $(this).attr("src", "/mesonmontesdetoledo.com/public/images/webIcons/leftArrow.png");
        });
    }

}