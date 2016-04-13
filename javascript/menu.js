$(document).ready(function(){
    var url = window.location;
    var x = 0;
    var a = $(".menu_main li a").filter(function() {
        if(this.href==url){
            x++;
        }
        return this.href==url;
    });
    if(x==1){
        a.parent().addClass("active_menu");
        var pagename= location.pathname.split("/").pop();
        var page = pagename.split(".").shift();
        $(".submenu").children("#"+page).show();
        var this_click = a.parent().text();
        var offset = 0;
        var num = 0;

        $.ajax({
            type: "post",
            url: "//localhost/pai_projekt/database/show_all_products.php",
            data: {
                this_click: this_click,
                offset: offset
            },
            success: function(echoproducts){
                $(".showed_products").html(echoproducts);
                offset = 8;
            }
        });

        $(".btn_more button").click(function(){
            $.ajax({
                type: "post",
                url: "//localhost/pai_projekt/database/show_all_products.php",
                data: {
                    this_click: this_click,
                    offset: offset
                },
                success: function(echoproducts){
                    $(".showed_products").append(echoproducts);
                    num = $(".page_product").size();
                    offset +=8;

                    if(offset>num){
                        offset = 0;
                        $(".btn_more button").hide();
                    }
                }
            });
        });

        $("#"+page).children().click(function(){
            this_click = $(this).text();
            offset = 0;
            $.ajax({
                type: "post",
                url: "//localhost/pai_projekt/database/show_all_products.php",
                data: {
                    this_click: this_click,
                    offset: offset
                },
                success: function(echoproducts){
                    $(".showed_products").html(echoproducts);
                    num = $(".page_product").size();
                    offset = 8;
                    if(offset>num){
                        $(".btn_more button").hide();
                    }
                    else{
                        $(".btn_more button").show();
                    }
                }
            });
        });
    }
    else if(x==0){
        $(".submenu").hide();
    }
});
