<?php
	include '../mysql_db/mysqliBySql.php';
	
	$userPhone=$_GET['userPhone'];
	//$userPhone="18782003437";
    $sql="select * from user where mobile='".$userPhone."'";
    
    $jsonData=selectBySql($sql);//查询结果为json格式数据
	echo $jsonData;//将json数据发送到浏览器
?>