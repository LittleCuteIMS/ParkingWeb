<?php
/*
 * 登录验证
 * written by 荣誉婷
 */
include_once 'link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json = '{"mobile":13551324125,"password":"123"}'; 
//$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
$passWord=$arr['password'];
$sql="SELECT * FROM user WHERE mobile='".$userTelephone."' AND password='".$passWord."'";
$result=mysqli_query($link, $sql); 
if(mysqli_num_rows($result))
{
    echo 'SUCCEED';
}
else{
    echo 'FAILURE';
}
?>