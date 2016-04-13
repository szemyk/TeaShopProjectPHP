<?php
require_once("./database/db_require.php");

setcookie("user_session", $user_session, time()-(3600), "/pai_projekt/", "localhost", 1);
session_unset();
session_destroy();
header('Location: index.php');
