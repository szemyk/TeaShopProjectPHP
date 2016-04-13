<?php
session_start();
require_once("db_require.php");

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
    $stars = trim($_POST['stars']);
    $comment = trim($_POST['comment']);
    $name_product = trim($_POST['name_product']);
    $datetime = trim($_POST['datetime']);
    $user = $_COOKIE['user_session'];

    $result = $con->prepare("select * from verification_permission WHERE user_session=:user");
    $result->bindValue(":user", $user, PDO::PARAM_STR);
    $result->execute();
    $usr = $result->fetch(PDO::FETCH_ASSOC);
    $result->closeCursor();
    $user = $usr['id_account'];

    $stm = $con->prepare("select id_product from product WHERE product=:name_product");
    $stm->bindValue(":name_product", $name_product, PDO::PARAM_STR);
    $stm->execute();
    $prd = $stm->fetch(PDO::FETCH_ASSOC);
    $stm->closeCursor();
    $product = $prd['id_product'];

    $insert_stm = $con->prepare("CALL add_comment(:comment,:stars,:datetime,:product,:user)");
    $insert_stm->bindValue(":comment", $comment, PDO::PARAM_STR);
    $insert_stm->bindValue(":stars", $stars, PDO::PARAM_INT);
    $insert_stm->bindValue(":datetime", $datetime, PDO::PARAM_STR);
    $insert_stm->bindValue(":product", $product, PDO::PARAM_INT);
    $insert_stm->bindValue(":user", $user, PDO::PARAM_INT);
    $insert_stm->execute();

    if($insert_stm){
        echo "success";
    }
    else{
        echo "error";
    }
    $insert_stm->closeCursor();

    $con=null;
}
catch(PDOException $e) {
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}
