<?php
include_once('common/mysqli.php');
date_default_timezone_set("Asia/Taipei");
$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$enabled = $setting_row['enabled'];
$round = $setting_row['round'];
$stage = $setting_row['stage'];
$stage_time = $setting_row['stage_time'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>時間 - TNA</title>
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

    <div id="round_stage_time" class="container">
        <h2 id="time"></h2>
        <h2>回合：<?php echo $round; ?></h2>
        <h2>階段：<?php echo $stage; ?></h2>
    </div>
    <script>
        var stage_time = new Date("<?php echo $stage_time; ?>");

        function refresh(){
            if (stage_time > new Date()) {
                var current_time = new Date(stage_time - new Date());
                var m = current_time.getMinutes().toString();
                var s = current_time.getSeconds().toString();
                $('#time').text('剩餘時間：' + "00".substring('0', 2 - m.length) + m + ':' + "00".substring('0', 2 - s.length) + s);
            } else {
                $('#time').text('剩餘時間：00:00');
            }
            setTimeout(refresh, 1000);
        }

        $(function(){
            refresh();
        });
    </script>
</body>
</html>
