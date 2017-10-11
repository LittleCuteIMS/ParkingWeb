<?php

/**
* 创建数据库接口类
*/
class Mysql_DB
{

    function connect($db_name)
    {
      $con = mysqli_connect("localhost","root","",$db_name);
      if (!$con)
      {
        die('Could not connect: ' . mysqli_connect_error());
      }

    }

    function close($db_name)
    {
      #断开数据库连接
      $con = mysqli_connect("localhost","root","",$db_name);
      mysqli_close($con);
    }
}

class Response{
    public  static  function json($code,$message="",$data=array()){
        $feedback=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );
        
        echo  json_encode($feedback,JSON_UNESCAPED_UNICODE);
        exit;
    }
}

?>