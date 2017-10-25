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
        $str = "set names 'UTF8' ";
        mysqli_query($con,$str);
        $str = "set character_set_client=utf8";
        mysqli_query($con,$str);
        $str = "set character_set_results=utf8";
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

        //解决中文乱码问题
        $sql = "set names 'utf8' ";
        mysqli_query($con,$sql);
        $sql = "set character_set_client=utf8";
        mysqli_query($con,$sql);
        $sql = "set character_set_results=utf8";
        mysqli_query($con,$sql);

        $sql = "SELECT * FROM user WHERE $str1 = '$value1' ";
        $result = mysqli_query($con,$sql);  //mysqli_query()函数必需有两个参数且不能是字符串
        
        while($row = mysqli_fetch_array($result))
        {
        echo "<table border='1px solid #000' width='75%' cellpadding='0' cellspacing='5'>";
        echo "<tr>";
        echo "<th>用户编号</th>";
        echo "<th>用户昵称</th>";
        echo "<th>手机号</th>";
        echo "<th>账户余额</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center'>".$row['id']."</td>";
        echo "<td align='center'>".$row['nickname']."</td>";
        echo "<td align='center'>".$row['mobile']."</td>";
        echo "<td align='center'>".$row['balance']."</td>";
        echo "</tr>";

        echo "</table>";
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

    function select_pay_rank_1($db_name,$str1,$value1) //$sql是一条查询SQL语句
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
        echo $row['$str1'];
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
        echo $row['id'] . " " . $row['datetime']. " " .$row['amount']." ".$row['remarks']." ".$row['user_id'];
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