<?php
// Zhou Cheng
// July 10, 2014

class MyDB {
	static public function getCategory() {
		$db = new SQLite3("category.sqlite");
		$sql = <<<EOF
SELECT * FROM category;
EOF;
		$ret = $db->query($sql);
		$ans = array();
		while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
			$ans[$row['englishName']] = $row['name'];
		}
		$db->close();
		return $ans;
	}
	
	static public function getList($categoryId) {
		$categoryId = SQLite3::escapeString($categoryId);
		$ans = array();
		$field = array_merge(array("id"), MyDB::getFields($categoryId));
		$ans []= $field;
		MyDB::initCategory($categoryId);
		$table = "category_" . $categoryId;
		$db = new SQLite3("category.sqlite");
		$sql = "SELECT * FROM {$table}";
		$ret = $db->query($sql);
		$field_len = count($field);
		while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
			$line = array();
			for ($i = 0; $i < $field_len; $i ++) {
				$line []= $row[$field[$i]];
			}
			$ans []= $line;
		}
		$db->close();
		return $ans;
	}

	public static function getFields($categoryId) {
		$db = new SQLite3("category.sqlite");
		$sql = "SELECT * FROM category WHERE englishName = '{$categoryId}';";
		$ret = $db->query($sql);
		$row = $ret->fetchArray(SQLITE3_ASSOC);
		$field = $row['fields'];
		$field = explode(',', $field);
		$db->close();
		return $field;
	}

	public static function getAd($categoryId, $adId) {
		$categoryId = SQLite3::escapeString($categoryId);
		$adId = SQLite3::escapeString($adId);
		$table = "category_" . $categoryId;
		$sql = "SELECT * FROM {$table} WHERE id = {$adId}";
		$db = new SQLite3("category.sqlite");
		$ret = $db->query($sql);
		$ans = $ret->fetchArray(SQLITE3_ASSOC);
		$db->close();
		return $ans;
	}
	
	public static function addAd($AdInfo) {
		$categoryId = $AdInfo['id'];
		$categoryId = SQLite3::escapeString($categoryId);
		$table = "category_" . $categoryId;
		$field = MyDB::getFields($categoryId);
		$i = 1;
		$j = count($field);
		$sql = "INSERT INTO {$table} (";
		$sql .= "'" . SQLite3::escapeString($field[0]) . "'";
		for ($i = 1; $i < $j; $i ++)
			$sql .= ",'" . SQLite3::escapeString($field[$i]) . "'";
		$sql .= ") VALUES (";
		$sql .= "'" . SQLite3::escapeString($AdInfo[$field[0]]) . "'";
		for ($i = 1; $i < $j; $i ++)
			$sql .= ",'" . SQLite3::escapeString($AdInfo[$field[$i]]) . "'";
		$sql .= ");";
		$db = new SQLite3("category.sqlite");
		$db->exec($sql);
		$db->close();
	}
	
	private static function initCategory($categoryId) {
		$field = MyDB::getFields($categoryId);
		$table = "category_" . $categoryId;
		$sql = "CREATE TABLE IF NOT EXISTS '{$table}' 
			('id' INTEGER PRIMARY KEY AUTOINCREMENT";
		foreach ($field as $name) {
			$sql .= ",{$name} varchar(255) NOT NULL";
		}
		$sql .= ");";
		$db = new SQLite3("category.sqlite");
		$db->exec($sql);
		$db->close();
	}
}