<?php
include_once '../mysql_db/mysqliBySql.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
// $json ='{"park_id":"11"}';
// $arr=(array)json_decode($json);
$parkID=$arr['park_id'];
$sql="SELECT name,phone,charge FROM park WHERE id='".$parkID."'";
$result=selectBySql($sql);
if($result != false){
    echo $result;
}else{  
    echo 'FALSE';
}
