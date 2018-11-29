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
	}

	// 送信ボタンが押されたら
	if (isset($_POST["submit"])) {
		// 送信ボタンが押された時に動作する処理をここに記述する
        	$fp = fopen('data.csv','a'); //a:追記モード
		$array = [$time,$item,$sex,$timestamp];
		fputcsv($fp,$array);
		fclose($fp);
		//$a = fopen("test.txt", "w");
 		//@fwrite($a, "上書きです。");
 		//@fclose($a);
		// 日本語をメールで送る場合のおまじない
        	mb_language("ja");
		mb_internal_encoding("UTF-8");
		
		mb_send_mail("shuto.kawabata.oyama@gmail.com", "メール送信テスト", "メール本文");

        	// 件名を変数subjectに格納
        	$subject = "［自動送信］お問い合わせ内容の確認";

        	// メール本文を変数bodyに格納
		$body = <<< EOM
{$name}　様

お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【 お名前 】 
{$name}

【 ふりがな 】 
{$furigana}

【 メール 】 
{$email}

【 電話番号 】 
{$tel}

【 性別 】 
{$sex}

【 項目 】 
{$item}

【 内容 】 
{$content}
===================================================

内容を確認のうえ、回答させて頂きます。
しばらくお待ちください。
EOM;
        
		// 送信元のメールアドレスを変数fromEmailに格納
		$fromEmail = "lovedisneyaladdin@gmail.com";

		// 送信元の名前を変数fromNameに格納
		$fromName = "お問い合わせテスト";

		// ヘッダ情報を変数headerに格納する		
		$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

		// メール送信を行う
		mb_send_mail($email, $subject, $body, $header);

 		// サンクスページに画面遷移させる
		header("Location: thanks.php");
		exit;
	}
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>入力内容の確認</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div><h1>Falcom</h1></div>
<div><h2>Confirmation</h2></div>
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
            <h1 class="contact-title">入力内容確認</h1>
            <p>入力内容は以下の内容でよろしいですか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
            <div style="font-size:20px;">
		<div>
                    <label>時刻</label>
                    <p><?php echo $time; ?></p>
                </div>
		<div>
		    <label>TP</label>
		    <p><?php echo $timestamp; ?></p>
		</div>
                <div>
                    <label>出退勤</label>
		    <?php if($sex=="出勤"){$color="red";}else{$color="blue";} ?>
                    <p><font color="<?php echo $color?>"><b><?php echo $sex ?></b></font></p>
                </div>
                <div>
                    <label>氏名</label>
                    <p><?php echo $item; ?></p>
                </div>
            </div>
		<input type="button" value="内容を修正する" onclick="history.back(-1)">
		<button type="submit" name="submit">登録する</button>
	</form>
</div>
</body>
</html>
