$(document).ready(function(){
    $("#btn_register").prop('disabled', true).addClass("button_disabled");

    $("#btn_validation").click(function(event){
        event.preventDefault();

        var name = $("#name").val();
        var surname = $("#surname").val();
        var login = $("#login").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var email = $("#email").val();
        var email2 = $("#email2").val();

        function validEmail(emailadress) {
            var pattern = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
            return pattern.test(emailadress);
        };

        if(name.length==0 || surname.length==0 || login.length==0 || password.length==0 || password2.length==0 || email.length==0 || email2.length==0)
        {
            $("#error_form").html("Proszę uzupełnić wszystkie pola w formularzu!").addClass("error");
        }
        else
        {
            $("#error_form").hide();
            $("#error_name").html("Ok!").addClass("good");

            if($("#error_name").hasClass("good") && $("#error_login").hasClass("good") && $("#error_password").hasClass("good") && $("#error_email").hasClass("good")){
                $("#btn_register").prop('disabled', false).removeClass("button_disabled");
            }

            function check_login(){
                if(login.length<5){
                    $("#error_login").html("Podany login jest za krótki (min. 5 znaków)!").removeClass("good").addClass("error");
                }
                else{
                    function if_exist_login(){
                        $.post("//localhost/pai_projekt/database/registration_check_login.php", {
                            login1: login,
                        }, function(datal){
                            answerl(datal);
                        });
                    }
                    if_exist_login();
                    function answerl(datal){
                        if(datal == "l1"){
                            return $("#error_login").html("Podany login istnieje w bazie!").removeClass("good").addClass("error");
                        }
                        else return $("#error_login").html("Ok!").removeClass("error").addClass("good");
                    }
                }
            }

            function check_password(){
                if(password.length<8 || password2.length<8){
                    $("#error_password").html("Podane hasło jest za krótkie (min. 8 znaków)!").removeClass("good").addClass("error");
                }
                else if((password)!=(password2)){
                    $("#error_password").html("Podane hasła muszą być takie same!").removeClass("good").addClass("error");
                }
                else{
                    $("#error_password").html("Ok!").removeClass("error").addClass("good");
                }
            }

            function check_email(){
                if( !validEmail(email) || !validEmail(email2)) {
                    $("#error_email").html("Podane emaile nie przeszły walidacji.").removeClass("good").addClass("error");
                }
                else if((email)!=(email2)){
                    $("#error_email").html("Podane e-maile muszą być takie same!").removeClass("good").addClass("error");
                }
                else{
                    function if_exist_email(){
                        $.post("//localhost/pai_projekt/database/registration_check_email.php", {
                            email1: email,
                        }, function(datae){
                            answere(datae);
                        });
                    }
                    if_exist_email();
                    function answere(datae){
                        if(datae == "e1"){
                            return $("#error_email").html("Podany email istnieje w bazie!").removeClass("good").addClass("error");
                        }
                        else return $("#error_email").html("Ok!").removeClass("error").addClass("good");
                    }
                }
            }

            check_login();
            check_password();
            check_email();
        }
    });


    $("#btn_register").click(function(){
        var name = $("#name").val();
        var surname = $("#surname").val();
        var login = $("#login").val();
        var password = $("#password").val();
        var email = $("#email").val();

        $.post("//localhost/pai_projekt/database/db_registration.php", {
            name: name,
            surname: surname,
            login: login,
            password: password,
            email: email
        }, function(result){
            if(result == "registration success"){
                $("#error_form").show().html("Rejestracja zakończona sukcesem! Możesz się teraz zalogować!").removeClass("error").addClass("good");
                $("form")[0].reset();
            }
            else{
                $("#error_form").show().html("Błąd rejestracji. Proszę ją ponowić!").addClass("error");
            }
        });
    });
});