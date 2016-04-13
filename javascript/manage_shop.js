$(document).ready(function(){
    $.ajax({
        type: "post",
        url: "//localhost/pai_projekt/database/db_manage_shop.php",
        data: {
          click: "manage_users"
        },
        success: function(result){
            $(".manage_data").html(result);
        }
    });

    $(".manage").children("li").click(function(){
        $(".manage").each(function(){
            $("li").removeClass("active_manage");
        });
        $(this).addClass("active_manage");
        $click = $(this).attr('id');

        $.ajax({
            type: "post",
            url: "//localhost/pai_projekt/database/db_manage_shop.php",
            data: {
                click: $click
            },
            success: function(result){
                $(".manage_data").html(result);
            }
        });
    });

});