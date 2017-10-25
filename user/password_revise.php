<?php
/*
 * 修改密码，接收来自客户端的json（原始密码，电话号码以及新密码）在数据库中进行查找比对，
 * 若存在则进行新密码的修改，若不存在则反馈——原始密码错误
 */
include_once 'link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"oldpassword":"676drf","newpassword":"1111yu","mobile":17867856434}'; 
//$arr=(array)json_decode($json);
$newPassWord=$arr['newpassword'];
$oldPassWord=$arr['oldpassword'];
$userTelephone=$arr['mobile'];
$sql="SELECT * FROM user WHERE mobile='$userTelephone' AND password='$oldPassWord'";//查找符合修改条件的一行
$result=mysqli_query($link, $sql); 
if(mysqli_num_rows($result))
{
    $sql = "UPDATE user SET password = '$newPassWord' WHERE mobile = '$userTelephone' ";//进行密码的修改
    mysqli_query($link,$sql);
    echo 'SUCCEED';
    //关闭数据库
   mysqli_close($link);
}
else {
   echo'FAILURE';
}
?>