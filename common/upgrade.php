<!-- Skyle -->
<?php
include ('php_header.php');

$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$enabled = $setting_row['enabled'];
$group_a = $setting_row["group_a"];
$group_b = $setting_row["group_b"];
$group_c = $setting_row["group_c"];
$yield_a = $setting_row["yield_a"];
$yield_b = $setting_row["yield_b"];
$yield_c = $setting_row["yield_c"];
$upgrade_price_a = $setting_row["upgrade_price_a"];
$upgrade_price_b = $setting_row["upgrade_price_b"];
$upgrade_price_c = $setting_row["upgrade_price_c"];

if ($enabled == 0) {
    echo "鎖定中，無法操作。";
    $mysqli->close();
    exit();
}

$account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $login_account . '";')->fetch_assoc();
$pk = $account_row['pk'];
$level = $account_row['level'];
$state = $account_row['state'];
$possession = $account_row['possession'];
$group_max = $account_row['group_max'];
$group_next = $account_row['group_next'];
$yield = $account_row['yield'];
$yield_next = $account_row['yield_next'];
$upgrade_price = $account_row['upgrade_price'];

if ($state == 0) {
    echo "升級失敗，死亡無法升級。";
    $mysqli->close();
    exit();
}

if ($possession >= $upgrade_price) {
    $possession -= $upgrade_price;
    $level += 1;
    $group_max = $group_a * $level * $level + $group_b * $level + $group_c;
    $level += 1; $group_next = $group_a * $level * $level + $group_b * $level + $group_c; $level -= 1;
    $yield = $yield_a * $level * $level + $yield_b * $level + $yield_c;
    $level += 1; $yield_next = $yield_a * $level * $level + $yield_b * $level + $yield_c; $level -= 1;
    $upgrade_price = $upgrade_price_a * $level * $level + $upgrade_price_b * $level + $upgrade_price_c;
    $mysqli->query('UPDATE account SET possession = "' . $possession . '", level = "' . $level . '", group_max = "' . $group_max . '", group_next = "' . $group_next . '", yield = "' . $yield . '", yield_next = "' . $yield_next . '", upgrade_price = "' . $upgrade_price . '" WHERE pk = "' . $pk . '";');
    echo "升級成功。";
} else {
    echo "升級失敗，財產不足。";
}

include ('php_footer.php');
?>
