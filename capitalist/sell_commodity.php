<!-- Skyle -->
<?php
include ('php_header.php');

$count = intval($_POST["count"]);

if ($count <= 0) {
    echo "出售失敗，組數需大於零。";
    exit();
}

$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$enabled = $setting_row['enabled'];
$commodity_ppg = $setting_row['commodity_ppg'];
$stage = $setting_row['stage'];

if ($enabled == 0) {
    echo "鎖定中，無法操作。";
    $mysqli->close();
    exit();
}

$account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $login_account . '";')->fetch_assoc();
$state = $account_row['state'];
$possession = $account_row['possession'];
$group_rest = $account_row['group_rest'];
$raw01 = $account_row['raw01'];
$raw02 = $account_row['raw02'];
$raw03 = $account_row['raw03'];

if ($state == 0) {
    echo "出售失敗，死亡無法出售。";
    $mysqli->close();
    exit();
}

$deal_count = min($count, $group_rest, $raw01, $raw02, $raw03);
if ($deal_count > 0) {
    $group_rest -= $deal_count;
    $raw01 -= $deal_count;
    $raw02 -= $deal_count;
    $raw03 -= $deal_count;
    $possession += $deal_count * $commodity_ppg;

    $mysqli->query('UPDATE account SET possession = "' . $possession . '", group_rest = "' . $group_rest . '", raw01 = "' . $raw01 . '", raw02 = "' . $raw02 . '", raw03 = "' . $raw03 . '" WHERE account = "' . $login_account . '";');
    echo '出售成功，剩下' . $group_rest . '組可以出售。';
} else {
    echo "出售失敗。";
}

include ('php_footer.php');
?>
