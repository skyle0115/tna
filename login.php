<?php
session_start();
if (isset($_SESSION["islogin"])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登入 - TNA</title>
    <meta name="name" content="content">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>
    <!--Import Google Icon Font-->
    <link href="assets/css/icon.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="assets/js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>

    <!-- nav -->
    <div class="navbar-fixed"><nav><div class="nav-wrapper"><div class="container"><a href="#!" class="brand-logo">TNA</a></div></div></nav></div>

    <div class="container">
        <div class="row">
            <form class="col s12 l6 offset-l3" action="login2.php" method="post">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">登入</div>
                        <div class="input-field">
                            <input id="account" type="text" class="validate" name="account">
                            <label for="account">帳號</label>
                        </div>
                        <div class="input-field">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">密碼</label>
                        </div>
                    </div>
                    <div class="card-action right-align">
                        <button class="btn waves-effect waves-light" type="submit" name="action">
                            登入<i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
