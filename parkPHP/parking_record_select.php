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
$sql1="select user.id from user where mobile='$userTelephone'";
$result1=mysqli_query($link, $sql1);
$row1=mysqli_fetch_assoc($result1);
$userId=$row1['id'];
$sql2="select car.plate_number from car where user_id='$userId'";
$result2=mysqli_query($link, $sql2);
$row2=mysqli_fetch_assoc($result2);
$plateNumber=$row2['plate_number'];
$sql3="select * from parking_record where plate_number='".$plateNumber."'";
$result3=mysqli_query($link, $sql3);
$jarr = array();
while ($row = mysqli_fetch_array($result3)){
    $count=count($row);//不能在循环语句中，由于每次删除 row数组长度都减小
    for($i=0;$i<$count;$i++){
       unset($row[$i]);//删除冗余数据
    }
    array_push($jarr,$row);
}
$json=json_encode($jarr, JSON_UNESCAPED_UNICODE);//将数组进行json编码,防止中文乱码

echo $json;

?>