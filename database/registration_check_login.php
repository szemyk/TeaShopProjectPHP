<?php
session_start();
require_once("db_require.php");

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
    $login = trim($_POST['login1']);

    $result_login = $con->prepare("SELECT id_account FROM account WHERE login=:login");
    $result_login->bindValue(":login", $login, PDO::PARAM_STR);
    $result_login->execute();

    if($result_login->rowCount()!=0){
        echo "l1";
    }
    else{
        echo "l2";
    }
    $result_login->closeCursor();
    $con = null;
}
catch(PDOException $e)
{
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}