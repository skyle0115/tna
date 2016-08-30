<?php
include('php_header.php');

function generateRandomString($length = 5) {
    // for testing
    return '1111';
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$p = [1000, 1000, 1000, 1000, 1000, 1000, 4000, 4000, 4000, 4000, 4000, 4000];
for ($i = 0; $i < 12; $i++) {
    $r = rand(0, 7);
    $t = $p[$i];
    $p[$i] = $p[$r];
    $p[$r] = $t;
}

$q = [2, 3, 4, 2, 3, 4, 2, 3, 4, 2, 3, 4];

// 重設資本家、農夫
for ($i = 1; $i <= 12; $i++) {
    $account = chr(ord('A') + $i - 1);
    $sql = 'UPDATE account SET password = "' . generateRandomString() . '", job = "1", level = "1", worker_union = "", state = "1", possession = "' . $p[$i - 1] . '", tax = "0", group_max = "0", group_rest = "0", group_next = "0", yield = "0", yield_next = "0", upgrade_price = "0", raw01 = "0", raw02 = "0", raw03 = "0" WHERE account = "' . $account . '";';
    $mysqli->query($sql);

    for ($j = 1; $j <= 4; $j++) {
        $account = chr(ord('A') + $i - 1) . '0' . $j;
        $sql = 'UPDATE account SET password = "' . generateRandomString() . '", job = "' . $q[$i - 1] . '", level = "1", worker_union = "", state = "1", possession = "0", tax = "0", group_max = "0", group_rest = "0", group_next = "0", yield = "0", yield_next = "0", upgrade_price = "0", raw01 = "0", raw02 = "0", raw03 = "0" WHERE account = "' . $account . '";';
        $mysqli->query($sql);
    }
}


// 重設bid, deal, deal_rec, deal_final, news
$mysqli->query('DELETE FROM bid;');
$mysqli->query('DELETE FROM deal;');
$mysqli->query('DELETE FROM deal_rec;');
$mysqli->query('DELETE FROM deal_final;');
$mysqli->query('DELETE FROM news;');


echo "初始化完畢！";

include ('php_footer.php');
?>
