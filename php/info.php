<?php
	header("Content-Type: text/html; charset=utf-8");

	printf ("物品信息<br>");
	$adId = $_GET['adId'];
	$categoryId = $_GET['categoryId'];
	// $ad = getAd($categoryId,$adId);
	$ad = array('id' => '1','标题'=>"NokiaXXX跳楼价",'内容' => "X成新，水货，欲购从速",'价格' => "1200",'QQ' =>"129078923" );
	foreach ($ad as $key => $value) {
		printf ("%s : %s <br>", $key, $value);
	}
?>