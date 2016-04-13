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
?>
<div class="basket">
    <div class="container">
        <div class="row">
            <div class="panel">
                <nav>
                    <ul>
                        <li class="home">
                            <a href="index.php" title="Strona główna"><img src="picture/icon/home.png"></a>
                        </li>
                        <li class="divider">
                            &gt;
                        </li>
                        <li class="panel_name">
                            <a href="basket.php">Koszyk</a>
                        </li>
                    </ul>
                    <div class="clear_div"></div>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
build_footer();
?>
</body>
</html>