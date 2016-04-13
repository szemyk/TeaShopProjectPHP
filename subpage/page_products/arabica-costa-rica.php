<?php
require_once("../../func.php");

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
<div>
    <div class="container">
        <div class="row">
            <div class="panel">
                <nav>
                    <ul>
                        <li class="home">
                            <a href="../../index.php" title="Strona główna">
                                <img src="//localhost/pai_projekt/picture/icon/home.png">
                            </a>
                        </li>
                        <li class="divider">
                            &gt;
                        </li>
                        <li class="panel_name">
                            <a href="../coffee.php">Kawa</a>
                        </li>
                    </ul>
                    <div class="clear_div"></div>
                </nav>
            </div>
            <div class="content_single_product">

            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../javascript/product_page.js"></script>
</div>
<?php
build_footer();
?>
</body>
</html>