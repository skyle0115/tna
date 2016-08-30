<?php
include('php_header.php');

$mysqli->query('DELETE FROM deal_final;');

for ($current_round = 1; $current_round <= 9; $current_round++) {

    $raw01_total_price_1 = 0;
    $raw01_total_count_1 = 0;
    $raw01_total_ppu_1 = 0;
    $raw02_total_price_1 = 0;
    $raw02_total_count_1 = 0;
    $raw02_total_ppu_1 = 0;
    $raw03_total_price_1 = 0;
    $raw03_total_count_1 = 0;
    $raw03_total_ppu_1 = 0;
    $raw01_total_price_2 = 0;
    $raw01_total_count_2 = 0;
    $raw01_total_ppu_2 = 0;
    $raw02_total_price_2 = 0;
    $raw02_total_count_2 = 0;
    $raw02_total_ppu_2 = 0;
    $raw03_total_price_2 = 0;
    $raw03_total_count_2 = 0;
    $raw03_total_ppu_2 = 0;

    $deal_final_res = $mysqli->query('SELECT * FROM deal_rec WHERE round = "' . $current_round . '";');
    while ($deal_final_row = $deal_final_res->fetch_assoc()) {
        $buyer_job = $deal_final_row['buyer_job'];
        $seller_job = $deal_final_row['seller_job'];
        $raw01_ppu = $deal_final_row['raw01_ppu'];
        $raw01_count = $deal_final_row['raw01_count'];
        $raw02_ppu = $deal_final_row['raw02_ppu'];
        $raw02_count = $deal_final_row['raw02_count'];
        $raw03_ppu = $deal_final_row['raw03_ppu'];
        $raw03_count = $deal_final_row['raw03_count'];

        if ($buyer_job == 1 && $seller_job == 1) {
            $raw01_total_price_1 += $raw01_count * $raw01_ppu;
            $raw01_total_count_1 += $raw01_count;
            $raw02_total_price_1 += $raw02_count * $raw02_ppu;
            $raw02_total_count_1 += $raw02_count;
            $raw03_total_price_1 += $raw03_count * $raw03_ppu;
            $raw03_total_count_1 += $raw03_count;
        } else {
            $raw01_total_price_2 += $raw01_count * $raw01_ppu;
            $raw01_total_count_2 += $raw01_count;
            $raw02_total_price_2 += $raw02_count * $raw02_ppu;
            $raw02_total_count_2 += $raw02_count;
            $raw03_total_price_2 += $raw03_count * $raw03_ppu;
            $raw03_total_count_2 += $raw03_count;
        }
    }
    if ($raw01_total_count_1 != 0) $raw01_total_ppu_1 = round($raw01_total_price_1 / $raw01_total_count_1, 2);
    if ($raw02_total_count_1 != 0) $raw02_total_ppu_1 = round($raw02_total_price_1 / $raw02_total_count_1, 2);
    if ($raw03_total_count_1 != 0) $raw03_total_ppu_1 = round($raw03_total_price_1 / $raw03_total_count_1, 2);
    if ($raw01_total_count_2 != 0) $raw01_total_ppu_2 = round($raw01_total_price_2 / $raw01_total_count_2, 2);
    if ($raw02_total_count_2 != 0) $raw02_total_ppu_2 = round($raw02_total_price_2 / $raw02_total_count_2, 2);
    if ($raw03_total_count_2 != 0) $raw03_total_ppu_2 = round($raw03_total_price_2 / $raw03_total_count_2, 2);

    $mysqli->query('INSERT INTO deal_final (type, round, raw01_ppu, raw02_ppu, raw03_ppu) VALUES ("1", "' . $current_round . '", "' . $raw01_total_ppu_1 . '", "' . $raw02_total_ppu_1 . '", "' . $raw03_total_ppu_1 . '");');
    $mysqli->query('INSERT INTO deal_final (type, round, raw01_ppu, raw02_ppu, raw03_ppu) VALUES ("2", "' . $current_round . '", "' . $raw01_total_ppu_2 . '", "' . $raw02_total_ppu_2 . '", "' . $raw03_total_ppu_2 . '");');
}
echo "更新完成！";

include ('php_footer.php');
?>
