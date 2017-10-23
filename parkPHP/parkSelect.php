<?php
include '../mysql_db/selectBySql.php';

$mode=$_GET['mode'];

if($mode=='all'){
    $sql="select * from park";
}elseif($mode=='part'){
    $parkName=$_GET['parkName'];
    $sql="select * from park where name='".$parkName."'";
}else{
	die('请确定查询模式');
}

$jsonData=selectBySql($sql);//查询结果为json格式数据

echo $jsonData;//将json数据发送到浏览器
?>