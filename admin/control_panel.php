<div id="control_panel" class="section">
    <h4><br>控制版面</h4>
    <a id="btn_init" class="waves-effect waves-light btn"><i class="material-icons left">stop</i>初始化</a>
    <a id="btn_account" href="admin/account.php" target="_blank" class="waves-effect waves-light btn"><i class="material-icons left">list</i>匯出帳號密碼</a>
    <div class="row">
        <div class="col s12 m4">
            <div class="collection">
                <a class="collection-item black-text"><h5>共用</h5></a>
                <a id="btn_disabled" href="#!" class="collection-item"><i class="material-icons left">lock_outline</i>鎖定</a>
                <a id="btn_enabled" href="#!" class="collection-item"><i class="material-icons left">lock_open</i>解鎖</a>
                <a href="#modal_set_round_stage" class="modal-trigger collection-item"><i class="material-icons left">replay</i>回合/階段</a>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="collection">
                <a class="collection-item black-text"><h5>第一階段結束後</h5></a>
                <a href="#!" class="btn_reset_deal collection-item"><i class="material-icons left">replay</i>重設交易、出價</a>
                <a href="#!" class="btn_update_final_price collection-item"><i class="material-icons left">system_update_alt</i>更新零件成交價</a>
                <a id="btn_produce" href="#!" class="collection-item"><i class="material-icons left">settings_input_composite</i>生產零件</a>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="collection">
                <a class="collection-item black-text"><h5>第二階段結束後</h5></a>
                <a href="#!" class="btn_reset_deal collection-item"><i class="material-icons left">replay</i>重設交易、出價</a>
                <a href="#!" class="btn_update_final_price collection-item"><i class="material-icons left">system_update_alt</i>更新零件成交價</a>
                <a href="#modal_publish_news" class="collection-item modal-trigger"><i class="material-icons left">comment</i>發新聞稿</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4">
            <div class="collection">
                <a class="collection-item black-text"><h5>第三階段</h5></a>
                <a href="#modal_strike_penalty" class="collection-item modal-trigger"><i class="material-icons left">not_interested</i>抵制懲罰</a>
                <a id="btn_acquire_crop" href="#!" class="collection-item"><i class="material-icons left">redeem</i>低價收購</a>
                <a id="btn_collect_tax" href="#!" class="collection-item"><i class="material-icons left">shopping_basket</i>收稅</a>

            </div>
        </div>
        <div class="col s12 m4">
            <div class="collection">
                <a class="collection-item black-text"><h5>第三階段</h5></a>
                <a href="#modal_worker_union" class="modal-trigger collection-item"><i class="material-icons left">supervisor_account</i>工會</a>
                <a href="#modal_settings" class="collection-item modal-trigger"><i class="material-icons left">assignment</i>設定</a>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="collection">
                <a class="collection-item black-text"><h5>第三階段</h5></a>
                <a href="#!" id="btn_reset_group_rest" class="collection-item"><i class="material-icons left">replay</i>重設可出售組數</a>
                <a href="#!" id="btn_reset_strike" class="collection-item"><i class="material-icons left">replay</i>重設抵制</a>
            </div>
        </div>
    </div>
</div>
