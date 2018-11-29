<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>出勤・退勤の管理</title>
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="contact.js"></script>
</head>
<body>


<div><h1>Falcom</h1></div>
<div><h2>出勤・退勤の管理</h2></div>

<div>
	<form action="confirm.php" method="post" name="form" onsubmit="return validate()">
		<h1 class="contact-title">出退勤管理システム</h1>
		<p>氏名，種別を選択の上、「確認画面へ」ボタンをクリックしてください。</p>
		<div style="font-size:15px;">
			<div>
			<script>function koshin(){location.reload();}</script>
				<label>時刻更新<span>必須</span></label>
				<input style="position: relative; left:-160px; top:0px; width:100px; height:40px;" type="button" value="押してね" onclick="koshin()">
			</div>
			<div>
				<label>現在時刻</label>
				<?php
				date_default_timezone_set('Asia/Tokyo');
				$time = date("Y/m/d H:i:s");
				//echo $time."\n<br>";
				?>
				<input type="hidden" name="time" value="<?php echo $time;?>"> <font style="position:relative;left:20px;top:0px;"><?php echo $time;?></font>
			</div>
			<div>
				<label>TP</label>
				<?php
				$timestamp = time();
				?>
				<input type="hidden" name="timestamp" value="<?php echo $timestamp;?>"><font style="position:relative;left:20px;top:0px;"> <?php echo $timestamp;?></font>
			</div>
			<div>
				<label>氏名<span>必須</span></label>
				<select name="item">
					<option value="">名前を選択してください</option>
					<option value="古瀬京介">古瀬京介</option>
					<option value="川畑修人">川畑修人</option>
					<option value="谷中翔太">谷中翔太</option>
					<option value="畠山拓美">畠山拓美</option>
				</select>
			</div>
			<div>
				<label>種別<span>必須</span></label>
				<input type="radio" name="sex" value="出勤" checked> 出勤
				<input type="radio" name="sex" value="退勤"> 退勤
			</div>
		</div>


		<!--<script>
			//更新
			function koshin(){
			location.reload();
			}
		</script>
		<input type="button" value="時刻の更新" onclick="koshin()">-->
		<button type="submit">確認画面へ</button>
	</form>
</div>
</body>
</html>
