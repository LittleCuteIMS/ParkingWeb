<?php
/*
 * （需要接收的数据为车牌号）
 * 根据车牌号查询停车记录(数据应该是会返回给手机的）
 * 注：这里只能根据车牌号查询，因为一个电话号码可以对应多个车牌号
 * 
 * written by 荣誉婷on Nov 25,2017
 * 
 */
include_once '../user/link1.php';
include_once '../mysql_db/mysqliBySql.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"plate_number":"川B23123"}';
//$arr=(array)json_decode($json);
$plateNumber=$arr['plate_number'];
//echo $plateNumber;
$sql="select * from parking_record where plate_number='".$plateNumber."'";
$out=selectBySql($sql);
if($out==true)
{
    echo $out;
}else {
    echo "失败";
}
?>