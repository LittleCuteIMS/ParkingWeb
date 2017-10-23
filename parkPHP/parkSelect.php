<?php
include '../mysql_db/selectBySql.php';

$mode=$_GET['mode'];
$parkName=$_GET['parkName'];

if($mode='all'){
    $sql="select * from park";
}else{
    $sql="select * from park where name='".$parkName."'";
}

$jsonData=selectBySql($sql);//查询结果为json格式数据

echo $jsonData;//将json数据发送到浏览器
?>