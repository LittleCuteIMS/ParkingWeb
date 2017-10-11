<?php
	
	$q=$_GET["q"];

	if ( isset($q) ) {
		include_once "../mysql_db/Select.php";

		$select = new Select();

		echo "<p>";
		echo "<table style='text-align:center;' border='1'>";
		echo "<tr valign='top' height='60'>"; 
		echo "<td width='12%'>id</td>";
		echo "<td width='20%'>昵称</td>";
		echo "<td width='20%'>余额</td>";
		echo "<td width='28%'>注册日期</td>";
		echo "<td width='20%'>手机号</td>";
		echo "</tr>"; 

		$select->select_user("intelligentparking","id","$q");
	}

?>