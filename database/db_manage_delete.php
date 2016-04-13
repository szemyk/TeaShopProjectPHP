<?php
session_start();
require_once("db_require.php");

$id = trim($_POST['id']);

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

    $con->exec("DELETE FROM account WHERE id_account=$id");

    echo '<div class="good">Użytkownik został usunięty.</div>';

    $con = null;
}
catch(PDOException $e)
{
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}