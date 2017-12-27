<?php
include_once '../user/link1.php';
$date1=$_POST['date1'];
$date2=$_POST['date2'];
//$date1="2017-10-01";
//$date2="2017-12-09";
$sql="select * from admin_log where log_date between '$date1' and '$date2'";
$result=mysqli_query($link, $sql);
$num=mysqli_num_rows($result);
$data=array("num"=>$num);
$json=json_encode($data);
echo $json;