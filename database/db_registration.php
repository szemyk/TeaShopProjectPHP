<?php
session_start();
require_once("db_require.php");

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $password = sha1($password);

    $con->beginTransaction();
    try
    {
        $con->query("SELECT * from account FOR UPDATE ");
        $result = $con->prepare("INSERT INTO account (login, password, email, name, surname) VALUES (:login,:password,:email,:name,:surname)");
        $result->bindValue(":login", $login, PDO::PARAM_STR);
        $result->bindValue(":password", $password, PDO::PARAM_STR);
        $result->bindValue(":email", $email, PDO::PARAM_STR);
        $result->bindValue(":name", $name, PDO::PARAM_STR);
        $result->bindValue(":surname", $surname, PDO::PARAM_STR);
        $result->execute();

        $con->commit();
        echo "registration success";
    }
    catch(PDOException $e)
    {
        $con->rollBack();
        echo "error registration";
    }

    $con = null;
}
catch(PDOException $e)
{
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}