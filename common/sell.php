<!-- Skyle -->
<?php
include ('php_header.php');

$pk = $_POST["pk"];
$sell_raw01_count = intval($_POST["sell_raw01_count"]);
$sell_raw02_count = intval($_POST["sell_raw02_count"]);
$sell_raw03_count = intval($_POST["sell_raw03_count"]);

// 資料驗證
if ($sell_raw01_count < 0 || $sell_raw02_count < 0 || $sell_raw03_count < 0) {
    echo "出售失敗，數量需大於等於零。";
    exit();
}

$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$enabled = $setting_row['enabled'];
$stage = $setting_row['stage'];

if ($enabled == 0) {
    echo "鎖定中，無法操作。";
    $mysqli->close();
    exit();
}

$seller_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $login_account . '";')->fetch_assoc();
$seller_state= $seller_row['state'];
$seller_job= $seller_row['job'];

if ($seller_state == 0) {
    echo "出售失敗，死亡無法出售。";
    $mysqli->close();
    exit();
}

// 階段判斷
switch ($stage) {
    case 1:
        if ($seller_job != 1) { //勞工
            echo "出售失敗，勞工請在第二階段出售。";
            $mysqli->close();
            exit();
        }
        break;
    case 2:
        if ($seller_job == 1) { //軍火商
            echo "出售失敗，軍火商請在第一階段出售。";
            $mysqli->close();
            exit();
        }
        break;
    default:
        if ($seller_job == 1) echo "出售失敗，軍火商請在第一階段出售。";
        else                  echo "出售失敗，勞工請在第二階段出售。";
        $mysqli->close();
        exit();
        break;
}

if ($seller_state == 2) {
    echo "出售失敗，抵制中無法出售。";
    $mysqli->close();
    exit();
}

$deal_res = $mysqli->query('SELECT * FROM deal WHERE pk = "' . $pk . '";');
if (($deal_res->num_rows) == 1) {
    $deal_row = $deal_res->fetch_assoc();
    $pk = $deal_row['pk'];
    $round = $deal_row['round'];
    $buyer = $deal_row['buyer'];
    $seller = $login_account;
    $raw01_ppu = $deal_row['raw01_ppu'];
    $raw01_count = $deal_row['raw01_count'];
    $raw02_ppu = $deal_row['raw02_ppu'];
    $raw02_count = $deal_row['raw02_count'];
    $raw03_ppu = $deal_row['raw03_ppu'];
    $raw03_count = $deal_row['raw03_count'];

    $buyer_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $buyer . '";')->fetch_assoc();
    $buyer_job = $buyer_row['job'];
    $buyer_possession = $buyer_row['possession'];
    $buyer_raw01 = $buyer_row['raw01'];
    $buyer_raw02 = $buyer_row['raw02'];
    $buyer_raw03 = $buyer_row['raw03'];

    $seller_job = $seller_row['job'];
    $seller_possession = $seller_row['possession'];
    $seller_raw01 = $seller_row['raw01'];
    $seller_raw02 = $seller_row['raw02'];
    $seller_raw03 = $seller_row['raw03'];

    // raw01
    $raw01_deal_count = 0;
    if ($raw01_ppu) {
        $raw01_deal_count = min($seller_raw01, $sell_raw01_count, $raw01_count, floor($buyer_possession / $raw01_ppu));
        if ($raw01_deal_count > 0) {
            $seller_raw01 -= $raw01_deal_count;
            $buyer_raw01 += $raw01_deal_count;
            $raw01_count -= $raw01_deal_count;
            $seller_possession += $raw01_deal_count * $raw01_ppu;
            $buyer_possession -= $raw01_deal_count * $raw01_ppu;
        }
    }

    // raw02
    $raw02_deal_count = 0;
    if ($raw02_ppu) {
        $raw02_deal_count = min($seller_raw02, $sell_raw02_count, $raw02_count, floor($buyer_possession / $raw02_ppu));
        if ($raw02_deal_count > 0) {
            $seller_raw02 -= $raw02_deal_count;
            $buyer_raw02 += $raw02_deal_count;
            $raw02_count -= $raw02_deal_count;
            $seller_possession += $raw02_deal_count * $raw02_ppu;
            $buyer_possession -= $raw02_deal_count * $raw02_ppu;
        }
    }

    // raw03
    $raw03_deal_count = 0;
    if ($raw03_ppu) {
        $raw03_deal_count = min($seller_raw03, $sell_raw03_count, $raw03_count, floor($buyer_possession / $raw03_ppu));
        if ($raw03_deal_count > 0) {
            $seller_raw03 -= $raw03_deal_count;
            $buyer_raw03 += $raw03_deal_count;
            $raw03_count -= $raw03_deal_count;
            $seller_possession += $raw03_deal_count * $raw03_ppu;
            $buyer_possession -= $raw03_deal_count * $raw03_ppu;
        }
    }

    $mysqli->query('UPDATE account SET possession = "' . $buyer_possession . '", raw01 = "' . $buyer_raw01 . '", raw02 = "' . $buyer_raw02 . '", raw03 = "' . $buyer_raw03 . '" WHERE account = "' . $buyer . '";');
    $mysqli->query('UPDATE account SET possession = "' . $seller_possession . '", raw01 = "' . $seller_raw01 . '", raw02 = "' . $seller_raw02 . '", raw03 = "' . $seller_raw03 . '" WHERE account = "' . $seller . '";');
    $mysqli->query('UPDATE deal SET raw01_count = "' . $raw01_count . '", raw02_count = "' . $raw02_count . '", raw03_count = "' . $raw03_count . '" WHERE pk = "' . $pk . '";');
    $mysqli->query('INSERT INTO deal_rec (round, buyer, buyer_job, seller, seller_job, raw01_ppu, raw01_count, raw02_ppu, raw02_count, raw03_ppu, raw03_count) VALUES ("' . $round . '", "' . $buyer . '", "' . $buyer_job . '", "' . $seller . '", "' . $seller_job . '", "' . $raw01_ppu . '", "' . $raw01_deal_count . '", "' . $raw02_ppu . '", "' . $raw02_deal_count . '", "' . $raw03_ppu . '", "' . $raw03_deal_count . '");');

    if ($raw01_count == 0 && $raw02_count == 0 && $raw03_count == 0)
        $mysqli->query('DELETE FROM deal WHERE pk = "' . $pk . '";');

    echo "出售成功。";
} else {
    echo "出售失敗，買家已取消或完成交易。";
}

include ('php_footer.php');
?>
