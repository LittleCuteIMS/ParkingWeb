<?php
/*
 * 查询车牌号
 * 
 */
include_once 'link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"mobile":13272521765}';
//$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
//根据电话号码查找用户id
$result1= mysqli_query($link,"select * from user where mobile=$userTelephone");
if (mysqli_num_rows($result1)==1)
{
    $row=mysqli_fetch_assoc($result1);
    $userId=$row['id'];
    //echo $userId;
}else{
    echo "FAILURE";
}
$sql="SELECT * FROM car WHERE user_id='$userId'";  //在car表中查询对应用户id
$result2=mysqli_query($link, $sql);
$datarow=mysqli_num_rows($result2);
if($datarow>=1)                                     //查询的行数不为0，就进行遍历输出
{
    for($i=0;$i<$datarow;$i++)
     { 
         $result_arr = mysqli_fetch_assoc($result2);
         $plateNumber=$result_arr['plate_number'];
         echo $plateNumber;
         echo"<br>";
     }
     mysqli_close($link);
}else {
    echo'FAILURE';
}
?>
