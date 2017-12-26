<?php
/*
 * （需要接收的数据为用户车牌号）
 * 根据车牌号查询停车记录(数据应该是会返回给手机的）
 * 
 * written by 荣誉婷on Nov 25,2017
 * 
 */
include_once '../user/link1.php';
include_once '../mysql_db/mysqliBySql.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
// $json ='{"mobile":"13551374417"}';
// $arr=(array)json_decode($json);
$userTelephone=$arr['mobile'];
$sql4= "SELECT plate_number,park_id,in_datetime,out_datetime 
        FROM parking_record 
        WHERE plate_number 
            IN (SELECT plate_number 
                FROM car 
                WHERE user_id=(
                    SELECT id 
                    FROM user 
                    WHERE mobile='$userTelephone'))
        ORDER BY in_datetime ASC";
$result=mysqli_query($link, $sql4);
$jarr = array();
while($row=mysqli_fetch_array($result)){
    $count=count($row);//不能在循环语句中，由于每次删除 row数组长度都减小
    for($i=0;$i<$count;$i++){
        unset($row[$i]);//删除冗余数据
    }
    array_push($jarr,$row);
}
$json=json_encode($jarr, JSON_UNESCAPED_UNICODE);
echo $json;

?>