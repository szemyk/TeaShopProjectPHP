$(document).ready(function(){
    var offset = 0;
    var num = 0;
    $.ajax({
        type: "post",
        url: "//localhost/pai_projekt/database/show_all_products.php",
        data: {
            this_click: "promotion",
            offset: offset
        },
        success: function(echox){
            $(".showed_products_index").html(echox);
            offset = 8;
        }
    });

    $(".btn_more_index button").click(function(){
        var this_click = $(".index_menu").find(".active_index").attr("id");
        $.ajax({
            type: "post",
            url: "//localhost/pai_projekt/database/show_all_products.php",
            data: {
                this_click: this_click,
                offset: offset
            },
            success: function(echox){
                $(".showed_products_index").append(echox);
                num = $(".page_product").size();
                offset += 8;
                if(offset>num){
                    offset = 0;
                    $(".btn_more_index button").hide();
                }
            }
        });
    });

    $(".index_menu").children().click(function(){
        offset = 0;
        $(".index_menu").each(function(){
            $(".index_menu").children().removeClass("active_index");
        });
        $(this).addClass("active_index");
        var this_click = $(this).attr("id");

        $.ajax({
            type: "post",
            url: "//localhost/pai_projekt/database/show_all_products.php",
            data: {
                this_click: this_click,
                offset: offset
            },
            success: function(echox){
                $(".showed_products_index").html(echox);
                offset += 8;
                $(".btn_more_index button").show();
            }
        });
    });
});

