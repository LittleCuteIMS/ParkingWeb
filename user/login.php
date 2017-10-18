<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
/*
 * 修改密码，接收来自客户端的json（原始密码，电话号码以及新密码）在数据库中进行查找比对，
 * 若存在则进行新密码的修改，若不存在则反馈——原始密码错误
 */
include_once 'link1.php';
//$json = file_get_contents('php://input');  //接收json数据
//arr = json_decode($json,true);
$json = '{"mobile":19890765674,"password":"6790y"}'; 
$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
$passWord=$arr['password'];
$sql="SELECT * FROM user WHERE mobile='$userTelephone' AND password='$passWord'";
$result=mysqli_query($link, $sql); 
if(mysqli_num_rows($result))
{
    echo 'true';
}
else{
    echo 'false';
}
?>