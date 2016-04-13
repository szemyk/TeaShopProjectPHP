$(document).ready(function(){
    var path_page= location.pathname.split("/").pop();
    var path = path_page.split(".").shift();
    path = path+".jpg";

    $.ajax({
        type: "post",
        url: "//localhost/pai_projekt/database/db_for_page_product.php",
        data: {
            path: path
        },
        success: function(product_answer){
            $(".content_single_product").html(product_answer);
        }
    });

});
