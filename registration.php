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
<div class="search">
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
                            <a href="registration.php">Zarejestruj się</a>
                        </li>
                    </ul>
                    <div class="clear_div"></div>
                </nav>
            </div>
            <div class="page_name">
                <h1>Panel rejestracji</h1>
            </div>
            <div class="pg_log_reg">
                <div class="pg_log_reg1">
                    <h2>Zarejestruj się</h2>
                    <div id="error_form"></div>
                    <form action="" method="post">
                        <div class="form_log_reg">
                            Imię :
                            <br/>
                            <input type="text" name="name" id="name" class="input_form" placeholder="Wpisz imię" autocomplete="off">
                            <div id="error_name"></div>
                        </div>
                        <div class="form_log_reg">
                            Nazwisko :
                            <br/>
                            <input type="text" name="surname" id="surname" class="input_form" placeholder="Wpisz nazwisko" autocomplete="off">
                        </div>
                        <div class="clear_div"></div>
                        <div class="form_log_reg">
                            Login :
                            <br/>
                            <input type="text" name="login" id="login" class="input_form" placeholder="Wpisz login" autocomplete="off">
                            <div id="error_login"></div>
                        </div>
                        <div class="clear_div"></div>
                        <div class="form_log_reg">
                            Hasło :
                            <br/>
                            <input type="password" name="password" id="password" class="input_form" placeholder="Wpisz hasło" autocomplete="off">
                            <div id="error_password"></div>
                        </div>
                        <div class="form_log_reg">
                            Potwierdź hasło :
                            <br/>
                            <input type="password" name="password2" id="password2" class="input_form" placeholder="Wpisz raz jeszcze hasło" autocomplete="off">
                        </div>
                        <div class="clear_div"></div>
                        <div class="form_log_reg">
                            E-mail :
                            <br/>
                            <input type="email" name="email" id="email" class="input_form" placeholder="Wpisz e-mail" autocomplete="off">
                            <div id="error_email"></div>
                        </div>
                        <div class="form_log_reg">
                            Potwierdź Twój e-mail :
                            <br/>
                            <input type="email" name="email2" id="email2" class="input_form" placeholder="Wpisz raz jeszcze e-mail" autocomplete="off">
                        </div>
                        <div class="clear_div"></div>
                        <br/>
                        <div class="form_log_reg">
                            <input type="submit" id="btn_validation" class="button_log_reg" value="Sprawdź" title="Sprawdź">
                        </div>
                        <div class="form_log_reg">
                            <input type="submit" id="btn_register" class="button_log_reg" value="Zarejestruj" title="Zarejestruj">
                        </div>
                        <div class="clear_div"></div>
                        <script type="text/javascript" src="javascript/validate_registration.js"></script>
                    </form>
                </div>
                <div class="pg_log_reg2">
                    <h2>Masz już konto?</h2>
                    <a href="login.php">
                        <button class="button_log_reg" title="Zaloguj się">
                            Zaloguj się
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