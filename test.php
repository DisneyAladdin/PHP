<?php
echo date("Y/m/d H:i:s")."<br>";
date_default_timezone_set('Asia/Tokyo');
// 秒 sec
//echo '<body style="font-size:50px;background:blue">';
echo date("Y-m-d H:i:s") ." 現在\n<br>";
//echo date("Y-m-d H:i:s", strtotime("-3 sec")) ." 3秒前\n<br>";
//echo date("Y-m-d H:i:s", strtotime("-2 sec")) ." 2秒前\n<br>";
//echo date("Y-m-d H:i:s", strtotime("-1 sec")) ." 1秒前\n<br>";
//echo date("Y-m-d H:i:s", strtotime("1 sec")) ." 1秒後\n<br>";
//echo date("Y-m-d H:i:s", strtotime("2 sec")) ." 2秒後\n<br>";
//echo date("Y-m-d H:i:s", strtotime("3 sec")) ." 3秒後\n<br>";

// UNIX TIMESTAMPを[$timestamp]という変数に格納する
	$timestamp = time() ;

	// 出力する
	echo $timestamp ;


?>
<meta charset="utf-8">
<script src="JS.js"></script>
<p id="RealtimeClockArea2"></p>

