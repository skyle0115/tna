<?php
	session_start();
	unset($_SESSION['islogin']);
    unset($_SESSION['login_account']);
    unset($_SESSION['authority']);
	session_destroy();
	header ('Location: login.php');
?>
