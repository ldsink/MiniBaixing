<<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		header("Content-Type: text/html; charset=utf-8");

		$categoryId = $_GET['categoryId'];
		// $adAttr = getFields($categoryId);
		$adAttr = array("标题","内容","价格","QQ");
		$addAd = array();

		$addAd['id'] = $categoryId;
		foreach ($adAttr as $key => $value){
			$addAd[$value] = $_POST[$value];
		}
		print_r($addAd);
		// addAd($addAd);
		exit;
	?>
</body>
</html>
<?php 
$url = "index.php"; 
echo "<script language='javascript' type='text/javascript'>"; 
echo "window.location.href='$url'"; 
echo "</script>"; 
?>