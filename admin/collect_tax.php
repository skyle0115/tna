<?php
include('php_header.php');

$die = 0;

$account_res = $mysqli->query('SELECT * FROM account;');
while ($account_row = $account_res->fetch_assoc()) {
    $pk = $account_row['pk'];
    $state = $account_row['state'];
    $possession = $account_row['possession'];
    $tax = $account_row['tax'];

    if ($state != 0) {
        if ($possession >= $tax) {
            $possession -= $tax;
        } else {
            $possession = 0;
            $state = 0;
            $die++;
        }
        $mysqli->query('UPDATE account SET state = "' . $state . '", possession = "' . $possession . '" WHERE pk = "' . $pk . '";');
    }
}

echo '收稅完成，共' . $die . '人死亡！';

include ('php_footer.php');
?>
