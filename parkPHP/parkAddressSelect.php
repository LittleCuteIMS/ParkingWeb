<?php
/*
 * 查询停车场位置
 */
include_once "../mysql_db/Select.php";
include_once '../user/link1.php';

//$json = file_get_contents('php://input');  //接收json数据
//$arr = json_decode($json,true);
//$json = '{"mobile":18782003437}'; 
//$arr=(array)json_decode($json);
//$userTelephone=$arr['mobile'];

$con = mysqli_connect("localhost","root","","intelligentparking");
if (!$con){
    die('Could not connect: ' . mysqli_connect_error());
}

//避免存入数据库乱码
$sql="set character set 'UTF8'";
$result1 = mysqli_query($con,$sql);;
$sql="set names 'UTF8'";
$result1 = mysqli_query($con,$sql);

$sql="SELECT * FROM park ";
$result1 = mysqli_query($con,$sql);
    
$jarr = array();//说明$jarr是一个数组

while ($row = mysqli_fetch_array($result1)) {
    $count=count($row);   //不能在循环语句中，由于每次删除 row数组长度都减小  
    for($i=0;$i<$count;$i++){  
        unset($row[$i]);  //删除冗余数据
    }
    array_push($jarr,$row);
}

$json=json_encode($jarr,JSON_UNESCAPED_UNICODE);//将数组进行json编码,防止中文乱码

echo $json;

?>