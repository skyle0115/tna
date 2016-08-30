<?php
include('php_header.php');

function printInfo($account_row) {
    echo '<tr>';
    echo '<td>' . $account_row['account'] . '</td>';
    echo '<td>' . $account_row['password'] . '</td>';
    switch ($account_row['job']) {
        case 0: echo '<td>銀行</td>'; break;
        case 1: echo '<td>軍火商</td>'; break;
        case 2: echo '<td>彈頭人</td>'; break;
        case 3: echo '<td>導引雷達人</td>'; break;
        case 4: echo '<td>推進器人</td>'; break;
    }

    echo '<tr>';
}

echo '<table border="1" width="250"><tr><td>帳號</td><td>密碼</td><td>職業</td></tr>';
for ($i = 1; $i <= 12; $i++) {
    $_account = chr(ord('A') + $i - 1);
    $account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $_account . '";')->fetch_assoc();
    printInfo($account_row);

    for ($j = 1; $j <= 4; $j++) {
        $_account = chr(ord('A') + $i - 1) . '0' . $j;
        $account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $_account . '";')->fetch_assoc();
        printInfo($account_row);
    }
}
echo '</table>';

?>
