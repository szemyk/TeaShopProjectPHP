<?php
session_start();
require_once("db_require.php");

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $password = sha1($password);
    $checkbox = $_POST['checkbox'];

    $result = $con->prepare("SELECT * FROM verification_login WHERE login=:login AND password=:password");
    $result->bindValue(":login", $login, PDO::PARAM_STR);
    $result->bindValue(":password", $password, PDO::PARAM_STR);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $count_row = $result->rowCount();
    $result->closeCursor();

    if($count_row != 0){
        unset($_SESSION['error_log']);
        if($row['permission']=="pracownik"){
            $_SESSION['permission'] = true;
        }
        else{
            $_SESSION['permission'] = false;
        }
        $id_user = $row['id_account'];
        $user_session = sha1(rand(-100,100));

        $result = $con->prepare("SELECT * FROM verification_permission WHERE id_account=:id_user");
        $result->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $cnt = $result->rowCount();
        $result->closeCursor();

        if($cnt != 0){
            $result = $con->prepare("CALL update_session(:user_session, :id_user)");
            $result->bindValue(":user_session", $user_session, PDO::PARAM_STR);
            $result->bindValue(":id_user", $id_user, PDO::PARAM_INT);
            $result->execute();
            $result->closeCursor();
        }
        else{
            $result = $con->prepare("CALL create_session(:user_session, :id_user)");
            $result->bindValue(":user_session", $user_session, PDO::PARAM_STR);
            $result->bindValue(":id_user", $id_user, PDO::PARAM_INT);
            $result->execute();
            $result->closeCursor();
        }

        if($checkbox == "on"){
            setcookie("user_session", $user_session, time()+(3600 * 24), "/pai_projekt/", "localhost", 1);
        }
        else{
            setcookie("user_session", $user_session, time()+(3600), "/pai_projekt/", "localhost", 1);
        }

        header("Location: //localhost/pai_projekt/my_account.php");
    }
    else{
        $_SESSION['error_log'] = "Nie udało się zalogować, proszę spróbować ponownie.";
        header("Location: //localhost/pai_projekt/login.php");
    }

    $con = null;
}
catch(PDOException $e)
{
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}
