<?php
include('php_header.php');

$new_round = $_POST["new_round"];
$new_stage = $_POST["new_stage"];
$new_stage_time = $_POST["new_stage_time"];

if ($new_round <= 0 || $new_stage <= 0 || $new_stage_time < 0) {
    echo "設定失敗，回合、階段、剩餘時間需大於零。";
    $mysqli->close();
    exit();
}

date_default_timezone_set("Asia/Taipei");
$new_stage_time = date('Y-m-d H:i:s', time() + ($new_stage_time * 60));

if ($mysqli->query('UPDATE setting SET round = "' . $new_round . '", stage = "' . $new_stage . '", stage_time = "' . $new_stage_time . '";') === TRUE) {
    echo '設定完成！';
} else {
    echo $mysqli->error;
}

echo $new_stage_time;
include ('php_footer.php');
?>
