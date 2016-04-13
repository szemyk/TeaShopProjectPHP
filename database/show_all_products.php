<?php
session_start();
require_once("db_require.php");
try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
    $this_click = trim($_POST["this_click"]);
    $offset = $_POST["offset"];

    function echo_it($tmp){
        $uriParts = explode('.',$tmp["picture"]);
        $sub = $uriParts[0];

        echo '
        <a href="//localhost/pai_projekt/subpage/page_products/'.$sub.'.php">
        <div class="page_product" id=" '.$tmp["id_product"].' ">
            <ul>
                <li>
                    <img src="//localhost/pai_projekt/picture/products/'.$tmp["picture"].'">
                </li>
                <li>
                    '.$tmp["product"].'
                </li>
                <li>
                    '.$tmp["species"].'
                </li>
                <li>
                    Cena (100g) :<br/>';
                    if($tmp["calculated"]!=null){
                        echo '<span style="text-decoration: line-through;">'.$tmp["prize"].' zł </span> '.$tmp["calculated"].' zł <i class="icon-alert"></i>';
                    }
                    else{
                        echo $tmp["prize"].' zł';
                    }
                    echo '
                </li>
            </ul>
        </div></a>';
    }

    if($this_click=="Herbata" || $this_click=="Kawa" || $this_click=="Zioła"){
        $result = $con->prepare("SELECT * FROM present_product WHERE type='$this_click' LIMIT 8 OFFSET $offset");
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $count_rows = $result->rowCount();

        $x = $y = 1;
        foreach ($rows as $row) {

            if($count_rows>$y){
                $y++;
                if($x<4){
                    $x++;
                    echo_it($row);
                }
                else{
                    echo_it($row);
                    echo '<div class="clear_div"></div>';
                    $x=1;
                }
            }
            else{
                echo_it($row);
                echo '<div class="clear_div"></div>';
            }
        }
        $result->closeCursor();
    }
    elseif($this_click=="promotion"){
        $result = $con->prepare("SELECT * FROM present_product WHERE calculated IS NOT NULL LIMIT 8 OFFSET $offset");
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $count_rows = $result->rowCount();

        $x = $y = 1;
        foreach ($rows as $row) {
            if($count_rows>$y){
                $y++;
                if($x<4){
                    $x++;
                    echo_it($row);
                }
                else{
                    echo_it($row);
                    echo '<div class="clear_div"></div>';
                    $x=1;
                }
            }
            else{
                echo_it($row);
                echo '<div class="clear_div"></div>';
            }
        }
        $result->closeCursor();
    }
    elseif($this_click=="recommend"){
        $result = $con->prepare("SELECT * FROM present_product WHERE recommend IS NOT NULL LIMIT 8 OFFSET $offset");
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $count_rows = $result->rowCount();

        $x = $y = 1;
        foreach ($rows as $row) {
            if($count_rows>$y){
                $y++;
                if($x<4){
                    $x++;
                    echo_it($row);
                }
                else{
                    echo_it($row);
                    echo '<div class="clear_div"></div>';
                    $x=1;
                }
            }
            else{
                echo_it($row);
                echo '<div class="clear_div"></div>';
            }
        }
        $result->closeCursor();
    }
    else{
        $result = $con->prepare("SELECT * FROM present_product WHERE species='$this_click' LIMIT 8 OFFSET $offset");
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $count_rows = $result->rowCount();

        $x = $y = 1;
        foreach ($rows as $row) {
            if($count_rows>$y){
                $y++;
                if($x<4){
                    $x++;
                    echo_it($row);
                }
                else{
                    echo_it($row);
                    echo '<div class="clear_div"></div>';
                    $x=1;
                }
            }
            else{
                echo_it($row);
                echo '<div class="clear_div"></div>';
            }
        }
        $result->closeCursor();
    }

    $con = null;
}
catch(PDOException $e)
{
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}