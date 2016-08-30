<?php include_once('common/index_header.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TNA</title>
    <meta name="name" content="content">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>
    <!--Import Google Icon Font-->
    <link href="assets/css/icon.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="assets/js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <!-- GAP -->
    <script type="text/javascript" src="assets/js/common.js"></script>
    <script type="text/javascript" src="assets/js/admin.js"></script>
    <script type="text/javascript" src="assets/js/capitalist.js"></script>
    <script type="text/javascript" src="assets/js/worker.js"></script>
    <script type="text/javascript">
    $(function(){
        $('.button-collapse').sideNav({
            closeOnClick: true
        });
    });
    </script>
</head>

<body>
    <!-- Modal 刪除收購 -->
    <?php if ($job == 1 || $authority) include('capitalist/modal_del_buy.php'); ?>

    <!-- Modal 出售作物 -->
    <?php include('common/modal_sell.php'); ?>

    <!-- Modal 販售整組作物 -->
    <?php if ($job == 1 || $authority) include('capitalist/modal_sell_commodity.php'); ?>

    <!-- Modal 升級 -->
    <?php include('common/modal_upgrade.php'); ?>

    <!-- Modal 轉職 -->
    <?php include('common/modal_transfer.php'); ?>

    <!-- Modal 回合 -->
    <?php if ($authority) include('admin/modal_set_round_stage.php'); ?>

    <!-- Modal 工會 -->
    <?php if ($authority) include('admin/modal_worker_union.php'); ?>

    <!-- Modal 抵制懲罰 -->
    <?php if ($authority) include('admin/modal_strike_penalty.php'); ?>

    <!-- Modal 設定 -->
    <?php if ($authority) include('admin/modal_settings.php'); ?>

    <!-- Modal 發布新聞 -->
    <?php if ($authority) include('admin/modal_publish_news.php'); ?>

    <!-- Modal 編輯帳號 -->
    <?php if ($authority) include('admin/modal_edit_account.php'); ?>

    <!-- 導覽列 -->
    <?php include('common/nav.php'); ?>

    <!-- 主內容 -->
    <div class="container">
        <!-- 提示 -->
        <div id="stage_time" class="section"></div>

        <!-- 提示 -->
        <div id="hint" class="section"></div>

        <!-- 個人資訊 -->
        <div id="info" class="section"></div>

        <!-- 控制版面 -->
        <?php if ($authority) include('admin/control_panel.php'); ?>

        <!-- 所有資訊 -->
        <div id="all_info" class="section"></div>

        <!-- 通知 -->
        <div id="msg" class="section"></div>

        <!-- 作物成交價 -->
        <div id="final_price" class="section"></div>

        <!-- 資本家出價 -->
        <div id="all_bid" class="section"></div>

        <!-- 出價/收購 -->
        <?php if ($job == 1 || $authority) include('capitalist/bid_buy.php'); ?>

        <!-- 新聞 -->
        <div id="news" class="section"></div>

    </div>

    <!-- 頁尾 -->
    <?php include('common/footer.php'); ?>
</body>
</html>
<?php include_once('common/php_footer.php'); ?>
