<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$name = $_POST["name"];
		$furigana = $_POST["furigana"];
		$email = $_POST["email"];
		$tel = $_POST["tel"];
		$sex = $_POST["sex"];
		$item = $_POST["item"];
		$content  = $_POST["content"];
		$time     = $_POST["time"];
		$timestamp= $_POST["timestamp"];
		$month    = $_POST["month"];
		#echo $month;
		list($y, $m) = explode("-", $month);
		$fullPath = 'python ./call_from_php.py '.$item.' '.$m.' '.$y;
		exec($fullPath, $outpara);
		$worktime = $outpara[0];
		$paycheck = $outpara[1];
		//echo $worktime;
		//echo '<PRE>';
    		//var_dump($fullPath);
    		//var_dump($outpara[0]);
   	 	//var_dump($outpara[1]);
    		//var_dump($outpara[2]);
    		//var_dump($outpara[3]);
    		//echo '<PRE>';


	}

	// 送信ボタンが押されたら
	if (isset($_POST["submit"])) {
		// 送信ボタンが押された時に動作する処理をここに記述する
        	//$fp = fopen('data.csv','a'); //a:追記モード
		//$array = [$time,$item,$sex,$timestamp];
		//fputcsv($fp,$array);
		//fclose($fp);
		//$a = fopen("test.txt", "w");
 		//@fwrite($a, "上書きです。");
 		//@fclose($a);
		// 日本語をメールで送る場合のおまじない
        	mb_language("ja");
		mb_internal_encoding("UTF-8");
		
		mb_send_mail("shuto.kawabata.oyama@gmail.com", "メール送信テスト", "メール本文");

        	// 件名を変数subjectに格納
        	$subject = "［自動送信］お問い合わせ内容の確認";
		$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";
		// メール送信を行う
		mb_send_mail($email, $subject, $body, $header);
 		// サンクスページに画面遷移させる
		//header("Location: worktime.php");
		exit;
	}
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>お問い合わせフォーム</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div><h1>Falcom</h1></div>
<div><h2>給与計算</h2></div>
<div>
	<form action="confirm.php" method="post">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="furigana" value="<?php echo $furigana; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="tel" value="<?php echo $tel; ?>">
            <input type="hidden" name="sex" value="<?php echo $sex; ?>">
            <input type="hidden" name="item" value="<?php echo $item; ?>">
            <input type="hidden" name="content" value="<?php echo $content; ?>">
	    <input type="hidden" name="time" value="<?php echo $time; ?>">
	    <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">
	    <input type="hidden" name="month" value="<?php echo $month; ?>">
	    <input type="hidden" name="worktime" value="<?php echo $worktime; ?>">
	    <input type="hidden" name="paycheck" value="<?php echo $paycheck; ?>">
            <h1 class="contact-title">給与確認</h1>
            <p><?php echo $item; ?>さんの<?php echo $y; ?>年<?php echo $m; ?>月の結果</p>
            <div style="font-size:20px;" >
                <div>
                    <label>氏名</label>
                    <p><?php echo $item; ?></p>
                </div>
		<div>
		    <label>年月</label>
		    <p><?php echo $y; ?>年<?php echo $m; ?>月</p>
		</div>
		<div>
		    <label>時間</label>
		    <p><?php echo $worktime; ?></p>
		</div>
		<div>
		    <label>給与</label>
		    <p><font color="red"><b>¥<?php echo $paycheck; ?></b></font></p>
		</div>
            </div>
		<input type="button" value="戻る" onclick="history.back(-1)">
		<!--<button type="submit" name="submit">入力画面に戻る</button>-->
	</form>
</div>
</body>
</html>
