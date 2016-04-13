<?php
session_start();
require_once("db_require.php");

$id = trim($_POST['id']);
$login = trim($_POST['login']);
$email = trim($_POST['email']);
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

    $check = $con->prepare("select login, email, name, surname from account WHERE id_account=:id");
    $check->bindValue(":id", $id, PDO::PARAM_INT);
    $check->execute();
    $row = $check->fetch(PDO::FETCH_ASSOC);
    $check->closeCursor();

    if($row['login']==$login && $row['email']==$email && $row['name']==$name && $row['surname']==$surname){
        echo '<div class="error">Błąd. Nie można uaktualić takich samych danych. </div>';
    }
    else {
        $result = $con->prepare("CALL update_user(:login, :email, :name, :surname, :id)");
        $result->bindValue(":id", $id, PDO::PARAM_INT);
        $result->bindValue(":login", $login, PDO::PARAM_STR);
        $result->bindValue(":email", $email, PDO::PARAM_STR);
        $result->bindValue(":name", $name, PDO::PARAM_STR);
        $result->bindValue(":surname", $surname, PDO::PARAM_STR);
        $result->execute();

        if ($result) {
            echo '<div class="good">Uaktualnienie zakończyło się sukcesem. </div>';
        } else {
            echo '<div class="error">Błąd uaktualnienia. </div>';
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