<?php
	require "MyDB.php";
	header("Content-Type: text/html; charset=utf-8");
	echo "BaiXing Category List<br>";
	$categoryArray = MyDB::getCategory();
	// $categoryArray = array("ershoushouji"=>"二手手机","ershouche"=>"二手车","zhaopin"=>"招聘");
	foreach ($categoryArray as $key => $value) {
		printf("<a href=\"list.php?category=%s\">%s</a><br>\n", $key, $value);
	}
?>