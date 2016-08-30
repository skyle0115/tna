<?php
include('php_header.php');

$account_res = $mysqli->query('SELECT * FROM account;');
while ($account_row = $account_res->fetch_assoc()) {
    $pk = $account_row['pk'];
    $job = $account_row['job'];
    $state = $account_row['state'];
    $yield = $account_row['yield'];
    $raw01 = $account_row['raw01'];
    $raw02 = $account_row['raw02'];
    $raw03 = $account_row['raw03'];

    if (($state != 0 && $job != 1) || $authority) {
        switch ($job) {
            case 0:
                $raw01 += $yield;
                $raw02 += $yield;
                $raw03 += $yield;
                break;
            case 2:
                $raw01 += $yield;
                break;
            case 3:
                $raw02 += $yield;
                break;
            case 4:
                $raw03 += $yield;
                break;
        }

        $mysqli->query('UPDATE account SET raw01 = "' . $raw01 . '", raw02 = "' . $raw02 . '", raw03 = "' . $raw03 . '" WHERE pk = "' . $pk . '";');

    }
}

echo "生產完成！";

include ('php_footer.php');
?>
