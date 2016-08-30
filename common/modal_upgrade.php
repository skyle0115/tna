<div id="modal_upgrade" class="modal">
    <div class="modal-content">
        <h5>升級</h5>
        <p>
            確定要升級？<br>
            升級費用：<span id="upgrade_price"></span><br>
            <span <?php if (!($job == 1 || $authority)) echo 'style="display:none;"'; ?>>可換組數：<span id="group_max"></span> -> <span id="group_next"></span><br></span>
            <span <?php if (!($job != 1)) echo 'style="display:none;"'; ?>>產量：<span id="yield"></span> -> <span id="yield_next"><br></span></span>
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" id="btn_upgrade" class="modal-action modal-close waves-effect waves-green btn-flat">升級</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">取消</a>
    </div>
</div>
