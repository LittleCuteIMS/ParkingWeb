  <?php
/*
 * 新增或添加车牌号
 * written by 荣誉婷
 */
include_once '../mysql_db/Insert.php';
include_once 'link1.php';
//$json = file_get_contents('php://input');  //接收json数据
//$arr = json_decode($json,true);
$json ='{"plate_number":"川B12T21","remarks":"","mobile":17689045670}';
$arr=(array)json_decode($json);
$plateNumber=$arr['plate_number'];
$beiZhu=$arr['remarks'];
$userTelephone=$arr['mobile'] ;
$result= mysqli_query($link,"select * from user where mobile=$userTelephone");   //在user表中查询与电话号码匹配的用户id
if (mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
    $userId=$row['id'];
    //echo $userId;
}else{
    echo "FAILURE";
}

//向car表中录入车辆信息
$insert=new Insert();
$insert->insert_car("intelligentparking",$plateNumber, $beiZhu, $userId);
$new=mysqli_query($link, "select * from car where user_id='$userId'");    //检查数据是否录入成功，若成功反馈信息给客户端
$datarow = mysqli_num_rows($new);
if($datarow>=1){
    echo 'SUCCEED';
}
else {
    echo 'FAILURE';
}
mysqli_close($link);
?>
