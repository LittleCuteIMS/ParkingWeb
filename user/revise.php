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
//$arr = json_decode($json,true);
$json = '{"mobile":17867856434,"newpassword":"676drf","oldpassword":"123e4r"}'; 
$arr=(array)json_decode($json);
$newPassWord=$arr['newpassword'];
$oldPassWord=$arr['oldpassword'];
$userTelephone=$arr['mobile'];
$sql="SELECT * FROM user WHERE mobile='$userTelephone' AND password='$oldPassWord'";
$result=mysqli_query($link, $sql); 
if(mysqli_num_rows($result))
{
    $sql = "UPDATE user SET password = '$newPassWord' WHERE mobile = '$userTelephone' ";
    mysqli_query($link,$sql);
    echo '密码修改成功！';
    # 关闭数据库
   mysqli_close($link);
}
else {
   echo'原始密码错误，请重新输入';
}
?>