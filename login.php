<?php
require_once("func.php");
if(isset($_COOKIE['user_session'])){
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
    <div class="login">
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
                                <a href="login.php">Zaloguj się</a>
                            </li>
                        </ul>
                        <div class="clear_div"></div>
                    </nav>
                </div>
                <div class="page_name">
                    <h1>Panel logowania</h1>
                </div>
                <div class="pg_log_reg">
                    <div class="pg_log_reg1">
                        <h2>Zaloguj się</h2>
                        <form action="//localhost/pai_projekt/database/db_login.php" method="post">
                            <label class="form_log_reg">
                                Login :
                                <br/>
                                <input type="text" name="login" class="input_form" placeholder="Wpisz login" autocomplete="off">
                            </label>
                            <label class="form_log_reg">
                                Hasło :
                                <br/>
                                <input type="password" name="password" class="input_form" placeholder="Wpisz hasło" autocomplete="off">
                            </label>
                            <div class="clear_div"></div>
                            <input id="checkbox" type="checkbox" name="checkbox">
                            <label for="checkbox" id="checkbox" class="form_log_reg" title="Zapamiętaj mnie"></label>
                            <div class="form_log_reg" id="rem">
                                Zapamiętaj mnie
                            </div>
                            <div class="clear_div"></div>
                            <label>
                                <input type="submit" class="button_log_reg" value="Zaloguj się" title="Zaloguj się">
                            </label>
                            <div class="clear_div"></div>
                            <?
                                if(isset($_SESSION['error_log'])) {
                                    echo "<div class='error'>".$_SESSION['error_log']."</div>";
                                    unset($_SESSION['error_log']);
                                    session_destroy();
                                }
                            ?>
                        </form>
                    </div>
                    <div class="pg_log_reg2">
                        <h2>Nie masz konta?</h2>
                        <a href="registration.php">
                            <button class="button_log_reg" title="Zarejestruj się">
                                Zarejestruj się
                            </button>
                        </a>
                        <div class="clear_div"></div>
                        <h2>Zapomniałeś/aś hasła?</h2>
                        <a href="remind_password.php">
                            <button class="button_log_reg" title="Przypomnij hasło">
                                Przypomnij hasło
                            </button>
                        </a>
                    </div>
                    <div class="clear_div"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
        build_footer();
    ?>
</body>
</html>
