<?php
//sesja
session_start();

//główne funkcje budujące strone
require_once("build_web_main/build_head.php");
require_once("build_web_main/build_header.php");
require_once("build_web_main/build_menu.php");
require_once("build_web_main/build_footer.php");

//dodatkowe
require_once("build_web_main/build_slider.php");
