<?php
	include '../mysql_db/mysqliBySql.php';
	
	$json = file_get_contents('php://input');
	$arr = json_decode($json,true);
	$userPhone=$arr['mobile'];
    $sql="select balance from user where mobile='".$userPhone."'";
    $jsonData=selectBySql($sql);//查询结果为json格式数据
	if($jsonData != false){
		$userinfo=json_decode($jsonData,true);
		$balance=$userinfo[0]['balance'];
		echo $balance;
	}else{
	    echo "0";
	}
?>