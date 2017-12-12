<?php
/**
 * @author蔡创
 * 功能：接受手机传来的意见反馈，存入数据库
 */
include_once '../mysql_db/mysqliBySql.php';
$json = file_get_contents('php://input');
$arr=json_decode($json,true);
$mobile=$arr['mobile'];
$info=$arr['suggestion'];
$feedTime=date("Y-m-d H:i:s",time());
$result=json_decode(selectBySql("SELECT id FROM user WHERE mobile='".$mobile."'"),true);
$userid=$result[0]['id'];
$result=insertBySql("INSERT INTO feedback(userid,feedback_time,feedback_content) VALUES('".$userid."','".$feedTime."','".$info."')");
if($result){
    echo 'success';
}else{
    echo 'fail';
}
?>