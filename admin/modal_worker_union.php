<div id="modal_worker_union" class="modal">
    <div class="modal-content">
        <h5>工會</h5>
        <div class="row">
            <form id="frmWorkerUnion" action="#" class="col s12">
                <div class="input-field col s12">
                    <input id="union_name" type="text" class="validate" name="union_name">
                    <label for="union_name">工會名稱</label>
                </div>
                <div class="row">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        for ($j = 1; $j <= 4; $j++) {
                            $_account = chr(ord('A') + $i - 1) . '0' . $j;
                            echo '<div class="col s3">';
                            echo '<input type="checkbox" name="union[]" value="' . $_account . '" id="cb' . $_account . '"/>';
                            echo '<label for="cb' . $_account . '">' . $_account . '</label>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" id="btn_worker_union" class="modal-action modal-close waves-effect waves-green btn-flat">成立</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">取消</a>
    </div>
</div>
