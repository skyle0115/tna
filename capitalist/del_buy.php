<!-- Skyle -->
<?php
include ('php_header.php');

$pk = $_POST["pk"];

$setting_row = $mysqli->query('SELECT * FROM setting;')->fetch_assoc();
$enabled = $setting_row['enabled'];
$stage = $setting_row['stage'];

if ($enabled == 0) {
    echo "鎖定中，無法操作。";
    $mysqli->close();
    exit();
}

if ($mysqli->query('DELETE FROM deal WHERE pk = "' . $pk . '";') === TRUE) {
    echo "刪除成功。";
} else {
    echo "刪除失敗。";
}

include ('php_footer.php');
?>
