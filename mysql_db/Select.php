<?php

include "Mysql_DB.php";
/**
* 查询数据类
*/

class Select extends Mysql_DB
{

  function select_user_all($db_name) //$sql是一条查询SQL语句
  {
    # 连接数据库
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }


    $sql = "SELECT * FROM user";
    $str = "set character set 'UTF8' ";
    mysqli_query($con,$str);
    $str = "set names 'UTF8' ";
    mysqli_query($con,$str);
    $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
    
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td width='12%'>".$row['id']."</td>";
    echo "<td width='20%'>".$row['nickname']."</td>";
    echo "<td width='20%'>".$row['balance']."</td>";
    echo "<td width='28%'>".$row['regis_date']."</td>";
    echo "<td width='20%'>".$row['mobile']."</td>";
    echo "</tr>";
    echo "<br />";
    }

    json_encode($result);
    
    # 关闭数据库
    Mysql_DB::close($db_name);
  }

  function select_user($db_name,$str1,$value1) //$sql是一条查询SQL语句
  {
    # 连接数据库
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM user WHERE $str1 = '$value1' ";
    $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td width='12%'>".$row['id']."</td>";
    echo "<td width='20%'>".$row['nickname']."</td>";
    echo "<td width='20%'>".$row['balance']."</td>";
    echo "<td width='28%'>".$row['regis_date']."</td>";
    echo "<td width='20%'>".$row['mobile']."</td>";
    echo "</tr>";
    }

    # 关闭数据库
    Mysql_DB::close($db_name);
  }

  function select_trading_record($db_name,$str1,$value1) //$sql是一条查询SQL语句
  {
    # 连接数据库
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }


    $sql = "SELECT * FROM trading_record WHERE $str1 = '$value1' ";
    $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
    
    while($row = mysqli_fetch_array($result))
    {
    echo $row['id'] . " " . $row['datetime']. " " .$row['amount']." ".$row['remarks']." ".$row['user_id']." ".$row['park_id'];
    echo "<br />";
    }

    # 关闭数据库
    Mysql_DB::close($db_name);
  }

  function select_pay_rank($db_name,$str1,$value1) //$sql是一条查询SQL语句
  {
    # 连接数据库
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }


    $sql = "SELECT * FROM pay_rank WHERE $str1 = '$value1' ";
    $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
    
    while($row = mysqli_fetch_array($result))
    {
    echo $row['id'] . " " . $row['paytime']. " " .$row['amount']." ".$row['remarks']." ".$row['user_id'];
    echo "<br />";
    }

    # 关闭数据库
    Mysql_DB::close($db_name);
  }

  function select_parking_record($db_name,$str1,$value1) //$sql是一条查询SQL语句
  {
    # 连接数据库
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }


    $sql = "SELECT * FROM parking_record WHERE $str1 = '$value1' ";
    $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
    
    while($row = mysqli_fetch_array($result))
    {
    echo $row['id'] . " " . $row['in_datetime']. " " .$row['out_datetime']." ".$row['remarks']." ".$row['park_id']." ".$row['plate_number'];
    echo "<br />";
    }

    # 关闭数据库
    Mysql_DB::close($db_name);
  }

  function select_park($db_name,$str1,$value1) //$sql是一条查询SQL语句
  {
    # 连接数据库
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }


    $sql = "SELECT * FROM park WHERE $str1 = '$value1' ";
    $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
    
    while($row = mysqli_fetch_array($result))
    {
    echo $row['id'] . " " . $row['name']. " " .$row['carport_sum']." ".$row['carport_free_num']." ".$row['address']." ".$row['phone']." ".$row['charge'];
    echo "<br />";
    }

    # 关闭数据库
    Mysql_DB::close($db_name);
  }

  function select_car($db_name,$str1,$value1) //$sql是一条查询SQL语句
  {
    # 连接数据库
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }


    $sql = "SELECT * FROM car WHERE $str1 = '$value1' ";
    $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
    
    while($row = mysqli_fetch_array($result))
    {
    echo $row['plate_number'] . " " . $row['remarks']." ".$row['user_id'];
    echo "<br />";
    }

    # 关闭数据库
    Mysql_DB::close($db_name);
  }

  function select_advalue($db_name,$str1,$value1) //$sql是一条查询SQL语句
  {
    # 连接数据库
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }


    $sql = "SELECT * FROM advalue WHERE $str1 = '$value1' ";
    $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
    
    while($row = mysqli_fetch_array($result))
    {
    echo $row['id'] . " " . $row['service_type']." ".$row['shop_name']." ".$row['phone']." ".$row['charge']." ".$row['park_id'];
    echo "<br />";
    }

    # 关闭数据库
    Mysql_DB::close($db_name);
  }

}

?>