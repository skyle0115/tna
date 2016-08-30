<?php include_once('index_header.php'); ?>

<h4><br>新聞</h4>
<?php
$account_res = $mysqli->query('SELECT * FROM news ORDER BY created_at DESC;');
while ($account_row = $account_res->fetch_assoc()) {
    echo '<h5>' . $account_row['created_at'] . '</h5>';
    echo '<p>' . $account_row['news_content'] . '</p>';
}
?>
