<?php
session_start();

$account = $_POST["account"];
$password = $_POST["password"];

include_once('common/mysqli.php');

$res = $mysqli->query('SELECT * FROM account WHERE account = "' . $account . '" AND password = "' . $password . '";');

if ($res->num_rows == 1) {
    $row = $res->fetch_assoc();
    $_SESSION["islogin"] = true;
    $_SESSION["login_account"] = $row["account"];
    $_SESSION["authority"] = $row["authority"];
    header('Location: index.php');
} else {
    echo("登入失敗！");
}

$res->close ();
$mysqli->close ();
?>
