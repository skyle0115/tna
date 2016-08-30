<!-- Skyle -->
<?php
include ('php_header.php');

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
if ($stage != 2) {
    echo "抵制失敗，勞工請在第二階段抵制。";
    $mysqli->close();
    exit();
}

$account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $login_account . '";')->fetch_assoc();
$state = $account_row['state'];

switch ($state) {
    case 0:
        echo "抵制失敗，死亡無法抵制。";
        break;
    case 1:
        $deal_rec_res = $mysqli->query('SELECT * FROM deal_rec WHERE seller = "' . $login_account . '" AND round = "' . $round . '";');
        if ($deal_rec_res->num_rows >= 1) {
            echo "抵制失敗，此回合已出售零件。";
        } else {
            $mysqli->query('UPDATE account SET state = "2" WHERE account = "' . $login_account . '";');
            echo "抵制成功。";
        }
        break;
    case 2:
        echo "您已經在抵制了。";
        break;
}

include ('php_footer.php');
?>
