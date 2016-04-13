$(document).ready(function(){
    var $current = $(".active_slider");

    function next(){
        $(".ul_slider").each(function(){
            $("li").removeClass("active_slider");
        });
        $current = $current.next();
        if (!$current.length) {
            $current = $(".ul_slider li").first();
        }
        $current.addClass("active_slider");
    }

    function prev(){
        $(".ul_slider").each(function(){
            $("li").removeClass("active_slider");
        });
        $current = $current.prev();
        if (!$current.length) {
            $current = $(".ul_slider li").last();
        }
        $current.addClass("active_slider");
    }

    var inter = setInterval(function(){
        next();
    },10000);

    $(".icon-left-open").click(function(){
        prev();
        clearInterval(inter);
        inter = setInterval(function(){
            next();
        },10000);
    });

    $(".icon-right-open").click(function(){
        next();
        clearInterval(inter);
        inter = setInterval(function(){
            next();
        },10000);
    });
});