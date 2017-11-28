<?php
/*
 *（需要接收的数据是手机号码）
 * 用户查询所有的停车消费记录，将查询到的消费记录返回给用户
 * written by 荣誉婷 on Nov 28,2017
 * 
 */
include_once '../user/link1.php';
include_once '../mysql_db/mysqliBySql.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"mobile":"1638983752"}';
//$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
$sql1="select id from user where mobile='$userTelephone'";    //先去user表中找到对应的用户id
$result=mysqli_query($link, $sql1);
$row=mysqli_fetch_assoc($result);
$userId=$row['id'];
if(empty($userId))                            //判断查询结果的情况，若为空则说明用户不存在，不为空则说明存在
{
    echo "该用户不存在";
}else{
    $sql2="select trading_record.plate_number,trading_record.park_id,trading_record.datetime,trading_record.amount 
           from trading_record where user_id='$userId'";
    $out=selectBySql($sql2);                  //根据user_id查询该车牌号的所有的停车消费情况
    if($out==true)
    {
        echo $out;                         //返回消费情况（json格式的）
    }else{
        echo "查询失败或没有该用户的消费记录";
    }
}