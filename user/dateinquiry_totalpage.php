<?php
/*
 * 根据时间查询用户信息，返回给定时间范围内的记录总条数
 * written by 荣誉婷
 */
include_once 'link1.php';
$date1=$_POST['date1'];
$date2=$_POST['date2']; 
//$date1="2017-10-01";
//$date2="2017-11-09";
$sql="select * from user where regis_date between '$date1' and '$date2'";
$result=mysqli_query($link, $sql);
$num=mysqli_num_rows($result);
$data=array("num"=>$num);
$json=json_encode($data);
echo $json;
?>