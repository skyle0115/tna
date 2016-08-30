<div id="modal_sell" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5>出售零件</h5>
        <input id="sell_pk" type="hidden" value="">
        <h6>出售對象：<span id="modal_buyer"></span></h6>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12 l4">
                        <input id="sell_raw01_count" type="text" class="validate">
                        <label for="sell_raw01_count">彈頭（單價：<span id="modal_raw01_ppu"></span>）</label>
                    </div>
                    <div class="input-field col s12 l4">
                        <input id="sell_raw02_count" type="text" class="validate">
                        <label for="sell_raw02_count">導引雷達（單價：<span id="modal_raw02_ppu"></span>）</label>
                    </div>
                    <div class="input-field col s12 l4">
                        <input id="sell_raw03_count" type="text" class="validate">
                        <label for="sell_raw03_count">推進器（單價：<span id="modal_raw03_ppu"></span>）</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" id="btn_sell" class="modal-action modal-close waves-effect waves-green btn-flat">出售</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">取消</a>
    </div>
</div>
