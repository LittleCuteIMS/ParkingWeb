
<?php 
 /* 
  * 查询车牌号向客户端返回查询到的车牌号 
  * written by 荣誉婷 
  */ 
 include_once 'link1.php'; 
 include_once '../mysql_db/mysqliBySql.php'; 
 $json = file_get_contents('php://input');  //接收json数据 
 $arr = json_decode($json,true); 
//  $json ='{"mobile":"13551374417"}'; 
//  $arr=(array)json_decode($json); 
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
$result1=mysqli_query($link, $sql); 
$jarr = array();//说明$jarr是一个数组

while ($row = mysqli_fetch_array($result1)) {
    $count=count($row);   //不能在循环语句中，由于每次删除 row数组长度都减小
    for($i=0;$i<$count;$i++){
        unset($row[$i]);  //删除冗余数据
    }
    array_push($jarr,$row);
}

$json=json_encode($jarr, JSON_UNESCAPED_UNICODE);//将数组进行json编码,防止中文乱码

echo $json;
