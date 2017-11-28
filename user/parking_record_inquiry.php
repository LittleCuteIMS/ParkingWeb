<?php
/*
 * 接收客户端发来的停车历史查询请求，在parking_record表中查找信息并返回给客户端
 * written by 荣誉婷
 */
include_once 'link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"mobile":1638983752}';
//$arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
//根据电话号码查找用户id
$result1= mysqli_query($link,"select * from user where mobile=$userTelephone");
if (mysqli_num_rows($result1)==1)
{
    $row=mysqli_fetch_assoc($result1);
    $userId=$row['id'];
    $result2=mysqli_query($link,"select * from car where user_id=$userId");
    if (mysqli_num_rows($result2)==1)
    {
        $row=mysqli_fetch_assoc($result2);
        $plateNumber=$row['plate_number'];
        $result3=mysqli_query($link,"select * from parking_record where plate_number='$plateNumber'");
        if(mysqli_num_rows($result3)==1)
        {
            $row=mysqli_fetch_assoc($result3);
            $plateNumber=$row['plate_number'];
            $parkId=$row['park_id'];
            $inDateTime=$row['in_datetime'];
            $outDateTime=$row['out_datetime'];
            //写成键值对数组，方便后面转换成json
            $jsonarr=array('plate_number'=>$plateNumber,'park_id'=>$parkId,'in_datetime'=> $inDateTime,'out_datetime'=>$outDateTime);
            $json=json_encode($jsonarr,JSON_UNESCAPED_UNICODE);
           echo $json;
        }else{
            echo'FAILURE';
        }
    }else{
        echo'FAILURE';
    }
}else{
    echo'FAILURE';
}

?>