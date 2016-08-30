<?php
include('php_header.php');

$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$raw01_price = $setting_row['raw01_price'];
$raw02_price = $setting_row['raw02_price'];
$raw03_price = $setting_row['raw03_price'];

$account_res = $mysqli->query('SELECT * FROM account WHERE job != "1" AND state != "0";');
while ($account_row = $account_res->fetch_assoc()) {
    $pk = $account_row['pk'];
    $possession = $account_row['possession'];
    $raw01 = $account_row['raw01'];
    $raw02 = $account_row['raw02'];
    $raw03 = $account_row['raw03'];

    $possession += $raw01 * $raw01_price + $raw02 * $raw02_price + $raw03 * $raw03_price;
    $raw01 = 0;
    $raw02 = 0;
    $raw03 = 0;

    $mysqli->query('UPDATE account SET possession = "' . $possession . '", raw01 = "' . $raw01 . '", raw02 = "' . $raw02 . '", raw03 = "' . $raw03 . '" WHERE pk = "' . $pk . '";');
}

echo "低價收購完成！";

include ('php_footer.php');
?>
