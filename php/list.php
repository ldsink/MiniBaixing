<?php
	require "MyDB.php";
	header("Content-Type: text/html; charset=utf-8");
	$categoryId = $_GET['category'];
	echo "$categoryId";
	$listArray = MyDB::getList($categoryId);
	// $listArray = array(	array("id", "标题","内容","价格","QQ"), 
	// 					array("1","NokiaXXX跳楼价","X成新，水货，欲购从速","1200","129078923"),
	// 					array("2","三星S40","可当盾牌！","2345","123353421"),
	// 					array("3","苹果20S出售","全新港行，提供担保，欲购从速","5432","123537624"),
	// 					array("4","兜售小米6","balabalbalabala","7832","136576542"));
	echo $categoryId;
	echo "分类列表：<br>";
	echo "<table border='1'>";

	$arrayTitle = $listArray[0];

	// 输出标题
	echo "<tr>";
	for ($i = 0 ; $i < 4 && $i < count($arrayTitle); $i++ )
	{ 
		printf("<td>%s</td>",$arrayTitle[$i]);
	}
	echo "</tr>";	

	// 输出每一项
	for ($j = 1 ; $j < count($listArray); $j++ )
	{
		$arrayItem = $listArray[$j];
		echo "<tr>";
		$infoId = $arrayItem[0];
		for ($i = 0 ; $i < 4 && $i < count($arrayItem); $i++ )
		{ 
			echo "<td>";
			if($i == 1)
			{
				printf("<a href=\"info.php?adId=%s&categoryId=%s\">%s</a><br>\n", $infoId, $categoryId, $arrayItem[$i]);
			}
			else
				echo $arrayItem[$i];
			echo "</td>";
		}
		echo "</tr>";	
	}
	echo "</table>";
	printf("<form name=\"input\" action=\"post.php?categoryId=%s\" method=\"post\">",$categoryId);
	printf("<input type=\"submit\" value=\"发布新信息\">");
	printf("</form>")
?>