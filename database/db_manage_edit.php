<?php
session_start();
require_once("db_require.php");

$id = trim($_POST['id']);

function do_form($rslt){
    echo '
                <div class="form_edit">
                <form action="" method="post">
                    <label class="form_log_reg">
                        Login :
                        <br/>
                        <input type="text" id="login_e" class="input_form" autocomplete="off" value="'.$rslt['login'].'">
                    </label>
                    <label class="form_log_reg">
                        e-mail :
                        <br/>
                        <input type="email" id="email_e" class="input_form" autocomplete="off" value="'.$rslt['email'].'">
                    </label>
                    <div class="clear_div"></div>
                    <label class="form_log_reg">
                        Imię
                        <br/>
                        <input type="text" id="name_e" class="input_form" autocomplete="off" value="'.$rslt['name'].'">
                    </label>
                    <label class="form_log_reg">
                        Nazwisko
                        <br/>
                        <input type="text" id="surname_e" class="input_form" autocomplete="off" value="'.$rslt['surname'].'">
                    </label>
                    <div class="clear_div"></div>
                    <label>
                        <input type="button" class="button_log_reg sbm_save_edit" id="'.$rslt['id_account'].'" value="Zapisz" title="Zapisz">
                    </label>
                    <div class="clear_div"></div>
                </form>
                <div class="inform_edit"></div>
            </div>
            <script type="text/javascript" src="javascript/edit_user.js"></script>
    ';
}

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

    $result = $con->prepare("SELECT id_account, login, email, name, surname from account WHERE id_account=:id");
    $result->bindValue(":id", $id, PDO::PARAM_INT);
    $result->execute();
    $rows = $result->fetch(PDO::FETCH_ASSOC);
    $count_rows = $result->rowCount();

    do_form($rows);

    $result->closeCursor();
    $con = null;
}
catch(PDOException $e)
{
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}