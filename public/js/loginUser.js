window.onload = function() {

    $("#loginSubmit").click(ajaxRegister);


    function ajaxRegister() {
        let dataForm = $("#formLogin").serialize();

        $.ajax({
                url: '/mesonmontesdetoledo.com/app/src/controllers/loginController.php',
                data: dataForm,
                type: "post",
                dataType: "text",
                success: function(response) {
                    if(response == "1"){
                        location.href= "/mesonmontesdetoledo.com/app/src/views/controlPanel/home.php";
                    }else{
                        $("#registerErrorMessage").remove();
                        $("#loginPass").after("<p id='registerErrorMessage'>Usuario o contraseña incorrecto</p>");
                        for (let i = 0; i < 4; i++) {
                            $("#registerErrorMessage").animate({left: "5px"}, 60);
                            $("#registerErrorMessage").animate({left: "-5px"}, 60);
                            $("#registerErrorMessage").animate({left: "0px"}, 60);    
                        }
                    }
                },
                error: function() {
                    $("#registerErrorMessage").remove();
                    $("#loginPass").after("<p id='registerErrorMessage'>No se pudo ingresar al Panel de Control</p>");
                    for (let i = 0; i < 4; i++) {
                        $("#registerErrorMessage").animate({left: "5px"}, 60);
                        $("#registerErrorMessage").animate({left: "-5px"}, 60);
                        $("#registerErrorMessage").animate({left: "0px"}, 60);    
                    }
                }
        });
    }

}