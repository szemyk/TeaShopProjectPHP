<?php
session_start();
require_once("db_require.php");

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
    $email = trim($_POST['email1']);

    $result_email = $con->prepare("SELECT id_account FROM account WHERE email=:email");
    $result_email->bindValue(":email", $email, PDO::PARAM_STR);
    $result_email->execute();

    if($result_email->rowCount()!=0){
        echo "e1";
    }
    else{
        echo "e2";
    }
    $result_email->closeCursor();
    $con = null;
}
catch(PDOException $e)
{
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}