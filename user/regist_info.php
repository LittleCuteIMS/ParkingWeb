<?php
include_once '../user/link1.php';
include_once '../mysql_db/mysqliBySql.php';
$sql1 = "select * from user where regis_date between '2017-01-01' and '2017-01-31'";
$sql2 = "select * from user where regis_date between '2017-02-01' and '2017-02-28'";
$sql3 = "select * from user where regis_date between '2017-03-01' and '2017-03-31'";
$sql4 = "select * from user where regis_date between '2017-04-01' and '2017-04-30'";
$sql5 = "select * from user where regis_date between '2017-05-01' and '2017-05-31'";
$sql6 = "select * from user where regis_date between '2017-06-01' and '2017-06-30'";
$sql7 = "select * from user where regis_date between '2017-07-01' and '2017-07-31'";
$sql8 = "select * from user where regis_date between '2017-08-01' and '2017-08-31'";
$sql9 = "select * from user where regis_date between '2017-09-01' and '2017-09-30'";
$sql10 = "select * from user where regis_date between '2017-10-01' and '2017-10-31'";
$sql11 = "select * from user where regis_date between '2017-11-01' and '2017-11-30'";
$sql12 = "select * from user where regis_date between '2017-12-01' and '2017-12-31'";
$result1 = mysqli_query($link, $sql1);
$result2 = mysqli_query($link, $sql2);
$result3 = mysqli_query($link, $sql3);
$result4 = mysqli_query($link, $sql4);
$result5 = mysqli_query($link, $sql5);
$result6 = mysqli_query($link, $sql6);
$result7 = mysqli_query($link, $sql7);
$result8 = mysqli_query($link, $sql8);
$result9 = mysqli_query($link, $sql9);
$result10 = mysqli_query($link, $sql10);
$result11 = mysqli_query($link, $sql11);
$result12 = mysqli_query($link, $sql12);
$num1 = mysqli_num_rows($result1);
$num2 = mysqli_num_rows($result2);
$num3 = mysqli_num_rows($result3);
$num4 = mysqli_num_rows($result4);
$num5 = mysqli_num_rows($result5);
$num6 = mysqli_num_rows($result6);
$num7 = mysqli_num_rows($result7);
$num8 = mysqli_num_rows($result8);
$num9 = mysqli_num_rows($result9);
$num10 = mysqli_num_rows($result10);
$num11 = mysqli_num_rows($result11);
$num12 = mysqli_num_rows($result12);
$data=array("January"=>$num1,"February"=>$num2,"March"=>$num3,"April"=>$num4,"May"=>$num5,"June"=>$num6,
    "July"=>$num7,"August"=>$num8,"September"=>$num9,"October"=>$num10,"November"=>$num11,"December"=>$num12);
$json=json_encode($data);
echo $json;
?>