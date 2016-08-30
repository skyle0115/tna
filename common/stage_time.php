<?php include_once('index_header.php');?>

<h4>剩餘時間</h4>
<h5>
    <?php
    echo (strtotime($stage_time) > time()) ? date('i:s', strtotime($stage_time) - time()) : '00:00';
    ?>
</h5>
