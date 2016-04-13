<?php

if(isset($_COOKIE['user_session']) && !isset($_SESSION['permission'])){
    require_once("/opt/lampp/htdocs/pai_projekt/database/db_require.php");

    try
    {
        $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
        $user_session = $_COOKIE['user_session'];

        $result = $con->prepare("SELECT * FROM verification_permission WHERE user_session=:user_session");
        $result->bindValue(":user_session", $user_session, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $count_row = $result->rowCount();
        $result->closeCursor();

        if($count_row != 0){
            if($row['permission']=="pracownik"){
                $_SESSION['permission'] = true;
            }
            else{
                $_SESSION['permission'] = false;
            }
        }
        $con = null;
    }
    catch(PDOException $e){
        echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
        die();
    }
}

function build_header()
{
    ?>
    <header class="header">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="info">
                        <ul class="contact_info">
                            <li id="icon_phone">Infolinia 865 979 017</li>
                            <li id="icon_30">Gwarancja zwrotów do 30 dni</li>
                            <li id="icon_truck">Darmowa dostawa od 100 zł</li>
                        </ul>
                        <div class="clear_div"></div>
                    </div>
                    <a href="//localhost/pai_projekt/basket.php"><div id="basket">
                        <div id="basket_info">
                            <div id="basket_icon">
                                <i class="icon-basket"></i>
                            </div>
                            <div id="basket_product">
                                Liczba produktów: 0
                                <br/>
                                Suma: 0,00 zł
                            </div>
                            <div class="clear_div"></div>
                        </div>
                        <div id="basket_arrow" title="Przejdź do koszyka">
                            <i class="icon-right-open"></i>
                        </div>
                        <div class="clear_div"></div>
                    </div></a>
                    <div class="clear_div"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="head_logo">
                    <div id="shop_logo" title="Strona główna">
                        <a href="//localhost/pai_projekt/index.php">
                            <img src="//localhost/pai_projekt/picture/icon/logo.png"/>
                        </a>
                    </div>
                    <h1 id="company_logo">
                        Herbaciarnia <br/> Piotruś Pan
                    </h1>
                </div>
                <div id="search_div">
                    <div id="search_user">
                        <ul id="search_ul">
                            <?
                            if(isset($_COOKIE['user_session']) && $_SESSION['permission'] == false)
                            {
                                ?>
                                <li>
                                    <a href="//localhost/pai_projekt/my_account.php">Moje konto</a>
                                    <span id="separate"> | </span>
                                </li>
                                <li>
                                    <a href="//localhost/pai_projekt/logout.php">Wyloguj się</a>
                                </li>
                                <?
                            }
                            elseif(isset($_COOKIE['user_session']) && $_SESSION['permission'] == true)
                            {
                                ?>
                                <li>
                                    <a href="//localhost/pai_projekt/my_account.php">Moje konto</a>
                                    <span id="separate"> | </span>
                                </li>
                                <li>
                                    <a href="//localhost/pai_projekt/manage_shop.php">Zarządzanie</a>
                                    <span id="separate"> | </span>
                                </li>
                                <li>
                                    <a href="//localhost/pai_projekt/logout.php">Wyloguj się</a>
                                </li>
                                <?
                            }
                            else
                            {
                                ?>
                                <li>
                                    <a href="//localhost/pai_projekt/login.php">Zaloguj się</a>
                                    <span id="separate"> | </span>
                                </li>
                                <li>
                                    <a href="//localhost/pai_projekt/registration.php">Zarejestruj się</a>
                                </li>
                                <?
                            }
                            ?>
                        </ul>
                        <div class="clear_div"></div>
                    </div>
                    <div class="clear_div">
                    </div>
                    <div id="search_form">
                        <form id="form" accept-charset="utf-8" method="get" data-sumbit="once" autocomplete="off">
                            <input id="text" type="search" name="search" placeholder="Wpisz wyszukiwaną frazę...">
                            <button id="submit" type="submit" name="submit_search" title="Wyszukaj">
                                <i class="icon-search"></i>
                            </button>
                            <div class="clear_div"></div>
                        </form>
                    </div>
                </div>
                <div class="clear_div"></div>
            </div>
        </div>
    </header>
<?
}
?>