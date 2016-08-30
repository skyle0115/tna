<?php include_once('index_header.php'); ?>

<h4><br>零件成交價</h4>
<?php
$deal_final = [[[]]];
for ($i = 1; $i <= 2; $i++)
for ($j = 1; $j <= 9; $j++)
for ($k = 1; $k <= 3; $k++)
$deal_final[$i][$j][$k] = 0;

$deal_final_res = $mysqli->query('SELECT * FROM deal_final;');
while ($deal_final_row = $deal_final_res->fetch_assoc()) {
    $_type = $deal_final_row['type'];
    $_round = $deal_final_row['round'];
    $_raw01_ppu = $deal_final_row['raw01_ppu'];
    $_raw02_ppu = $deal_final_row['raw02_ppu'];
    $_raw03_ppu = $deal_final_row['raw03_ppu'];
    $deal_final[$_type][$_round][1] = $_raw01_ppu;
    $deal_final[$_type][$_round][2] = $_raw02_ppu;
    $deal_final[$_type][$_round][3] = $_raw03_ppu;
}
?>
<h5>軍火商↔勞工</h5>
<table class="responsive-table">
    <thead>
        <tr>
            <th>零件</th>
            <th>回合一</th>
            <th>回合二</th>
            <th>回合三</th>
            <th>回合四</th>
            <th>回合五</th>
            <th>回合六</th>
            <th>回合七</th>
            <th>回合八</th>
            <th>回合九</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>彈頭</td>
            <?php
            for ($i = 1; $i <= 9; $i++)
            echo '<td>' . $deal_final[2][$i][1] . '</td>';
            ?>
        </tr>
        <tr>
            <td>導引雷達</td>
            <?php
            for ($i = 1; $i <= 9; $i++)
            echo '<td>' . $deal_final[2][$i][2] . '</td>';
            ?>
        </tr>
        <tr>
            <td>推進器</td>
            <?php
            for ($i = 1; $i <= 9; $i++)
            echo '<td>' . $deal_final[2][$i][3] . '</td>';
            ?>
        </tr>
    </tbody>
</table>
<h5>軍火商↔軍火商</h5>
<table class="responsive-table">
    <thead>
        <tr>
            <th>零件</th>
            <th>回合一</th>
            <th>回合二</th>
            <th>回合三</th>
            <th>回合四</th>
            <th>回合五</th>
            <th>回合六</th>
            <th>回合七</th>
            <th>回合八</th>
            <th>回合九</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>彈頭</td>
            <?php
            for ($i = 1; $i <= 9; $i++)
            echo '<td>' . $deal_final[1][$i][1] . '</td>';
            ?>
        </tr>
        <tr>
            <td>導引雷達</td>
            <?php
            for ($i = 1; $i <= 9; $i++)
            echo '<td>' . $deal_final[1][$i][2] . '</td>';
            ?>
        </tr>
        <tr>
            <td>推進器</td>
            <?php
            for ($i = 1; $i <= 9; $i++)
            echo '<td>' . $deal_final[1][$i][3] . '</td>';
            ?>
        </tr>
    </tbody>
</table>
