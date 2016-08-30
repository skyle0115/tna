<div id="modal_set_round_stage" class="modal">
    <div class="modal-content">
        <h5>回合</h5>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input value="<?php echo $round; ?>" id="new_round" type="text" class="validate">
                        <label for="new_round">回合</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input value="<?php echo $stage; ?>" id="new_stage" type="text" class="validate">
                        <label for="new_stage">階段</label>
                    </div>
                    <div class="input-field col s12">
                        <input value="<?php echo (strtotime($stage_time) > time()) ? date('i', strtotime($stage_time) - time()) : '0'; ?>" id="new_stage_time" type="text" class="validate">
                        <label for="new_stage">時限(分鐘)</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" id="btn_set_round_stage" class="modal-action modal-close waves-effect waves-green btn-flat">設定</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">取消</a>
    </div>
</div>
