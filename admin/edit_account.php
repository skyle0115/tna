<?php
include('php_header.php');

$pk = $_POST['new_pk'];
$job = $_POST['new_job'];
$level = $_POST['new_level'];
$worker_union = $_POST['new_worker_union'];
$state = $_POST['new_state'];
$possession = $_POST['new_possession'];
$group_rest = $_POST['new_group_rest'];
$group_max = $_POST['new_group_max'];
$yield = $_POST['new_yield'];
$upgrade_price = $_POST['new_upgrade_price'];
$tax = $_POST['new_tax'];
$raw01 = $_POST['new_raw01'];
$raw02 = $_POST['new_raw02'];
$raw03 = $_POST['new_raw03'];

//UPDATE account SET job = "", level = "", worker_union = "", state = "", possession = "", yield = "", transfer_raw01_price = "", transfer_raw02_price = "", transfer_raw03_price = "", tax = "", raw01 = "", raw02 = "", raw03 = "" WHERE pk = "";

$account_res = $mysqli->query('UPDATE account SET job = "' . $job . '", level = "' . $level . '", worker_union = "' . $worker_union . '", state = "' . $state . '", possession = "' . $possession . '", group_rest = "' . $group_rest . '", group_max = "' . $group_max . '", yield = "' . $yield . '", upgrade_price = "' . $upgrade_price . '", tax = "' . $tax . '", raw01 = "' . $raw01 . '", raw02 = "' . $raw02 . '", raw03 = "' . $raw03 . '" WHERE pk = "' . $pk . '";');

if ($account_res === TRUE) echo "編輯成功。";
else                       echo "編輯失敗。";

include ('php_footer.php');
?>
