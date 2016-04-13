<?php
function build_menu(){
    ?>
    <nav class="menu">
        <div class="container">
            <div class="row">
                <ul class="menu_main">
                    <li>
                        <a href="//localhost/pai_projekt/subpage/tea.php"><i class="icon-leaf"></i> Herbata</a>
                    </li>
                    <li>
                        <a href="//localhost/pai_projekt/subpage/coffee.php"><i class="icon-leaf-1"></i> Kawa</a>
                    </li>
                    <li>
                        <a href="//localhost/pai_projekt/subpage/herbs.php"><i class="icon-icq"></i> Zioła</a>
                    </li>
                </ul>
                <div class="clear_div"></div>
            </div>
            <div class="row">
                <div class="submenu">
                    <ul id="tea">
                        <li>Zielona</li>
                        <li>Czarna</li>
                        <li>Czerwona</li>
                        <li>Biała</li>
                        <li>Yerba Mate</li>
                        <li>Owocowa</li>
                    </ul>
                    <ul id="coffee">
                        <li>Palona</li>
                        <li>Bezkofeinowa</li>
                        <li>Rozpuszczalna</li>
                    </ul>
                    <ul id="herbs">
                        <li>Jednorodne</li>
                        <li>Mieszane</li>
                    </ul>
                    <div class="clear_div"></div>
                </div>
            </div>
        </div>
    </nav>
    <script type="text/javascript" src="//localhost/pai_projekt/javascript/menu.js"></script>
    <?php
}
?>
