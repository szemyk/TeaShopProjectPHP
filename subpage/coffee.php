<?php
require_once('../func.php');
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
?>
<div class="tea">
    <div class="container">
        <div class="row">
            <div class="panel">
                <nav>
                    <ul>
                        <li class="home">
                            <a href="//localhost/pai_projekt/index.php" title="Strona główna">
                                <img src="//localhost/pai_projekt/picture/icon/home.png"></a>
                        </li>
                        <li class="divider">
                            &gt;
                        </li>
                        <li class="panel_name">
                            <a href="./coffee.php">Kawa</a>
                        </li>
                    </ul>
                    <div class="clear_div"></div>
                </nav>
            </div>
            <div class="showed_products"></div>
            <div class="btn_more"><button class="button_log_reg" title="Więcej">Więcej</button></div>
        </div>
    </div>
</div>
<?php
build_footer();
?>
</body>
</html>