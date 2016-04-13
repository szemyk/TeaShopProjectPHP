<?php
require_once("func.php");
if(!isset($_COOKIE['user_session']) || $_SESSION['permission'] == false){
    header("Location: //localhost/pai_projekt/index.php");
    exit();
}
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
<div class="account">
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
                            <a href="manage_shop.php">Zarządzanie sklepem</a>
                        </li>
                    </ul>
                    <div class="clear_div"></div>
                </nav>
            </div>
            <ul class="manage">
                <li id="manage_users" class="active_manage">
                    Użytkownicy
                </li>
                <li id="manage_products">
                    Produkty
                </li>
            </ul>
            <div class="clear_div"></div>
            <div class="manage_data">

            </div>

        </div>
        <script type="text/javascript" src="javascript/manage_shop.js"></script>
    </div>
</div>
<?php
build_footer();
?>
</body>
</html>