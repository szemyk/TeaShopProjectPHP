$(document).ready(function(){
    $(".edit_user").click(function(){
        var id = $(this).attr("id");

        $.ajax({
            type: "post",
            url: "//localhost/pai_projekt/database/db_manage_edit.php",
            data: {
                id: id
            },
            success: function(result){
                $(".manage_data").html(result);
            }
        });
    });

    $(".delete_user").click(function(){
        var id = $(this).attr("id");

        $.ajax({
            type: "post",
            url: "//localhost/pai_projekt/database/db_manage_delete.php",
            data: {
                id: id
            },
            success: function(result){
                $(".data_users #"+id).parent().html(result);
            }
        });
    });
});