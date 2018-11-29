<?php
    if(isset($_POST['add'])) {
       echo "登録ボタンが押下されました";
    }
    else if(isset($_POST['remove'])) {
       echo "削除ボタンが押下されました";
    }   
?>
<form action="input.php" method="post">
    <input type="submit" name="add" value="登録" />
    <input type="submit" name="remove" value="削除" />
</form>
