<?php include_once('index_header.php');?>

<h4><br>個人資訊</h4>
<div class="row">
    <div class="col s12 m6 l4">
        <ul class="collection with-header">
            <li class="collection-item">帳號：<?php echo $account; ?></li>
            <li class="collection-item">權限：
                <?php echo ($authority == 1) ? '管理員' : '玩家'; ?>
            </li>
            <li class="collection-item">職業：
                <?php
                switch ($job) {
                    case 0: echo '銀行'; break;
                    case 1: echo '軍火商'; break;
                    case 2: echo '彈頭人'; break;
                    case 3: echo '導引雷達人'; break;
                    case 4: echo '推進器人'; break;
                }
                if ($job != 1) echo '<a href="#modal_transfer" onclick="click_info_transfer(\'' . $transfer_raw01_price . '\',\'' . $transfer_raw02_price . '\',\'' . $transfer_raw03_price . '\')" class="secondary-content modal-trigger valign-wrapper"><span class="valign"></span><i class="material-icons">loop</i></a>';
                ?>
            </li>
            <li class="collection-item">等級：<?php echo $level; ?>等<a href="#modal_upgrade" onclick="<?php echo "click_info_upgrade('" . $upgrade_price . "', '" . $group_max . "', '" . $group_next . "', '" . $yield . "', '" . $yield_next . "')"; ?>" class="secondary-content modal-trigger valign-wrapper"><span class="valign"><?php echo $upgrade_price; ?></span><i class="material-icons valign">navigation</i></a></li>
            <?php echo empty($worker_union) ? '' : '<li class="collection-item">工會：' . $worker_union . '</li>'; ?>
            <li class="collection-item">狀態：
                <?php
                switch ($state) {
                    case 0: echo '<span class="red-text">死亡</span>'; break;
                    case 1: echo '<span class="green-text">正常</span>'; break;
                    case 2: echo '<span class="blue-text">抵制</span>'; break;
                }
                ?>
            </li>
            <li class="collection-item"><?php echo ($enabled == 1) ? '<span class="green-text">解鎖中</span>' : '<span class="red-text">鎖定中</span>'; ?></li>
        </ul>
    </div>
    <div class="col s12 m6 l4">
        <ul class="collection with-header">
            <li class="collection-item">回合：<?php echo $round; ?></li>
            <li class="collection-item">階段：<?php echo $stage; ?></li>
            <li class="collection-item">財產：<?php echo $possession; ?>元</li>
            <li class="collection-item">稅：<?php echo $tax; ?>元</li>
            <?php
            if ($job == 1 || $authority) echo '<li class="collection-item">可出售熊三飛彈個數：' . $group_rest . '/' . $group_max . '個</li>';
            if ($job != 1) echo '<li class="collection-item">每回合產量：' . $yield . '單位</li>';
            ?>
            <li class="collection-item">彈頭：<?php echo $raw01; ?>單位</li>
            <li class="collection-item">導引雷達：<?php echo $raw02; ?>單位</li>
            <li class="collection-item">推進器：<?php echo $raw03; ?>單位</li>
        </ul>
    </div>
    <div class="col s12 l4">
        <ul class="collection with-header">
            <li id="gov_acquire" class="collection-header">政府收購</li>
            <li class="collection-item">彈頭：<?php echo $raw01_price; ?>元</li>
            <li class="collection-item">導引雷達：<?php echo $raw02_price; ?>元</li>
            <li class="collection-item">推進器：<?php echo $raw03_price; ?>元</li>
            <li class="collection-item">熊三飛彈：<?php echo $commodity_ppg; ?>元</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <?php
        if ($job == 1 || $authority) echo '<a href="#modal_sell_commodity" class="waves-effect waves-light modal-trigger btn"><i class="material-icons left">work</i>出售熊三飛彈</a>';
        if ($job != 1)               echo ' <a id="btn_strike" onclick="click_info_strike()" class="waves-effect waves-light btn"><i class="material-icons left">error</i>抵制</a>';
        ?>
    </div>
</div>
