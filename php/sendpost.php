<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require "MyDB.php";
		header("Content-Type: text/html; charset=utf-8");

		$categoryId = $_GET['categoryId'];
		$adAttr = MyDB::getFields($categoryId);
		$addAd = array();

		$addAd['id'] = $categoryId;
		foreach ($adAttr as $key => $value){
			$addAd[$value] = $_POST[$value];
		}
		//print_r($addAd);
		MyDB::addAd($addAd);
		printf("<br>");
		printf("<a href=\"list.php?category=%s\">返回</a>" ,$categoryId);
		$url = "list.php?category=";
		$url .= $categoryId; 
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href='$url'"; 
		echo "</script>"; 
	?>
</body>
</html>