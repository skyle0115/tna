$(function(){
    // 出價 - 資本家
    $('#btn_bid').click(function(){
        $.post("capitalist/bid.php",
        {
            raw01_ppu: $("#bid_raw01_ppu").val(),
            raw02_ppu: $("#bid_raw02_ppu").val(),
            raw03_ppu: $("#bid_raw03_ppu").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 收購 - 資本家
    $('#btn_buy').click(function(){
        $.post("capitalist/buy.php",
        {
            seller: $("#buy_seller").val(),
            raw01_ppu: $("#buy_raw01_ppu").val(),
            raw01_count: $("#buy_raw01_count").val(),
            raw02_ppu: $("#buy_raw02_ppu").val(),
            raw02_count: $("#buy_raw02_count").val(),
            raw03_ppu: $("#buy_raw03_ppu").val(),
            raw03_count: $("#buy_raw03_count").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 刪除收購 - 資本家
    $('#btn_del_buy').click(function(){
        $.post("capitalist/del_buy.php",
        {
            pk: $("#deal_pk").val(),
            sell_raw03_count: $("#sell_raw03_count").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 出售整組作物 - 資本家
    $('#btn_sell_commodity').click(function(){
        $.post("capitalist/sell_commodity.php",
        {
            count: $("#sell_commodity_count").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

});

// 刪除收購 - 資本家
function click_msg_del_buy(pk) {
    $("#deal_pk").val(pk);
}
