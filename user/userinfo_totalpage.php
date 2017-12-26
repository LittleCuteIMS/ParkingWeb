<?php
include_once 'link1.php';
$mobile=$_POST['mobile'];
//$mobile="1";
$sql="select * from user where mobile like '%$mobile%'";
$result=mysqli_query($link, $sql);
$num=mysqli_num_rows($result);
$data=array("num"=>$num);
$json=json_encode($data);
echo $json;
?>