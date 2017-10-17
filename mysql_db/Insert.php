<?php

include "Mysql_DB.php";
/**
* 插入数据类
*/
class Insert extends Mysql_DB
{

  function insert_car($db_name,$value1,$value2,$value3)
  {     
      # 在phpmyadmin中连接数据库，$db_name为数据库名称
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con){
        die('Could not connect: ' . mysqli_connect_error());
      }

      $sql = "INSERT INTO car 
        (
        plate_number, 
        remarks, 
        user_id
        ) 
        VALUES 
        (
        '$value1', 
        '$value2', 
        '$value3'
        )";
      $str = "set character set 'UTF8' ";
      mysqli_query($con,$str);
      $str = "set names 'UTF8' ";
      mysqli_query($con,$str);
      mysqli_query($con,$sql);

      # 关闭数据库
      Mysql_DB::close($db_name);
  }

  function insert_user($db_name,$value1,$value2,$value3,$value4)
  {     
      # 在phpmyadmin中连接数据库，$db_name为数据库名称
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con){
        die('Could not connect: ' . mysqli_connect_error());
      }

      $sql = "INSERT INTO user 
        (
        nickname, 
        regis_date,
        password,
        mobile
        ) 
        VALUES 
        (
        '$value1', 
        '$value2', 
        '$value3',
        '$value4'
        )";
      $str = "set character set 'UTF8' ";
      mysqli_query($con,$str);
      $str = "set names 'UTF8' ";
      mysqli_query($con,$str);
      mysqli_query($con,$sql);

      # 关闭数据库
      Mysql_DB::close($db_name);
  }

  function insert_park($name,$carportSum,$carportFreeNum,$address,$phone,$charge)
  {     
      //建立与数据库的连接
      $mysqli = new mysqli('localhost','root','','intelligentparking');
      
      //连接出错时
      if($mysqli->connect_error){
          die('连接错误('. $mysqli->connect_errno . ')'
              .$mysqli->connect_error);
      }

      $sql = "INSERT INTO park 
        (
        name, 
        carport_sum,
        carport_free_num,
        address,
        phone,
        charge
        ) 
        VALUES 
        (
        '$name', 
        '$carportSum', 
        '$carportFreeNum',
        '$address',
        '$phone',
        '$charge'
        )";
      //避免存入数据库乱码
      $mysqli->query("set character set 'UTF8'");
      $mysqli->query("set names 'UTF8'");
      
      //插入数据，成功$result为true，失败为false
      $result=$mysqli->query($sql);
      

      # 关闭数据库
      $mysqli->close();
      return $result;
  }

  function insert_advalue($db_name,$value1,$value2,$value3,$value4,$value5,$value6)
  {     
      # 在phpmyadmin中连接数据库，$db_name为数据库名称
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con){
        die('Could not connect: ' . mysqli_connect_error());
      }

      $sql = "INSERT INTO advalue
        (
        id,
        service_type, 
        shop_name,
        phone,
        charge,
        park_id
        )
        VALUES 
        (
        '$value1', 
        '$value2', 
        '$value3',
        '$value4',
        '$value5',
        '$value6'
        )";
      $str = "set character set 'UTF8' ";
      mysqli_query($con,$str);
      $str = "set names 'UTF8' ";
      mysqli_query($con,$str);
      mysqli_query($con,$sql);

      # 关闭数据库
      Mysql_DB::close($db_name);
  }

  function insert_trading_record($db_name,$value1,$value2,$value3,$value4,$value5,$value6)
  {     
      # 在phpmyadmin中连接数据库，$db_name为数据库名称
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con){
        die('Could not connect: ' . mysqli_connect_error());
      }

      $sql = "INSERT INTO trading_record 
        (
        id, 
        paytime, 
        amount,
        remarks,
        user_id,
        park_id
        ) 
        VALUES 
        (
        '$value1', 
        '$value2', 
        '$value3',
        '$value4',
        '$value5',
        '$value6'
        )";
      $str = "set character set 'UTF8' ";
      mysqli_query($con,$str);
      $str = "set names 'UTF8' ";
      mysqli_query($con,$str);
      mysqli_query($con,$sql);

      # 关闭数据库
      Mysql_DB::close($db_name);
  }

  function insert_parking_record($db_name,$value1,$value2,$value3,$value4,$value5,$value6)
  {     
      # 在phpmyadmin中连接数据库，$db_name为数据库名称
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con){
        die('Could not connect: ' . mysqli_connect_error());
      }

      $sql = "INSERT INTO parking_record 
        (
        id,
        in_datetime, 
        out_datetime,
        remarks,
        park_id,
        plate_number
        ) 
        VALUES 
        (
        '$value1', 
        '$value2', 
        '$value3',
        '$value4',
        '$value5',
        '$value6'
        )";
      $str = "set character set 'UTF8' ";
      mysqli_query($con,$str);
      $str = "set names 'UTF8' ";
      mysqli_query($con,$str);
      mysqli_query($con,$sql);

      # 关闭数据库
      Mysql_DB::close($db_name);
  }

  function insert_pay_rank($db_name,$value1,$value2,$value3,$value4,$value5)
  {     
      # 在phpmyadmin中连接数据库，$db_name为数据库名称
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con){
        die('Could not connect: ' . mysqli_connect_error());
      }
      
      $sql = "INSERT INTO pay_rank 
      (
        id,
        paytime,
        amount,
        remarks,
        user_id
        )
      VALUES
      (
        '$value1', 
        '$value2', 
        '$value3',
        '$value4',
        '$value5'
      )";
      $str = "set character set 'UTF8' ";
      mysqli_query($con,$str);
      $str = "set names 'UTF8' ";
      mysqli_query($con,$str);
      mysqli_query($con,$sql);

      # 关闭数据库
      Mysql_DB::close($db_name);
  }

}

?>