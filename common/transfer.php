<?php
include ('php_header.php');

if (empty($_POST["job"])) {
    echo "轉職失敗，請選擇一個職業。";
    exit();
}

$new_job = $_POST["job"];

$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$enabled = $setting_row['enabled'];
$transfer_price = $setting_row['transfer_raw0' . ($new_job - 1) . '_price'];

if ($enabled == 0) {
    echo "鎖定中，無法操作。";
    $mysqli->close();
    exit();
}

$account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $login_account . '";')->fetch_assoc();
$job = $account_row['job'];
$state = $account_row['state'];
$possession = $account_row['possession'];

if ($state == 0) {
    echo "轉職失敗，死亡無法轉職。";
    exit();
    $mysqli->close();
}

if ($job == $new_job) {
    echo "轉職失敗，與原職業相同。";
    exit();
    $mysqli->close();
}

if ($possession >= $transfer_price) {
    $possession -= $transfer_price;
    $mysqli->query('UPDATE account SET possession = "' . $possession . '", job = "' . $new_job . '" WHERE account = "' . $login_account . '";');
    echo "轉職成功。";
} else {
    echo "轉職失敗，財產不足。";
}

include ('php_footer.php');
?>
