<?php
include_once '../mysql_db/mysqliBySql.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
// $json ='{"datetime":"2017-12-26 06:01:57","plate_number":"aaa"}';
// $arr=(array)json_decode($json);
$plateNumber=$arr['plate_number'];
$datetime=$arr['datetime'];
$a=strtotime($datetime);        //将字符串类型的时间转为时间戳
$inDateTime=date("Y-m-d H:i:s",$a); //将时间戳表示为时间日期格式
$sql="SELECT amount,name,charge,trading_record.id AS id
      FROM trading_record LEFT JOIN park ON trading_record.park_id=park.id
      WHERE datetime='$inDateTime' AND  plate_number='$plateNumber'";
$result=selectBySql($sql);
if($result != false){
    echo $result;
}else{
    echo "0";
}
