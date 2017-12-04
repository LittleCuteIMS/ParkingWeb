<?php
/*
 * 查询车牌号向客户端返回查询到的车牌号
 * written by 荣誉婷
 */
include_once 'link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"mobile":17867856434}';
//$arr=(array)json_decode($json);
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
$result=mysqli_query($link, $sql);
$datarow=mysqli_num_rows($result);
if($datarow>=1)                                     //查询的行数不为0，就进行遍历输出
{
    for($i=0;$i<$datarow;$i++)
     { 
         $result_arr = mysqli_fetch_assoc($result);
         $plateNumber=$result_arr['plate_number'];
         $remarks=$result_arr['remarks'];
         $jsonarr=array('plate_number'=>$plateNumber,'remarks'=>$remarks);//将带输出内容放到数组中，以键值对的形式，方便后面转化成json数组
         $json=json_encode($jsonarr,JSON_UNESCAPED_UNICODE);//转换成json数组
         echo $json;
     }
     mysqli_close($link);
}else {
    echo'FAILURE2';
}
?>
