<?php
session_start();
if (!isset($_SESSION["islogin"])) header ('Location: login.php');
$islogin = $_SESSION["islogin"];
$login_account = $_SESSION["login_account"];
$authority = $_SESSION["authority"];
if (!$islogin) header ('Location: login.php');

// $mysqli = new mysqli("localhost", "root", "", "gap");
// if ($mysqli->connect_errno)	die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
include_once('mysqli.php');


date_default_timezone_set("Asia/Taipei");
$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$enabled = $setting_row['enabled'];
$round = $setting_row['round'];
$stage = $setting_row['stage'];
$stage_time = $setting_row['stage_time'];
$commodity_ppg = $setting_row["commodity_ppg"];
$raw01_price = $setting_row["raw01_price"];
$raw02_price = $setting_row["raw02_price"];
$raw03_price = $setting_row["raw03_price"];
$group_a = $setting_row["group_a"];
$group_b = $setting_row["group_b"];
$group_c = $setting_row["group_c"];
$yield_a = $setting_row["yield_a"];
$yield_b = $setting_row["yield_b"];
$yield_c = $setting_row["yield_c"];
$upgrade_price_a = $setting_row["upgrade_price_a"];
$upgrade_price_b = $setting_row["upgrade_price_b"];
$upgrade_price_c = $setting_row["upgrade_price_c"];
$transfer_price_a = $setting_row["transfer_price_a"];
$transfer_price_b = $setting_row["transfer_price_b"];
$transfer_price_c = $setting_row["transfer_price_c"];
$transfer_raw01_price = $setting_row['transfer_raw01_price'];
$transfer_raw02_price = $setting_row['transfer_raw02_price'];
$transfer_raw03_price = $setting_row['transfer_raw03_price'];
$tax_price_a = $setting_row["tax_price_a"];
$tax_price_b = $setting_row["tax_price_b"];
$tax_price_c = $setting_row["tax_price_c"];
$tax_price_d = $setting_row["tax_price_d"];
$tax_worker = $setting_row["tax_worker"];

$account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $login_account . '";')->fetch_assoc();
$account = $account_row['account'];
$job = $account_row['job'];
$level = $account_row['level'];
$worker_union = $account_row['worker_union'];
$state = $account_row['state'];
$possession = $account_row['possession'];
$group_max = $account_row['group_max'];
$group_rest = $account_row['group_rest'];
$group_next = $account_row['group_next'];
$yield = $account_row['yield'];
$yield_next = $account_row['yield_next'];
$upgrade_price = $account_row['upgrade_price'];
$tax = $account_row['tax'];
$raw01 = $account_row['raw01'];
$raw02 = $account_row['raw02'];
$raw03 = $account_row['raw03'];
?>
