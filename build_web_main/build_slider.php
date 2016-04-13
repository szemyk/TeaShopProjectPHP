<?php
function build_slider(){
    ?>
    <div class="slider">
        <div class="container_slider">
            <div class="button_slider">
                <i class="icon-left-open"></i>
            </div>
            <div class="container">
                <div class="row">
                    <ul class="ul_slider">
                        <li class="active_slider">
                            <img src="picture/slider/img_one.jpg">
                        </li>
                        <li>
                            <img src="picture/slider/img_two.jpg">
                        </li>
                        <li>
                            <img src="picture/slider/img_three.jpg">
                        </li>
                        <li>
                            <img src="picture/slider/img_four.jpg">
                        </li>
                        <li>
                            <img src="picture/slider/img_five.jpg">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="button_slider">
                <i class="icon-right-open"></i>
            </div>
            <div class="clear_div"></div>
        </div>
    </div>
    <script type="text/javascript" src="javascript/slider.js"></script>
<?php
}
?>