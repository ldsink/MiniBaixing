<?php
	require "MyDB.php";
	header("Content-Type: text/html; charset=utf-8");
	echo "<a href='index.php'><img src='img/logo.png'/></a><br>";
	$categoryId = $_GET['categoryId'];
	printf ("新增%s<br>", $categoryId);

	$adAttr = MyDB::getFields($categoryId);
	printf("<form name=\"input\" action=\"sendpost.php?categoryId=%s\" method=\"post\">",$categoryId);
	foreach ($adAttr as $key => $value){
		echo "$value:<br>";
		printf("<input type='text' name='%s'><br>", $value);
	}
	printf("<input type='submit' name='提交'><br>");
	printf("</form>")
?>