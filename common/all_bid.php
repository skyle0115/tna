<?php include_once('index_header.php'); ?>

<h4><br>軍火商出價</h4>
<table class="responsive-table">
    <thead>
        <tr>
            <th>零件</th>
            <th>軍火商Ａ</th>
            <th>軍火商Ｂ</th>
            <th>軍火商Ｃ</th>
            <th>軍火商Ｄ</th>
            <th>軍火商Ｅ</th>
            <th>軍火商Ｆ</th>
            <th>軍火商Ｇ</th>
            <th>軍火商Ｈ</th>
            <th>軍火商Ｉ</th>
            <th>軍火商Ｊ</th>
            <th>軍火商Ｋ</th>
            <th>軍火商Ｌ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $all_bid = [[]];
        $all_bid['admin'][1] = 0;
        $all_bid['admin'][2] = 0;
        $all_bid['admin'][3] = 0;

        for ($i = 1; $i <= 12; $i++)
        for ($j = 1; $j <= 3; $j++)
        $all_bid[chr(ord('A') + $i - 1)][$j] = 0;

        $bid_res = $mysqli->query('SELECT * FROM bid;');
        while ($bid_row = $bid_res->fetch_assoc()) {
            $_round = $bid_row['round'];

            if ($_round == $round) {
                $_bidder = $bid_row['bidder'];
                $_raw01 = $bid_row['raw01'];
                $_raw02 = $bid_row['raw02'];
                $_raw03 = $bid_row['raw03'];

                $all_bid[$_bidder][1] = $_raw01;
                $all_bid[$_bidder][2] = $_raw02;
                $all_bid[$_bidder][3] = $_raw03;
            }
        }
        ?>
        <tr>
            <td>彈頭</td>
            <?php
            for ($i = 1; $i <= 12; $i++)
            echo '<td>' . $all_bid[chr(ord('A') + $i - 1)][1] . '</td>';
            ?>
        </tr>
        <tr>
            <td>導引雷達</td>
            <?php
            for ($i = 1; $i <= 12; $i++)
            echo '<td>' . $all_bid[chr(ord('A') + $i - 1)][2] . '</td>';
            ?>
        </tr>
        <tr>
            <td>推進器</td>
            <?php
            for ($i = 1; $i <= 12; $i++)
            echo '<td>' . $all_bid[chr(ord('A') + $i - 1)][3] . '</td>';
            ?>
        </tr>
    </tbody>
</table>
