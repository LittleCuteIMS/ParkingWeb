<?php 
/*
 * 修改车牌号
 * written by 荣誉婷
 */
include_once 'link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"plate_number1":"川B22T22","plate_number2":"川B22T21","mobile":13272521765}';
//$arr=(array)json_decode($json);
$plateNumber1=$arr['plate_number1'];
$plateNumber2=$arr['plate_number2'];
$userTelephone=$arr['mobile'];
//根据电话号码查找用户id
$result= mysqli_query($link,"select * from user where mobile=$userTelephone");
if (mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
    $userId=$row['id'];
  //echo $userId;
}else{
    echo "FAILURE";
}
$sql="SELECT * FROM car WHERE user_id='$userId' AND plate_number='$plateNumber1'";
$result=mysqli_query($link, $sql);
if(mysqli_num_rows($result))
{
    $sql = "UPDATE car SET plate_number= '$plateNumber2' WHERE plate_number='$plateNumber1'  ";
    mysqli_query($link,$sql);
    echo 'SUCCEED';
//关闭数据库
    mysqli_close($link);
}
else {
    echo'FAILURE';
}
?>
