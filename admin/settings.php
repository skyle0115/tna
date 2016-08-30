<?php
include('php_header.php');

$commodity_ppg = intval($_POST["commodity_ppg"]);
$raw01_price = intval($_POST["raw01_price"]);
$raw02_price = intval($_POST["raw02_price"]);
$raw03_price = intval($_POST["raw03_price"]);
$group_a = intval($_POST["group_a"]);
$group_b = intval($_POST["group_b"]);
$group_c = intval($_POST["group_c"]);
$yield_a = intval($_POST["yield_a"]);
$yield_b = intval($_POST["yield_b"]);
$yield_c = intval($_POST["yield_c"]);
$upgrade_price_a = intval($_POST["upgrade_price_a"]);
$upgrade_price_b = intval($_POST["upgrade_price_b"]);
$upgrade_price_c = intval($_POST["upgrade_price_c"]);
$transfer_price_a = intval($_POST["transfer_price_a"]);
$transfer_price_b = intval($_POST["transfer_price_b"]);
$transfer_price_c = intval($_POST["transfer_price_c"]);
$tax_price_a = intval($_POST["tax_price_a"]);
$tax_price_b = intval($_POST["tax_price_b"]);
$tax_price_c = intval($_POST["tax_price_c"]);
$tax_price_d = intval($_POST["tax_price_d"]);
$tax_worker = intval($_POST["tax_worker"]);

if ($commodity_ppg < 0) {
    echo "設定失敗，整組零件價錢需大於等於零。";
    exit();
}

if ($raw01_price < 0 || $raw02_price < 0 || $raw03_price < 0) {
    echo "設定失敗，零件價錢需大於等於零。";
    exit();
}

if ($tax_price_a < 0 || $tax_price_b < 0 || $tax_price_c < 0 || $tax_price_d < 0) {
    echo "設定失敗，稅需大於等於零。";
    exit();
}

$deal_final_row = $mysqli->query('SELECT * FROM deal_final WHERE round = "" AND type = "2";')->fetch_assoc();
$raw01_final_price = 0;
$raw02_final_price = 0;
$raw03_final_price = 0;
if (!empty($deal_final_row)) {
    $raw01_final_price = $deal_final_row['raw01_price'];
    $raw02_final_price = $deal_final_row['raw02_price'];
    $raw03_final_price = $deal_final_row['raw03_price'];
}
$transfer_raw01_price = $transfer_price_a * $raw01_final_price * $raw01_final_price + $transfer_price_b * $raw01_final_price + $transfer_price_c;
$transfer_raw02_price = $transfer_price_a * $raw02_final_price * $raw02_final_price + $transfer_price_b * $raw02_final_price + $transfer_price_c;
$transfer_raw03_price = $transfer_price_a * $raw03_final_price * $raw03_final_price + $transfer_price_b * $raw03_final_price + $transfer_price_c;
$mysqli->query('UPDATE setting SET commodity_ppg = "' . $commodity_ppg . '", raw01_price = "' . $raw01_price . '", raw02_price = "' . $raw02_price . '", raw03_price = "' . $raw03_price . '", group_a = "' . $group_a . '", group_b = "' . $group_b . '", group_c = "' . $group_c . '", yield_a = "' . $yield_a . '", yield_b = "' . $yield_b . '", yield_c = "' . $yield_c . '", upgrade_price_a = "' . $upgrade_price_a . '", upgrade_price_b = "' . $upgrade_price_b . '", upgrade_price_c = "' . $upgrade_price_c . '", transfer_price_a = "' . $transfer_price_a . '", transfer_price_b = "' . $transfer_price_b . '", transfer_price_c = "' . $transfer_price_c . '", transfer_raw01_price = "' . $transfer_raw01_price . '", transfer_raw02_price = "' . $transfer_raw02_price . '", transfer_raw03_price = "' . $transfer_raw03_price . '", tax_price_a = "' . $tax_price_a . '", tax_price_b = "' . $tax_price_b . '", tax_price_c = "' . $tax_price_c . '", tax_price_d = "' . $tax_price_d . '", tax_worker = "' . $tax_worker . '";');

$account_res = $mysqli->query('SELECT * FROM account;');
while ($account_row = $account_res->fetch_assoc()) {
    $pk = $account_row['pk'];
    $level = $account_row['level'];
    $group_max = $group_a * $level * $level + $group_b * $level + $group_c;
    $level += 1; $group_next = $group_a * $level * $level + $group_b * $level + $group_c; $level -= 1;
    $yield = $yield_a * $level * $level + $yield_b * $level + $yield_c;
    $level += 1; $yield_next = $yield_a * $level * $level + $yield_b * $level + $yield_c; $level -= 1;
    $upgrade_price = $upgrade_price_a * $level * $level + $upgrade_price_b * $level + $upgrade_price_c;

    if ($account_row['job'] == 1) {
        $possession = $account_row['possession'];
        $rate = 0.0;
        if ($possession >= 0 && $possession < $tax_price_a)                 $rate = 0.1;
        else if ($possession >= $tax_price_a && $possession < $tax_price_b) $rate = 0.2;
        else if ($possession >= $tax_price_b && $possession < $tax_price_c) $rate = 0.3;
        else if ($possession >= $tax_price_c && $possession < $tax_price_d) $rate = 0.4;
        else if ($possession >= $tax_price_d)                               $rate = 0.0;
        $tax = $possession * $rate;
    } else {
        $tax = $tax_worker;
    }

    $mysqli->query('UPDATE account SET group_max = "' . $group_max . '", group_next = "' . $group_next . '", yield = "' . $yield . '", yield_next = "' . $yield_next . '", upgrade_price = "' . $upgrade_price . '", tax = "' . $tax . '" WHERE pk = "' . $pk . '";');
}

echo "設定成功。";

include ('php_footer.php');
?>
