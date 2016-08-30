temp = [];

function loadIfChanged(id, php, callBack) {
    $.get(php, function(result){
        if(result != temp[id]) {
            $(id).html(result);
            if (typeof callBack != 'undefined') callBack();
            temp[id] = result;
        }
    });
}

function refresh(){
    loadIfChanged('#stage_time', 'common/stage_time.php');
    loadIfChanged('#hint', 'common/hint.php');
    loadIfChanged('#info', 'common/info.php', function(){
        $('.modal-trigger').leanModal({
            in_duration: 0,
            out_duration: 0
        });
    });
    loadIfChanged('#all_info', 'admin/all_info.php');
    loadIfChanged('#final_price', 'common/final_price.php');
    loadIfChanged('#all_bid', 'common/all_bid.php');
    loadIfChanged('#msg', 'common/msg.php', function(){
        $('.modal-trigger').leanModal({
            in_duration: 0,
            out_duration: 0
        });
    });
    loadIfChanged('#news', 'common/news.php');
    setTimeout(refresh, 1500);
}

$(function(){
    refresh();
    // 出售 - 共用
    $('#btn_sell').click(function(){
        $.post("common/sell.php",
        {
            pk: $("#sell_pk").val(),
            sell_raw01_count: $("#sell_raw01_count").val(),
            sell_raw02_count: $("#sell_raw02_count").val(),
            sell_raw03_count: $("#sell_raw03_count").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 升級 - 共用
    $('#btn_upgrade').click(function(){
        $.post("common/upgrade.php", {},
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 轉職 - 共用
    $('#btn_transfer').click(function(){
        $.post("common/transfer.php",
        {
            job: $(".transfer_radio:checked").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

});

// 出售
function click_msg_sell(pk, buyer, raw01_ppu, raw02_ppu, raw03_ppu) {
    $("#sell_pk").val(pk);
    $("#modal_buyer").text(buyer);
    $("#modal_raw01_ppu").text(raw01_ppu);
    $("#modal_raw02_ppu").text(raw02_ppu);
    $("#modal_raw03_ppu").text(raw03_ppu);
}

// 轉職
function click_info_transfer(transfer_raw01_price, transfer_raw02_price, transfer_raw03_price) {
    $("#transfer_raw01_price").text(transfer_raw01_price);
    $("#transfer_raw02_price").text(transfer_raw02_price);
    $("#transfer_raw03_price").text(transfer_raw03_price);
}

// 升級
click_info_transfer
function click_info_upgrade(upgrade_price, group_max, group_next, _yield, yield_next) {
    $("#upgrade_price").text(upgrade_price);
    $("#group_max").text(group_max);
    $("#group_next").text(group_next);
    $("#yield").text(_yield);
    $("#yield_next").text(yield_next);
}
