<?php

include "Mysql_DB.php";
/**
* 修改数据类
*/

class Alter extends Mysql_DB
{

	function alter($table_name='',$str1='',$value1='',$str2='',$value2='')
	{
		# 连接数据库
	    $con = mysqli_connect("localhost","root","","parking");
	    if (!$con)
	    {
	      die('Could not connect: ' . mysqli_connect_error());
	    }

		$sql = "UPDATE $table_name SET $str1 = '$value1' WHERE $str2 = '$value2' ";
		mysqli_query($con,$sql);

		# 关闭数据库
    	Mysql_DB::close("parking");
	
	}

}

?>