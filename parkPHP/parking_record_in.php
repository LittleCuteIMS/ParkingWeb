<?php
/*
 * 
 * 车辆进入过程信息录入（需要接收的数据包括车牌号、进入时间、停车场编号）
 * written by荣誉婷 on Nov 25,2017
 */
include_once '../mysql_db/mysqliBySql.php';
include_once '../user/link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"park_id":"14","plate_number":"川B00C00","in_datetime":"2017-11-10 10:31:20"}';
//$arr=(array)json_decode($json);
$parkId=$arr['park_id'];
$plateNumber=$arr['plate_number'];
$dateTime=$arr['in_datetime'];
$a=strtotime($dateTime);        //将字符串类型的时间转为时间戳
$inDateTime=date("Y-m-d H:i:s",$a); //将时间戳表示为时间日期格式
$confirmSql="select * from car where plate_number='".$plateNumber."'"; //在car表中查询是否存在这个车牌号
$out=selectBySql($confirmSql);
if($out==true)
{
    $sql="INSERT INTO parking_record(park_id,plate_number,in_datetime)
          VALUES ('$parkId','".$plateNumber."','$inDateTime')";
    $result=insertBySql($sql);
    if($result==true)
    {
        echo "录入成功";
    }else{
        echo "录入失败";
    }
    
}else{
    echo "FAILURE";
}
?>

