<?php
	require "MyDB.php";
	header("Content-Type: text/html; charset=utf-8");
	echo "<a href='index.php'><img src='img/logo.png'/></a><br>";
	printf ("物品信息<br>");
	$adId = $_GET['adId'];
	$categoryId = $_GET['categoryId'];
	$ad = MyDB::getAd($categoryId,$adId);
	foreach ($ad as $key => $value) {
		printf ("%s : %s <br>", $key, $value);
	}
?>