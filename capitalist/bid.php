<!-- Skyle -->
<?php
include ('php_header.php');

$raw01_ppu = intval($_POST["raw01_ppu"]);
$raw02_ppu = intval($_POST["raw02_ppu"]);
$raw03_ppu = intval($_POST["raw03_ppu"]);

// 資料驗證
if ($raw01_ppu < 0 || $raw02_ppu < 0 || $raw03_ppu < 0) {
    echo "出價失敗，出價需大於等於零。";
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

// 階段判斷
if ($stage != 1 && $stage != 2) {
    echo "出價失敗，請在第一階段出價。";
    $mysqli->close();
    exit();
}

$account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $login_account . '";')->fetch_assoc();
$state = $account_row['state'];

if ($state == 0) {
    echo "出價失敗，死亡無法出價。";
    $mysqli->close();
    exit();
}

$bid_res = $mysqli->query('SELECT * FROM bid WHERE round = "' . $round . '" AND bidder = "' . $login_account . '";');

if (($bid_res->num_rows) == 1) {
    $bid_row = $bid_res->fetch_assoc();
    $pk = $bid_row['pk'];
    $sql = 'UPDATE bid SET raw01 = "' . $raw01_ppu . '", raw02 = "' . $raw02_ppu . '", raw03 = "' . $raw03_ppu . '" WHERE pk = "' . $pk . '";';
} else {
    $sql = 'INSERT INTO bid (round, bidder, raw01, raw02, raw03) VALUES ("' . $round . '", "' . $login_account . '", "' . $raw01_ppu . '", "' . $raw02_ppu . '", "' . $raw03_ppu . '");';
}

if ($mysqli->query($sql) === TRUE) echo "出價成功！";
else                               echo "出價失敗！";

include ('php_footer.php');
?>
