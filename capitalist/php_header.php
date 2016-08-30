<?php
session_start();
$islogin = $_SESSION["islogin"];
$login_account = $_SESSION["login_account"];
$authority = $_SESSION["authority"];
if (!$islogin) exit();

include_once('../common/mysqli.php');
?>
