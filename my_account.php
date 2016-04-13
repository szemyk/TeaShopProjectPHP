<?php
require_once("func.php");
if(!isset($_COOKIE['user_session'])){
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
                            <a href="my_account.php">Moje konto</a>
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