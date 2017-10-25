<?php
/*
 * 用户修改密码
 * written by 荣誉婷
 */
include_once 'link1.php';
$json = file_get_contents('php://input');  //
$arr = json_decode($json,true);
//$json ='{"oldpassword":"1111yu","newpassword":"66666","mobile":17867856434}';
//$arr=(array)json_decode($json);
$newPassWord=$arr['newpassword'];
$oldPassWord=$arr['oldpassword'];
$userTelephone=$arr['mobile'];
$sql="SELECT * FROM user WHERE mobile='$userTelephone' AND password='$oldPassWord'";
$result=mysqli_query($link, $sql);
if(mysqli_num_rows($result))
{
    $sql = "UPDATE user SET password = '$newPassWord' WHERE mobile = '$userTelephone' ";
    mysqli_query($link,$sql);
       echo 'SUCCEED';
       mysqli_close($link);
}
else {
      echo'FAILURE';
}
?>