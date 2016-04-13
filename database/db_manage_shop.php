<?php
session_start();
require_once("db_require.php");

$click = trim($_POST['click']);

function begin_user(){
    echo '
                    <ul class="data_users">
                    <li>
                        ID
                    </li>
                    <li>
                        login
                    </li>
                    <li>
                        Imię
                    </li>
                    <li>
                        Nazwisko
                    </li>
                    <li>
                        e-mail
                    </li>
                    <li>
                    </li>
                </ul>
                <div class="clear_div"></div>
    ';
}

function result_users($user){
    echo '
                <ul class="data_users">
                    <li>
                        '.$user['id_account'].'
                    </li>
                    <li>
                        '.$user['login'].'
                    </li>
                    <li>
                        '.$user['name'].'
                    </li>
                    <li>
                        '.$user['surname'].'
                    </li>
                    <li>
                        '.$user['email'].'
                    </li>
                    <li class="edit_user" id="'.$user['id_account'].'">
                        Edytuj
                    </li>
                    <li class="delete_user" id="'.$user['id_account'].'">
                        Usuń
                    </li>
                </ul>

                <div class="clear_div"></div>
    ';
}

function begin_product(){
    echo '
                    <ul class="data_users">
                    <li>
                        ID
                    </li>
                    <li>
                        Produkt
                    </li>
                    <li>
                        Rodzaj
                    </li>
                    <li>
                        Cena
                    </li>
                    <li>
                        Promocja
                    </li>
                    <li>
                    </li>
                </ul>
                <div class="clear_div"></div>
    ';
}

function result_product($product){
    echo '
                    <ul class="data_users">
                    <li>
                        '.$product['id_product'].'
                    </li>
                    <li>
                        '.$product['product'].'
                    </li>
                    <li>
                        '.$product['species'].'
                    </li>
                    <li>
                        '.$product['prize'].'
                    </li>
                    <li>';
                    if($product['promotion']==NULL){
                        echo 'Brak';
                    }
                    else{
                        echo $product['promotion'].'%';
                    }
                    echo '</li>
                    <li class="edit_product">
                        Edytuj
                    </li>
                    <li class="delete_product">
                        Usuń
                    </li>
                </ul>
                <div class="clear_div"></div>
    ';
}

if($click == "manage_users"){
    try
    {
        $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

        $result = $con->prepare("SELECT id_account, login, email, name, surname from account");
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $count_rows = $result->rowCount();

        begin_user();
        foreach($rows as $row){
            result_users($row);
        }
        echo '<script type="text/javascript" src="javascript/edit_manage.js"></script>';

        $result->closeCursor();
        $con = null;
    }
    catch(PDOException $e)
    {
        echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
        die();
    }
}

if($click == "manage_products"){
    try
    {
        $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);

        $result = $con->prepare("SELECT id_product, product, species, prize, promotion from product INNER  JOIN  species USING (id_species)");
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $count_rows = $result->rowCount();

        begin_product();
        foreach($rows as $row){
            result_product($row);
        }

        $result->closeCursor();
        $con = null;
    }
    catch(PDOException $e)
    {
        echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
        die();
    }
}