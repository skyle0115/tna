<div id="top" class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="#!" class="brand-logo">TNA</a>
                <a href="#" data-activates="mobile-side-bar" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#hint">提示</a></li>
                    <li><a href="#info">個人資訊</a></li>
                    <?php if ($authority) echo '<li><a href="#control_panel">控制版面</a></li>';?>
                    <?php if ($authority) echo '<li><a href="#all_info">所有資訊</a></li>';?>
                    <li><a href="#msg">通知</a></li>
                    <li><a href="#final_price">零件成交價</a></li>
                    <li><a href="#all_bid">軍火商出價</a></li>
                    <?php if ($job == 1 || $authority) echo '<li><a href="#bid">出價</a></li>';?>
                    <?php if ($job == 1 || $authority) echo '<li><a href="#buy">收購</a></li>';?>

                    <li><a href="#news">新聞</a></li>
                    <li><a href="logout.php">登出</a></li>
                </ul>
                <ul class="side-nav" id="mobile-side-bar">
                    <li><a href="#hint">提示</a></li>
                    <li><a href="#info">個人資訊</a></li>
                    <?php if ($authority) echo '<li><a href="#control_panel">控制版面</a></li>';?>
                    <?php if ($authority) echo '<li><a href="#all_info">所有資訊</a></li>';?>
                    <li><a href="#msg">通知</a></li>
                    <li><a href="#final_price">零件成交價</a></li>
                    <li><a href="#all_bid">軍火商出價</a></li>
                    <?php if ($job == 1 || $authority) echo '<li><a href="#bid">出價</a></li>';?>
                    <?php if ($job == 1 || $authority) echo '<li><a href="#buy">收購</a></li>';?>
                    <li><a href="#news">新聞</a></li>
                    <li><a href="logout.php">登出</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
