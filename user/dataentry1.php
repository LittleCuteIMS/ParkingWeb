<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
	/*
	 * 此文件用于获取由Android端传过来的json数据，并对json数据进行转化，转换成为php识别的数组
	 * 转换成功后定义变量对数组中的数据进行取值，连接数据库，将对应变量存入数据库
	 * 注册时间为服务器端根据date()进行取值，再对获取的时间戳进行格式化，转化为便于认知的时间
	 * 数据录入后，检查数据是否录入成功，将检查结果进行json转化，反馈给客户端
	 * 
	 */
	include_once '../mysql_db/Insert.php';
	
	$json = file_get_contents('php://input');                         //接收json数据
	//$arr = json_decode($json, true);
	//$json = '{"nick_name":"张连","password":"6735y6drf","mobile":16892095267}';    （测试用的）
	$arr=(array)json_decode($json);
	$nickName=$arr['nick_name'];
	$passWord=$arr['password'];
	
	if(strlen($arr['mobile'])==11){                         //判断号码是否为11位
	    $userTelephone=$arr['mobile'];
	}
	else{
	    Response::json(0,"号码不正确");
	}
	
	time()."<br>";                                         //获取日期
	$regisDate=date("Y-m-d");                                 //格式化日期                               
	
	$insert = new Insert();
	$insert->insert_user('intelligentparking','$nickName','$regisDate','$passWord','$userTelephone');//向user表录入数据

	
	include_once '../mysql_db/Select.php';

	$select = new Select();
	//检查数据是否录入成功，若成功反馈信息给客户端
	$new=$select->select_user('intelligentparking','mobile','$userTelephone');
	
	$datarow = mysqli_num_rows($new);
	if($datarow==1){
	    $data=mysqli_fetch_array($new);
	    $result=array();
	    $result[]=$data;
	    Response::json(1,"注册成功",$result);
	}
	else {
	    Response::json(0,"注册失败");
	}
	mysqli_close($link);
?>
</body>
</html>

