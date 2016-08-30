<!-- Skyle -->
<?php
include ('php_header.php');

$seller = $_POST["seller"];
$raw01_ppu = intval($_POST["raw01_ppu"]);
$raw01_count = intval($_POST["raw01_count"]);
$raw02_ppu = intval($_POST["raw02_ppu"]);
$raw02_count = intval($_POST["raw02_count"]);
$raw03_ppu = intval($_POST["raw03_ppu"]);
$raw03_count = intval($_POST["raw03_count"]);

// 資料驗證
if (empty($seller)) {
    echo "收購失敗，收購對象不能為空。";
    $mysqli->close();
    exit();
}

if ($seller == $login_account) {
    echo "收購失敗，收購對象不能為自己。";
    $mysqli->close();
    exit();
}

if ($raw01_ppu < 0 || $raw01_count < 0 || $raw02_ppu < 0 || $raw02_count < 0 || $raw03_ppu < 0 || $raw03_count < 0) {
    echo "收購失敗，收購價格和數量需大於等於零。";
    $mysqli->close();
    exit();
}

$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$enabled = $setting_row['enabled'];
$round = $setting_row['round'];
$stage = $setting_row['stage'];

if ($enabled == 0) {
    echo "鎖定中，無法操作。";
    $mysqli->close();
    exit();
}

if ($stage != 1 && $stage != 2) {
    echo "收購失敗，請在第一、二階段收購。";
    $mysqli->close();
    exit();
}

$sql = 'DELETE FROM deal WHERE buyer = "' . $login_account . '";';
if ($mysqli->query($sql) === FALSE) {
    echo "收購失敗。";
    $mysqli->close();
    exit();
}

$account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $login_account . '";')->fetch_assoc();
$state = $account_row['state'];

if ($state == 0) {
    echo "收購失敗，死亡無法收購。";
    $mysqli->close();
    exit();
}

$sql = 'INSERT INTO deal (round, seller, buyer, raw01_ppu, raw01_count, raw02_ppu, raw02_count, raw03_ppu, raw03_count) VALUES ("' . $round . '", "' . $seller . '", "' . $login_account . '", "' . $raw01_ppu . '", "' . $raw01_count . '", "' . $raw02_ppu . '", "' . $raw02_count . '", "' . $raw03_ppu . '", "' . $raw03_count . '");';
if ($mysqli->query($sql) === TRUE) echo "送出成功，等待對方出售。";
else                               echo "收購失敗。";

include ('php_footer.php');
?>
