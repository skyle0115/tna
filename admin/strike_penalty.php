<?php
include('php_header.php');

$strike_penalty = $_POST["strike_penalty"];

if ($strike_penalty <= 0) {
    echo "懲罰失敗，罰款需大於零！";
    $mysqli->close();
    exit();
}

$account_res = $mysqli->query('SELECT * FROM account;');
while ($account_row = $account_res->fetch_assoc()) {
    $pk = $account_row['pk'];
    $job = $account_row['job'];
    $state = $account_row['state'];
    $possession = $account_row['possession'];

    if ($job == 1 && $state != 0) {
        if ($possession >= $strike_penalty) {
            $possession -= $strike_penalty;
            $mysqli->query('UPDATE account SET possession = "' . $possession . '" WHERE pk = "' . $pk . '";');
        } else {
            $possession = 0;
            $mysqli->query('UPDATE account SET possession = "' . $possession . '", state = "0" WHERE pk = "' . $pk . '";');
        }
    }
}

echo "懲罰完成！";

include ('php_footer.php');
?>
