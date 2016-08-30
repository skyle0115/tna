$(function(){
    // 初始化
    $('#btn_init').click(function(){
        $.post("admin/init.php", {},
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    //鎖定
    $('#btn_disabled').click(function(){
        $.post("admin/enabled.php",
        {
            enabled: 0
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 解鎖
    $('#btn_enabled').click(function(){
        $.post("admin/enabled.php",
        {
            enabled: 1
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 回合/階段
    $('#btn_set_round_stage').click(function(){
        $.post("admin/set_round_stage.php",
        {
            new_round: $("#new_round").val(),
            new_stage: $("#new_stage").val(),
            new_stage_time: $("#new_stage_time").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 生產作物
    $('#btn_produce').click(function(){
        $.post("admin/produce.php", {},
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 重設交易、出價
    $('.btn_reset_deal').click(function(){
        $.post("admin/reset.php",
        {
            index: 3
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 低價收購
    $('#btn_acquire_crop').click(function(){
        $.post("admin/acquire_crop.php", {},
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 工會
    $('#btn_worker_union').click(function(){
        $.post("admin/worker_union.php", $('#frmWorkerUnion').serialize(),
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 更新作物成交價
    $('.btn_update_final_price').click(function(){
        $.post("admin/final.php", {},
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 收稅
    $('#btn_collect_tax').click(function(){
        $.post("admin/collect_tax.php", {},
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 抵制懲罰
    $('#btn_strike_penalty').click(function(){
        $.post("admin/strike_penalty.php",
        {
            strike_penalty: $("#strike_penalty").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 設定
    $('#btn_settings').click(function(){
        $.post("admin/settings.php", $('#frm_settings').serialize(),
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 發布新聞
    $('#btn_publish_news').click(function(){
        $.post("admin/publish_news.php",
        {
            news_content: $("#news_content").val()
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 重設可出售組數
    $('#btn_reset_group_rest').click(function(){
        $.post("admin/reset.php",
        {
            index: 1
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 重設抵制
    $('#btn_reset_strike').click(function(){
        $.post("admin/reset.php",
        {
            index: 2
        },
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

    // 編輯帳號
    $('#btn_edit_account').click(function(){
        $.post("admin/edit_account.php", $('#frm_edit_account').serialize(),
        function(data, status){
            Materialize.toast(data, 4000);
        });
    });

});

function click_all_info_edit_account(pk, account, job, level, worker_union, state, possession, group_rest, group_max, _yield, upgrade_price, tax, raw01, raw02, raw03) {
    $("#new_pk").val(pk);
    $("#new_account").text(account);
    $("#new_job").val(job);
    $("#new_level").val(level);
    $("#new_worker_union").val(worker_union);
    $("#new_state").val(state);
    $("#new_possession").val(possession);
    $("#new_yield").val(_yield);
    $("#new_upgrade_price").val(upgrade_price);
    $("#new_group_rest").val(group_rest);
    $("#new_group_max").val(group_max);
    $("#new_tax").val(tax);
    $("#new_raw01").val(raw01);
    $("#new_raw02").val(raw02);
    $("#new_raw03").val(raw03);
}
