<?php
require_once("func.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
        build_head();
    ?>
</head>
<body>
<?php
    build_header();
    build_menu();
    build_slider();
?>
    <div class="index_page">
        <div class="container">
            <div class="row">
                <ul class="index_menu">
                    <li id="promotion" class="active_index">
                        <i class="icon-alert"></i> Promocje
                    </li>
                    <li id="recommend">
                        <i class="icon-star-empty"></i> Rekomendowane
                    </li>
                </ul>
                <div class="clear_div"></div>
            </div>
            <div class="showed_products_index"></div>
            <script type="text/javascript" src="javascript/index_menu.js"></script>
            <div class="btn_more_index"><button class="button_log_reg" title="Więcej">Więcej</button></div>
        </div>
    </div>
<?php
    build_footer();
?>
</body>
</html>