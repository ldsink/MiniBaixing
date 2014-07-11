<?php
	require "MyDB.php";
	header("Content-Type: text/html; charset=utf-8");
	echo "<a href='index.php'><img src='img/logo.png'/></a><br>";
	$categoryArray = MyDB::getCategory();
	$i = 0;
	echo "<table>";
	foreach ($categoryArray as $key => $value) {
		if($i % 8 == 0)
			echo "<tr>";
		printf("<td><a href=\"list.php?category=%s\">%s</a></td>\n", $key, $value);
		if($i % 8 == 7)
			echo "</tr>";
		$i++;
	}
	echo "</table>";
?>