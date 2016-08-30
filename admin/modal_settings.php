<div id="modal_settings" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5>設定</h5>
        <div class="row">
            <form id="frm_settings" class="col s12">
                <div class="row">
                    <h6>整組零件價錢</h6>
                    <div class="input-field col s12">
                        <input id="commodity_ppg" value="<?php echo $commodity_ppg; ?>" name="commodity_ppg" type="text" class="validate">
                    </div>
                </div>
                <div class="row">
                    <h6>低價收購價錢</h6>
                    <div class="input-field col s4">
                        <input id="raw01_price" value="<?php echo $raw01_price; ?>" name="raw01_price" type="text" class="validate">
                        <label for="raw01_price">彈頭</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="raw02_price" value="<?php echo $raw02_price; ?>" name="raw02_price" type="text" class="validate">
                        <label for="raw02_price">導引雷達</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="raw03_price" value="<?php echo $raw03_price; ?>" name="raw03_price" type="text" class="validate">
                        <label for="raw03_price">推進器</label>
                    </div>
                </div>
                <div class="row">
                    <h6>可出售組數</h6>
                    <p>
                        x = 等級<br>
                        可出售組數 = a * x<sup>2</sup> + b * x + c
                    </p>
                    <div class="input-field col s4">
                        <input id="group_a" value = "<?php echo $group_a; ?>" name="group_a" type="text" class="validate">
                        <label for="group_a">a</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="group_b" value = "<?php echo $group_b; ?>" name="group_b" type="text" class="validate">
                        <label for="group_b">b</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="group_c" value = "<?php echo $group_c; ?>" name="group_c" type="text" class="validate">
                        <label for="group_c">c</label>
                    </div>
                </div>
                <div class="row">
                    <h6>產量</h6>
                    <p>
                        x = 等級<br>
                        產量 = a * x<sup>2</sup> + b * x + c
                    </p>
                    <div class="input-field col s4">
                        <input id="yield_a" value = "<?php echo $yield_a; ?>" name="yield_a" type="text" class="validate">
                        <label for="yield_a">a</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="yield_b" value = "<?php echo $yield_b; ?>" name="yield_b" type="text" class="validate">
                        <label for="yield_b">b</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="yield_c" value = "<?php echo $yield_c; ?>" name="yield_c" type="text" class="validate">
                        <label for="yield_c">c</label>
                    </div>
                </div>
                <div class="row">
                    <h6>升級費用</h6>
                    <p>
                        x = 等級<br>
                        升級費用 = a * x<sup>2</sup> + b * x + c
                    </p>
                    <div class="input-field col s4">
                        <input id="upgrade_price_a" value = "<?php echo $upgrade_price_a; ?>" name="upgrade_price_a" type="text" class="validate">
                        <label for="upgrade_price_a">a</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="upgrade_price_b" value = "<?php echo $upgrade_price_b; ?>" name="upgrade_price_b" type="text" class="validate">
                        <label for="upgrade_price_b">b</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="upgrade_price_c" value = "<?php echo $upgrade_price_c; ?>" name="upgrade_price_c" type="text" class="validate">
                        <label for="upgrade_price_c">c</label>
                    </div>
                </div>
                <div class="row">
                    <h6>轉型費用</h6>
                    <p>
                        x = 當回合軍火商↔勞工零件交價<br>
                        轉型費用 = a * x<sup>2</sup> + b * x + c
                    </p>
                    <div class="input-field col s4">
                        <input id="transfer_price_a" value="<?php echo $transfer_price_a; ?>" name="transfer_price_a" type="text" class="validate">
                        <label for="transfer_price_a">a</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="transfer_price_b" value="<?php echo $transfer_price_b; ?>" name="transfer_price_b" type="text" class="validate">
                        <label for="transfer_price_b">b</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="transfer_price_c" value="<?php echo $transfer_price_c; ?>" name="transfer_price_c" type="text" class="validate">
                        <label for="transfer_price_c">c</label>
                    </div>
                </div>
                <div class="row">
                    <h6>稅</h6>
                    <p>
                        10% : 0 ~ a;<br>
                        20% : a ~ b;<br>
                        30% : b ~ c;<br>
                        40% : c ~ d;<br>
                        0%  : d ~
                    </p>
                    <div class="input-field col s3">
                        <input id="tax_price_a" value="<?php echo $tax_price_a; ?>" name="tax_price_a" type="text" class="validate">
                        <label for="tax_price_a">a</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="tax_price_b" value="<?php echo $tax_price_b; ?>" name="tax_price_b" type="text" class="validate">
                        <label for="tax_price_b">b</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="tax_price_c" value="<?php echo $tax_price_c; ?>" name="tax_price_c" type="text" class="validate">
                        <label for="tax_price_c">c</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="tax_price_d" value="<?php echo $tax_price_d; ?>" name="tax_price_d" type="text" class="validate">
                        <label for="tax_price_d">d</label>
                    </div>
                </div>
                <div class="row">
                    <h6>勞工稅</h6>
                    <div class="input-field col s12">
                        <input id="tax_worker" value="<?php echo $tax_worker; ?>" name="tax_worker" type="text" class="validate">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" id="btn_settings" class="modal-action modal-close waves-effect waves-green btn-flat">設定</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">取消</a>
    </div>
</div>
