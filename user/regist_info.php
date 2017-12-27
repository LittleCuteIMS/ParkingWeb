<?php
/*
 * 根据系统时间提取年份，取出数据库中每月的注册用户数量
 * written by 荣誉婷
 */
include_once '../user/link1.php';
include_once '../mysql_db/mysqliBySql.php';
$year= date('Y');
$year_date1 = "{$year}-01";
$year_date2 = "{$year}-02";
$year_date3 = "{$year}-03";
$year_date4 = "{$year}-04";
$year_date5 = "{$year}-05";
$year_date6 = "{$year}-06";
$year_date7 = "{$year}-07";
$year_date8 = "{$year}-08";
$year_date9 = "{$year}-09";
$year_date10 = "{$year}-10";
$year_date11 = "{$year}-11";
$year_date12 = "{$year}-12";
$sql1 = "select * from user where regis_date like '$year_date1%'";
$sql2 = "select * from user where regis_date like '$year_date2%'";
$sql3 = "select * from user where regis_date like '$year_date3%'";
$sql4 = "select * from user where regis_date like '$year_date4%'";
$sql5 = "select * from user where regis_date like '$year_date5%'";
$sql6 = "select * from user where regis_date like '$year_date6%'";
$sql7 = "select * from user where regis_date like '$year_date7%'";
$sql8 = "select * from user where regis_date like '$year_date8%'";
$sql9 = "select * from user where regis_date like '$year_date9%'";
$sql10 = "select * from user where regis_date like '$year_date10%'";
$sql11 = "select * from user where regis_date like '$year_date11%'";
$sql12 = "select * from user where regis_date like '$year_date12%'";
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