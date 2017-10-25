<?php
//接受空闲车位变化信息
if(isset($_GET['id']))
    $parkID=$_GET['id'];
if(isset($_GET['numNow']))
    $carportFreeNum=$_GET['numNow'];
include '../mysql_db/mysqliBySql.php';

//模拟接受空闲车位的变化信息
$carportFreeNum=67;
$parkID=10;

$sql="update park set carport_free_num = '".$carportFreeNum."' where id = '".$parkID."'";

$result=updateBySql($sql);
if($result){
    echo '更新成功';
}else{
    echo '更新失败';
}
?>