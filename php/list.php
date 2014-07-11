<html>
<link rel="stylesheet" href="/css/buttons.css">
<?php
	require "MyDB.php";
	header("Content-Type: text/html; charset=utf-8");
	$categoryId = $_GET['category'];
	$listArray = MyDB::getList($categoryId);
	echo "<a href='index.php'><img src='img/logo.png'/></a><br>";
	echo "<h2>分类列表：</h2>";

	echo "<div>";
	echo "<link rel=\"stylesheet\" href=\"css/buttons.css\">";
	echo ("<form name=\"input\" action=\"post.php?categoryId={$categoryId}\" method=\"post\">");
	echo ("<input type=\"submit\" value=\"发布新信息\" class=\"button button-flat-primary\" style=\"color:white\">");
	echo ("</form>");
	echo "</div>";

	echo "<table>";
	$arrayTitle = $listArray[0];
	// 输出标题
	echo "<tr>";
	for ($i = 0, $j = count($arrayTitle); $i < 5 && $i < $j; $i++)
	{ 
		printf("<th>%s</th>",$arrayTitle[$i]);
	}
	echo "</tr>";	

	// 输出每一项
	for ($j = 1 ,$ii = count($listArray); $j < $ii; $j++ )
	{
		$arrayItem = $listArray[$j];
		echo "<tr>";
		$infoId = $arrayItem[0];
		for ($i = 0 , $iii = count($arrayItem) ; $i < 5 && $i < $iii ; $i++ )
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
?>
</html>