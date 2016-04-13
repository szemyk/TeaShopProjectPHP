$(document).ready(function(){
    $(".star").hover(
        function() {
            var therate = $(this).attr('id');
            for (var i = therate; i >= 0; i--) {
                $('#'+i).addClass('star_hover');
            };
        }, function() {
            $(".star").removeClass("star_hover");
        }
    );

    $(".star").click(function(){
        $(".star").removeClass("star_active");
        $(".star").removeClass("current");

        var therate = $(this).attr('id');

        for (var i = therate; i >= 0; i--) {
            $('#'+i).addClass('star_active');
        };
        $('#'+therate).addClass('current');
    });

    $(".button_comment").click(function(){
        if($(".star").hasClass("current")){
            var stars = $(".current").attr("id");
            var comment = $("#form_comment").val();
            var name_product = $("h4").text();

            var dt = new Date();
            var year = dt.getFullYear();
            var month = dt.getMonth()+1;
            var day = dt.getDate();
            var hours = dt.getHours();
            var minutes = dt.getMinutes();
            var seconds = dt.getSeconds();
            var datetime = year+"-"+(month<10 ? '0' : ' ')+month+"-"+(day<10 ? '0' : '')+day+" "+(hours<10 ? '0' : '')+hours+":"+(minutes<10 ? '0' : '')+minutes+":"+(seconds<10 ? '0' : '')+seconds;

            $.ajax({
                type: "post",
                url: "//localhost/pai_projekt/database/db_add_comment.php",
                data: {
                    stars: stars,
                    comment: comment,
                    name_product: name_product,
                    datetime: datetime
                },
                success: function(returnecho){
                    if(returnecho == 'success'){
                        $(".comment_form").html(
                            '<div class="good">Komentarz dodany.</div>'
                        );
                    }
                    if(returnecho == 'error'){
                        $(".comment_form").html(
                            '<div class="error">Komentarz nie został dodany, proszę ponowić dodanie. </div>'
                        );
                    }
                }
            });
        }
        else{
            alert("Podaj ocenę!")
        }
    });
});