<?php
  //检查是否提交
  If ( isset($_POST['Submit']) ) {
    //连接数据库
    $DB_Server = "localhost";  
    $DB_Username = "root";  
    $DB_Password = "";  
    $DB_DBName = "intelligentparking";
    $Connect = mysqli_connect($DB_Server, $DB_Username, $DB_Password,$DB_DBName) or die("Couldn't connect."); 
    

    $DB_TBLName = "trading_record";//要查询的表名
    $savename = date("YmjHis");//Excel表名：年月日时分秒
    $now_date = date("Y-m-j H:i:s");  
    $sql = "Set Names 'gbk'";//设置格式
    mysqli_query($Connect,$sql);
    ob_end_clean();
    ob_start();
    header("Content-Type: application/vnd.ms-excel;charset=utf8");
    header("Content-Disposition: attachment; filename=".$savename.".xls");  
    header("Pragma: no-cache");    
    $title = "数据库名:$DB_DBName,数据表:$DB_TBLName,备份日期:$now_date"; 


    $sql = "Select * from $DB_TBLName";
    $result = mysqli_query($Connect,$sql) or die(mysqli_connect_error());  
    $title = iconv('utf-8', 'gb2312', $title);//编码格式转换，解决中文乱码
    echo("$title\n");  
    for ($i = 0;$i < mysqli_num_fields($result);$i++)  {  
      $field_info = mysqli_fetch_field_direct($result,$i); 
      $field = $field_info->name ."\t";
      echo $field;
    } 

    print("\n");  
    
    $i = 0;  
    while($row = mysqli_fetch_array($result))  {  
      $schema_insert = "";  
      for($j=0; $j<mysqli_num_fields($result);$j++)  {  
          if(!isset($row[$j])) $schema_insert .= "NULL"."\t";  
          elseif ($row[$j] != "") $schema_insert .= "$row[$j]"."\t";  
          else $schema_insert .= ""."\t";  
      }  
      $schema_insert = str_replace("\t"."$", "", $schema_insert);  
      $schema_insert .= "\t";  
      print(trim($schema_insert));  
      print "\n"; $i++;  
    }

  }
?>