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

  function insert_user($db_name,$value1,$value2,$value3,$value4,$value5,$value6)
  {     
      # 在phpmyadmin中连接数据库，$db_name为数据库名称
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con){
        die('Could not connect: ' . mysqli_connect_error());
      }

      $sql = "INSERT INTO user 
        (
        id, 
        nickname, 
        balance,
        regis_date,
        password,
        mobile
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

  function insert_park($db_name,$value1,$value2,$value3,$value4,$value5,$value6,$value7)
  {     
      # 在phpmyadmin中连接数据库，$db_name为数据库名称
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con){
        die('Could not connect: ' . mysqli_connect_error());
      }

      $sql = "INSERT INTO park 
        (
        id, 
        name, 
        carport_sum,
        carport_free_num,
        address,
        phone,
        charge
        ) 
        VALUES 
        (
        '$value1', 
        '$value2', 
        '$value3',
        '$value4',
        '$value5',
        '$value6',
        '$value7'
        )";
      $str = "set character set 'UTF8' ";
      mysqli_query($con,$str);
      $str = "set names 'UTF8' ";
      mysqli_query($con,$str);
      mysqli_query($con,$sql);

      # 关闭数据库
      Mysql_DB::close($db_name);
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