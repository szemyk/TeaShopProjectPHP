$(document).ready(function(){
    $(".sbm_save_edit").click(function(){
        $login = $("#login_e").val();
        $email = $("#email_e").val();
        $name = $("#name_e").val();
        $surname = $("#surname_e").val();
        $id = $(".sbm_save_edit").attr("id");

        $.ajax({
            type: "post",
            url: "//localhost/pai_projekt/database/db_update_user.php",
            data: {
                id: $id,
                login: $login,
                email: $email,
                name: $name,
                surname: $surname
            },
            success: function(result){
                $(".inform_edit").html(result);
            }
        });
    });
});