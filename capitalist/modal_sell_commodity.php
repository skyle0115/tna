<div id="modal_sell_commodity" class="modal">
    <div class="modal-content">
        <h5>出售熊三飛彈</h5>
        <p>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="sell_commodity_count" type="text" class="validate" value="<?php echo min($raw01, $raw02, $raw03, $group_rest) ?>">
                            <label for="sell_commodity_count">出售個數（剩餘<?php echo min($raw01, $raw02, $raw03); ?>個，可再出售<?php echo $group_rest;  ?>個，每個<?php echo $commodity_ppg ?>元）</label>
                        </div>
                    </div>
                </form>
            </div>
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" id="btn_sell_commodity" class="modal-action modal-close waves-effect waves-green btn-flat">出售</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">取消</a>
    </div>
</div>
