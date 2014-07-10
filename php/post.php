<?php
	require "MyDB.php";
	header("Content-Type: text/html; charset=utf-8");

	$categoryId = $_GET['categoryId'];
	printf ("新增%s<br>", $categoryId);

	$adAttr = MyDB::getFields($categoryId);
	//$adAttr = array("标题","内容","价格","QQ");
	printf("<form name=\"input\" action=\"sendpost.php?categoryId=%s\" method=\"post\">",$categoryId);
	foreach ($adAttr as $key => $value){
		echo "$value:<br>";
		printf("<input type='text' name='%s'><br>", $value);
	}
	printf("<input type='submit' name='提交'><br>");
	printf("</form>")
?>