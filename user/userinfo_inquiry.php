<?php
/*
 * 接收客户端传来的数据，在user表中查找信息，将用户的个人基本信息反馈给客户端
 * 
 */
include_once 'link1.php';
//$json = file_get_contents('php://input');  //接收json数据
//$arr = json_decode($json,true);
$json ='{"mobile":13272521765}';
$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
//根据电话号码查找用户id
$result= mysqli_query($link,"select * from user where mobile=$userTelephone");
if (mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
    $nickName=$row['nickname'];
    $userTelephone=$row['mobile'];
    $balance=$row['balance'];
    echo $nickName;
    echo $userTelephone;
    echo $balance;
    mysqli_close($link);
}else{
    echo'FAILURE';
}
?>