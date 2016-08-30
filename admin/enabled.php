<?php
include('php_header.php');

$enabled = $_POST["enabled"];

$mysqli->query('UPDATE setting SET enabled = "' . $enabled . '";');
if ($enabled == 0) echo "鎖定成功！";
else               echo "解鎖成功！";

include ('php_footer.php');
?>
