<?php
/*
 * （需要接收的数据为用户车牌号）
 * 根据车牌号查询停车记录(数据应该是会返回给手机的）
 * 
 * written by 荣誉婷on Nov 25,2017
 * 
 */
include_once '../user/link1.php';
include_once '../mysql_db/mysqliBySql.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"mobile":"18281623534"}';
//$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
//echo $userTelephone;
$sql1="select user.id from user where mobile='$userTelephone'";
$result1=mysqli_query($link, $sql1);
$row1=mysqli_fetch_assoc($result1);
$userId=$row1['id'];
$sql2="select car.plate_number from car where user_id='$userId'";
$result2=mysqli_query($link, $sql2);
$row2=mysqli_fetch_assoc($result2);
$plateNumber=$row2['plate_number'];
$sql3="select * from parking_record where plate_number='".$plateNumber."'";
$out=selectBySql($sql3);
if($out==true)
{
    echo $out;
}else {
    echo "失败";
}
?>