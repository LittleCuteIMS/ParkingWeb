<?php
/*
 * 查询车牌号向客户端返回查询到的车牌号
 * written by 荣誉婷
 */
include_once 'link1.php';
include_once '../mysql_db/mysqliBySql.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"mobile":17867856434}';
//$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
//根据电话号码查找用户id
$result= mysqli_query($link,"select * from user where mobile=$userTelephone");
if (mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
    $userId=$row['id'];
    //echo $userId;
}else{
    echo "FAILURE1";
}
$sql="SELECT * FROM car WHERE user_id='$userId'";  //在car表中查询对应用户id

$result=selectBySql($sql);
if($result != false)                                     //查询的行数不为0，就进行遍历输出
{
    echo $result;
}else {
    echo'FAILURE2';
}
?>
