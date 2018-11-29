<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>労働時間の確認</title>
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="contact.js"></script>
</head>
<body>
<div><h1>Falcom</h1></div>
<div><h2>給与の計算</h2></div>



<div>
	<form action="call_python.php" method="post" name="form" onsubmit="return validate()">
		<h1 class="contact-title">労働時間の確認</h1>
		<p>氏名，年月を選択の上、「確認」ボタンをクリックしてください。</p>
		<div>
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
				<label>年月<span>必須</span></label>
				<input type="month" style="position: relative; left: 80px; top: 10px; width:150px; height:40px;" name="month" value="">
			</div>
		</div>


	<!--	<script>
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
