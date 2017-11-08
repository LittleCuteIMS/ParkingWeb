<?php
/*
 * 查询余额
 */
include_once '../user/link1.php';
//$json = file_get_contents('php://input');  //接收json数据
//$arr = json_decode($json,true);
$json = '{"mobile":18782003437}'; 
$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
$sql="SELECT * FROM user WHERE mobile='".$userTelephone."' ";
$result=mysqli_query($link, $sql); 
if($row = mysqli_fetch_array($result))
{
    echo $row['balance'];
}
else{
    echo 'FAILURE';
}
?>