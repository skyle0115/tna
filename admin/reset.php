<?php
include('php_header.php');

$index = $_POST["index"];

switch ($index) {
    case 1: //reset group_rest
        $mysqli->query('UPDATE account SET group_rest = group_max;');
        echo "重設可出售組數成功。";
        break;
    case 2: //reset strike
        $mysqli->query('UPDATE account SET state = "1" WHERE state = "2";');
        echo "重設抵制成功。";
        break;
    case 3: //reset deal
        $mysqli->query('DELETE FROM deal;');
        $mysqli->query('DELETE FROM bid;');
        echo "重設交易、出價成功。";
        break;
}

include ('php_footer.php');
?>
