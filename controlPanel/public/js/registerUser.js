window.onload = function() {

    $("#repeatPass").blur(passControl);

    $("#registerSubmit").click(ajaxRegister);


    function passControl() {
        let passValue = $("#registerPass").val();
        let repeatPassValue = $("#repeatPass").val();

        if(passValue != repeatPassValue){
            $("#registerErrorMessage").remove();
            $("#registerSubmit").attr("disabled", "");
            $("#repeatPass").after("<p id='registerErrorMessage'>Las contraseñas deben coincidir</p>");

            for (let i = 0; i < 4; i++) {
                $("#registerErrorMessage").animate({left: "5px"}, 60);
                $("#registerErrorMessage").animate({left: "-5px"}, 60);
                $("#registerErrorMessage").animate({left: "0px"}, 60);    
            }
        }else{
            $("#registerErrorMessage").remove();
            $("#registerSubmit").removeAttr("disabled");
        }
    }


    function ajaxRegister() {
        let dataForm = $("#formRegister").serialize();

        $.ajax({
                url: '/mesonmontesdetoledo.com/controlPanel/src/controllers/registerController.php',
                data: dataForm,
                type: "post",
                dataType: "text",
                success: function(response) {
                    if(response == "1"){
                        location.href= "/mesonmontesdetoledo.com/controlPanel/src/views/login.php";
                    }else if(response == "Passwords do not match"){
                        $("#registerErrorMessage").remove();
                        $("#repeatPass").after("<p id='registerErrorMessage'>Las contraseñas deben coincidir</p>");
                        for (let i = 0; i < 4; i++) {
                            $("#registerErrorMessage").animate({left: "5px"}, 60);
                            $("#registerErrorMessage").animate({left: "-5px"}, 60);
                            $("#registerErrorMessage").animate({left: "0px"}, 60);    
                        }
                    }
                    else{
                        $("#registerErrorMessage").remove();
                        $("#registerDuplicateUserError").remove();
                        $("#repeatPass").after("<p id='registerDuplicateUserError'>Ya hay un usuario con este nombre</p>");
                        for (let i = 0; i < 4; i++) {
                            $("#registerDuplicateUserError").animate({left: "5px"}, 60);
                            $("#registerDuplicateUserError").animate({left: "-5px"}, 60);
                            $("#registerDuplicateUserError").animate({left: "0px"}, 60);    
                        }
                    }
                },
                error: function() {
                    $("#registerErrorMessage").remove();
                    $("#registerDuplicateUserError").remove();
                    $("#repeatPass").after("<p id='registerErrorMessage'>No se pudo registrar el usuario</p>");
                    for (let i = 0; i < 4; i++) {
                        $("#registerErrorMessage").animate({left: "5px"}, 60);
                        $("#registerErrorMessage").animate({left: "-5px"}, 60);
                        $("#registerErrorMessage").animate({left: "0px"}, 60);    
                    }
                }
        });
    }

}