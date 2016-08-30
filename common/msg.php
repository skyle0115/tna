<?php
    include_once('index_header.php');
?>

<h4><br>通知</h4>
<div class="row">

    <?php
    $deal_res = $mysqli->query('SELECT * FROM deal;');
    while ($deal_row = $deal_res->fetch_assoc()) {
        $_pk = $deal_row['pk'];
        $_round = $deal_row['round'];
        $_buyer = $deal_row['buyer'];
        $_seller = $deal_row['seller'];
        $_raw01_ppu = $deal_row["raw01_ppu"];
        $_raw01_count = $deal_row["raw01_count"];
        $_raw02_ppu = $deal_row["raw02_ppu"];
        $_raw02_count = $deal_row["raw02_count"];
        $_raw03_ppu = $deal_row["raw03_ppu"];
        $_raw03_count = $deal_row["raw03_count"];
        if ($_seller == $login_account || $_seller == $worker_union)
        echo '<div class="col s12 m6 l4"><div class="collection"><a href="#modal_sell" class="collection-item modal-trigger" onclick="click_msg_sell(\'' . $_pk . '\', \'' . $_buyer . '\', \'' . $_raw01_ppu . '\', \'' . $_raw02_ppu . '\', \'' . $_raw03_ppu . '\');"><span class="right btn">出售</span><h5>' . $_buyer . '向您收購</h5>彈頭單價/數量：' . $_raw01_ppu . '/' . $_raw01_count . '<br>導引雷達單價/數量：' . $_raw02_ppu . '/' . $_raw02_count . '<br>推進器單價/數量：' . $_raw03_ppu . '/' . $_raw03_count . '</a></div></div>';
        else if ($_buyer == $login_account)
        echo '<div class="col s12 m6 l4"><div class="collection"><a href="#modal_del_buy" class="collection-item modal-trigger" onclick="click_msg_del_buy(\'' . $_pk . '\');"><span class="right btn">刪除</span><h5>收購</h5>您向' . $_seller . '收購<br>彈頭單價/數量：' . $_raw01_ppu . '/' . $_raw01_count . '<br>導引雷達單價/數量：' . $_raw02_ppu . '/' . $_raw02_count . '<br>推進器單價/數量：' . $_raw03_ppu . '/' . $_raw03_count . '</a></div></div>';
    }
    ?>
</div>
