<?php include_once('../common/index_header.php'); if (!$authority) exit();?>

<h4><br>所有資訊</h4>
<table>
    <thead>
        <tr>
            <th>帳號</th>
            <th>職業</th>
            <th>等級</th>
            <th>工會</th>
            <th>狀態</th>
            <th>財產</th>
            <th>剩組數</th>
            <th>總組數</th>
            <th>產量</th>
            <th>升級</th>
            <th>稅</th>
            <th>彈頭</th>
            <th>導引雷達</th>
            <th>推進器</th>
        </tr>
    </thead>

    <tbody>

        <?php
        function printInfo($account_row) {
            echo '<tr>';
            echo "<td><a href=\"#modal_edit_account\" class=\"modal-trigger\" onclick=\"click_all_info_edit_account('" . $account_row['pk'] . "', '" . $account_row['account'] . "', '" . $account_row['job'] . "', '" . $account_row['level'] . "', '" . $account_row['worker_union'] . "', '" . $account_row['state'] . "', '" . $account_row['possession'] . "', '" . $account_row['group_rest'] . "', '" . $account_row['group_max'] . "', '" . $account_row['yield'] . "', '" . $account_row['upgrade_price'] . "', '" . $account_row['tax'] . "', '" . $account_row['raw01'] . "', '" . $account_row['raw02'] . "', '" . $account_row['raw03'] . "')\">" . $account_row['account'] . "</a></td>";
            switch ($account_row['job']) {
                case 0: echo '<td>銀行</td>'; break;
                case 1: echo '<td>資本家</td>'; break;
                case 2: echo '<td>彈頭人</td>'; break;
                case 3: echo '<td>導引雷達人</td>'; break;
                case 4: echo '<td>推進器人</td>'; break;
            }
            echo '<td>' . $account_row['level'] . '</td>';
            if (empty($account_row['worker_union'])) echo '<td>無</td>';
            else echo '<td>' . $account_row['worker_union'] . '</td>';
            switch ($account_row['state']) {
                case 0: echo '<td><span class="red-text">死亡</span></td>'; break;
                case 1: echo '<td><span class="green-text">正常</span></td>'; break;
                case 2: echo '<td><span class="blue-text">抵制</span></td>'; break;
            }
            echo '<td>' . $account_row['possession'] . '</td>';
            echo '<td>' . $account_row['group_rest'] . '</td>';
            echo '<td>' . $account_row['group_max'] . '</td>';
            echo '<td>' . $account_row['yield'] . '</td>';
            echo '<td>' . $account_row['upgrade_price'] . '</td>';
            echo '<td>' . $account_row['tax'] . '</td>';
            echo '<td>' . $account_row['raw01'] . '</td>';
            echo '<td>' . $account_row['raw02'] . '</td>';
            echo '<td>' . $account_row['raw03'] . '</td>';
            echo '<tr>';
        }

        $account_row = $mysqli->query('SELECT * FROM account WHERE account = "admin";')->fetch_assoc();
        printInfo($account_row);

        for ($i = 1; $i <= 12; $i++) {
            $_account = chr(ord('A') + $i - 1);
            $account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $_account . '";')->fetch_assoc();
            printInfo($account_row);
        }

        for ($i = 1; $i <= 12; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                $_account = chr(ord('A') + $i - 1) . '0' . $j;
                $account_row = $mysqli->query('SELECT * FROM account WHERE account = "' . $_account . '";')->fetch_assoc();
                printInfo($account_row);
            }
        }
        ?>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
