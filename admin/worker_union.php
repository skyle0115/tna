<?php
include('php_header.php');

$union = $_POST['union'];
$union_name = $_POST['union_name'];

foreach ($union as $account)
    $mysqli->query('UPDATE account SET worker_union = "' . $union_name . '" WHERE account = "' . $account . '"');

echo "成立工會成功。";

include ('php_footer.php');
?>
