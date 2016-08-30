<?php include_once('index_header.php'); ?>

<h4>提示</h4>
<ul class="collection">
    <li class="collection-item" style="display: none;">
        <h5>獲勝條件</h5>
        <p>
            資本家財產 + 農夫財產<br>
            在九個回合中算盡心機、絞盡腦汁，獲得最大財富吧！<br>
            在政府的高稅壓榨、資本家的陰險狡猾中苟延殘喘九個回合吧！
        </p>
    </li>
    <li class="collection-item" <?php if (!(($job == 1 || $authority) && $stage == 1)) echo 'style="display: none;"'; ?>>
        <h5>第一階段：與其他軍火商交易</h5>
        <p>
            1. 第一回合：和其他人討論策略<br>
            2. 第二回合以後：可以與其他軍火商交易<br>
            　　* 收購零件：在<a href="#bid">出價</a>填入欲收購的價格，吸引其他軍火商向你出售零件<br>
            　　* 出售零件：找滿意的出價軍火商交易<br>
        </p>
        <p>
            <a href="#buy">收購零件</a><br>
            1. 在<mark>收購對象帳號</mark>填入欲交易的賣家帳號(如:A, B)<br>
            2. 在<mark>零件單價</mark>填入欲收購的價錢<br>
            3. 在<mark>零件數量</mark>填入欲收購的最大數量<br>
            4. 確認賣家出售完成後，即可進行下一筆交易<br>
        </p>
        <p>
            <a href="#msg">出售零件</a><br>
            1. 與買家談妥單價、數量後，買家會輸入你的帳號並送出收購邀請<br>
            2. 送出收購邀請後，<a href="#msg">通知</a>會顯示買家帳號、單價及數量<br>
            3. 按下出售，設定要出售的零件數量<br>
            4. 按下出售，交易即可完成<br>
        </p>
        <p>
            <mark>注意</mark><br>
            交易的價格不必與出價相同
        </p>

    </li>
    <li class="collection-item" <?php if (!($job != 1 && $stage == 1)) echo 'style="display: none;"'; ?>>
        <h5>第一階段：生產零件</h5>
        <p>
            到指定地點進行遊戲，遊戲結束後獲得零件。
        </p>
    </li>
    <li class="collection-item" <?php if (!(($job == 1 || $authority) && $stage == 2)) echo 'style="display: none;"'; ?>>
        <h5>第二階段：與勞工交易</h5>
        <p>
            在<a href="#bid">出價</a>填入欲收購的價格，吸引勞工向你出售零件
        </p>
        <p>
            <a href="#buy">收購零件</a><br>
            1. 在<mark>收購對象帳號</mark>填入欲交易的賣家帳號(如:A, B)或工會名稱<br>
            2. 在<mark>零件單價</mark>填入欲收購的價錢<br>
            3. 在<mark>零件數量</mark>填入欲收購的最大數量<br>
            4. 確認賣家出售完成後，即可進行下一筆交易<br>
        </p>
        <p>
            <mark>注意</mark><br>
            1. 實際交易價格可與出價不同<br>
            2. 一次只能與一位勞工(或工會)交易，新的收購將取代前一筆收購<br>
            3. 若出價太低，導致一半(含)以上的勞工發動<mark>抵制</mark>，所有軍火商將被罰款
        </p>
    </li>
    <li class="collection-item" <?php if (!($job != 1 && $stage == 2)) echo 'style="display: none;"'; ?>>
        <h5>第二階段：與軍火商交易</h5>
        <p>
            找滿意的出價軍火商交易
        </p>
        <p>
            <a href="#msg">出售零件</a><br>
            1. 與買家談妥單價、數量後，買家會輸入你的帳號或工會名稱並送出收購邀請<br>
            2. 送出收購邀請後，<a href="#msg">通知</a>會顯示買家帳號、單價及數量<br>
            3. 按下出售，設定要出售的零件數量<br>
            4. 按下出售，交易即可完成<br>
        </p>
        <p>
            <mark>注意</mark><br>
            若不滿意所有軍火商的出價，可以<a href="#info">抵制</a>軍火商。若超過一半(含)的勞工<a href="#info">抵制</a>，所有軍火商將被罰款。
        </p>
    </li>
    <li class="collection-item" <?php if (!(($job == 1 || $authority) && $stage == 3)) echo 'style="display: none;"'; ?>>
        <h5>第三階段：繳稅、看新聞稿、交流</h5>
        <p>
            1. 政府收稅，財產不足者死亡<br>
            2. 查看新聞稿<br>
            3. 和其他人討論策略<br>
        </p>
    </li>
    <li class="collection-item" <?php if (!($job != 1 && $stage == 3)) echo 'style="display: none;"'; ?>>
        <h5>第三階段：政府低價收購、繳稅、看新聞稿、創建工會、交流</h5>
        <p>
            1. 政府低價收購所有勞工的零件<br>
            2. 政府收稅，財產不足者死亡<br>
            3. 查看新聞稿<br>
            4. 可以到主控台創建工會<br>
            5. 和其他人討論策略<br>
        </p>
        <p>
            <mark>注意</mark><br>
            創建工會後，軍火商可以一次送出收購邀請給工會所有勞工
        </p>
    </li>
</ul>
