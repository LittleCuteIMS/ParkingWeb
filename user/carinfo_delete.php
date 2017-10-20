<?php
/*
 * 删除车辆信息
 * 
 */
include_once 'link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"plate_number":"川B22T34","mobile":13272521765}';
//$arr=(array)json_decode($json);
$plateNumber=$arr['plate_number'];
$userTelephone=$arr['mobile'];
//根据电话号码查找用户id
$result= mysqli_query($link,"select * from user where mobile=$userTelephone");
if (mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
    $userId=$row['id'];
}else{
    echo "FAILURE";
}
$sql="SELECT * FROM car WHERE user_id='$userId' AND plate_number='$plateNumber'";
$result=mysqli_query($link, $sql);
if(mysqli_num_rows($result)==1)
{
    $sql = "DELETE FROM car WHERE user_id= '$userId' AND plate_number='$plateNumber'  ";
    mysqli_query($link,$sql);
    $sqr="SELECT * FROM car WHERE user_id='$userId' AND plate_number='$plateNumber'"; //检查删除操作是否成功
    $result=mysqli_query($link, $sqr);
    if(mysqli_num_rows($result)==0)
    {
        echo 'SUCCEED';
    }else{
        echo 'FAILURE';
    }
    //关闭数据库
    mysqli_close($link);
}
else {
    echo'FAILURE';
}