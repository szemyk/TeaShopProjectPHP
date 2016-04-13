<?php
session_start();
require_once("db_require.php");

function write_it($tmp){
    echo '
                <h4>'.$tmp["product"].'</h4>
                <ul class="top_element_product">
                    <li>
                        <img src="//localhost/pai_projekt/picture/products/'.$tmp["picture"].'"/>
                    </li>
                    <li>
                       '.$tmp["description"].'
                    </li>
                    <li>
                        <div class="basket_product">
                            <p>Dodaj do koszyka</p>
                            <form action=" " method="post">
                                <div class="div_product_price">
                                    <div class="product_price_quantity"> 50g: </div>
                                    <div class="product_price_price"> ';
                                    if($tmp["promotion"]==null){
                                        echo $tmp["prize2"].' zł';
                                    }
                                    else{
                                        echo $tmp["prize2"].' zł <i class="icon-alert"></i>';
                                    }
                                    echo '</div>
                                    <div class="add_to_basket hv"><i class="icon-basket"></i></div>
                                    <div class="clear_div"></div>
                                </div>
                                <div class="div_product_price">
                                    <div class="product_price_quantity"> 100g: </div>
                                    <div class="product_price_price">
                                    ';
                                        if($tmp["promotion"]==null){
                                            echo $tmp["prize"].' zł';
                                        }
                                        else{
                                            echo $tmp["prize"].' zł <i class="icon-alert"></i>';
                                        }
                                        echo '
                                    </div>
                                    <div class="add_to_basket hv"><i class="icon-basket"></i></div>
                                    <div class="clear_div"></div>
                                </div>
                                <div class="div_product_price">
                                    <div class="product_price_quantity"> Inna: </div>
                                    <div class="product_price_price">
                                        <label>
                                            <input type="text" name="other_quantity" class="input_form" placeholder="200" autocomplete="off"> g
                                        </label>
                                    </div>
                                    <div class="add_to_basket hv"><i class="icon-basket"></i></div>
                                    <div class="clear_div"></div>
                                    <div class="info_quantity">Wartość zaokrąglana do 50g!</div>
                                </div>
                            </form>
                            ';
                            if(!isset($_COOKIE['user_session'])){
                                echo '<div><b>Tylko osoby zalogowane mogą dodawać produkt do koszyka!</b></div>
                                      <script type="text/javascript" src="//localhost/pai_projekt/javascript/disable_basket.js"></script>';

                            }
                            echo'
                        </div>
                    </li>
                </ul>
                <div class="clear_div"></div>';
}

function top_comments(){
    echo '<div class="opinion_box">
                    <h5>komentarze</h5>
                    <div class="inner_opinion_box">
                    <div class="frm_cmt">';
}

function write_comments(){
    echo '</div>';
    if(isset($_COOKIE['user_session'])){
        echo '
                        <div class="comment_form">
                            <form action="" method="post">
                                <label class="form_comment">
                                    <div class="star icon-star-empty" id="1"></div>
                                    <div class="star icon-star-empty" id="2"></div>
                                    <div class="star icon-star-empty" id="3"></div>
                                    <div class="star icon-star-empty" id="4"></div>
                                    <div class="star icon-star-empty" id="5"></div>
                                    <div class="clear_div"></div>
                                </label>
                                <div class="clear_div"></div>
                                <label for="form_comment"> </label>
                                <textarea class="form_comment" id="form_comment" placeholder="Tu wpisz swoją opinię na temat produktu..."></textarea>
                                <div class="clear_div"></div>
                                <div class="button_comment" title="Wyślij">
                                    Wyślij
                                </div>
                                <div class="clear_div"></div>
                            </form>
                            <script type="text/javascript" src="//localhost/pai_projekt/javascript/comment_star.js"></script>
                        </div>

                    </div>
                </div>
    ';
    }
}

function echo_comments($cmt){
       echo '           <div class="opinion">
                            <div class="rate_opinion">';
                            for($i=0; $i<5; $i++){
                                if($i<$cmt["rate"]){
                                    echo '<div class="icon-star-empty star_active"></div>';
                                }
                                else{
                                    echo '<div class="icon-star-empty"></div>';
                                }
                            }
                            echo '</div>
                            <div class="clear_div"></div>
                            <div>
                                <div class="opin_login">'.$cmt["login"].'</div>
                                <div class="opin_time">'.$cmt["time_comment"].'</div>
                                <div class="clear_div"></div>
                            </div>
                            <div class="comment_opinion">
                                '.htmlspecialchars($cmt["comment"]).'
                            </div>
                        </div>
                        ';
}

try
{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
    $path = $_POST['path'];

    $result = $con->prepare("SELECT * FROM info_product WHERE picture=:path");
    $result->bindValue(":path", $path, PDO::PARAM_STR);
    $result->execute();
    $rows = $result->fetch(PDO::FETCH_ASSOC);
    $count_rows = $result->rowCount();
    $result->closeCursor();

    $id_prod = $rows['id_product'];

    if($count_rows!=0){
        write_it($rows);

        $stm= $con->prepare("SELECT * FROM commentary WHERE id_product=:id_prod");
        $stm->bindValue(":id_prod", $id_prod, PDO::PARAM_STR);
        $stm->execute();
        $comment = $stm->fetchAll(PDO::FETCH_ASSOC);
        $count_rows_comment = $stm->rowCount();
        top_comments();

        if($count_rows_comment!=0) {
            foreach ($comment as $cmt) {
                echo_comments($cmt);
            }
        }
        else{
            echo '<div class="opinion">Nikt jeszcze nie dodał opinii na temat tego produktu!</div>';
        }
        $stm->closeCursor();

        write_comments();
    }
    else{
        echo "Nie udało się połączyć bazą, proszę spróbować ponownie";
    }
    $con=null;
}
catch(PDOException $e)
{
    echo 'Połączenie z bazą nie mogło zostać utworzone: ' . $e->getMessage();
    die();
}