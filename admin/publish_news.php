<?php
include('php_header.php');

$news_content = $_POST["news_content"];

if ($mysqli->query('INSERT INTO news (news_content) VALUES ("' . $news_content . '");') === TRUE) {
    echo "發佈完成！";
} else {
    echo "發佈失敗！";
}

include ('php_footer.php');
?>
