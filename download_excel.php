<?php
  If ( isset($_POST['Submit']) ) {
    $DB_Server = "localhost";  
    $DB_Username = "root";  
    $DB_Password = "";  
    $DB_DBName = "intelligentparking";  
    $DB_TBLName = "trading_record";  
    $savename = date("YmjHis");
    $Connect = mysqli_connect($DB_Server, $DB_Username, $DB_Password,$DB_DBName) or die("Couldn't connect.");  
    $sql = "Set Names 'gbk'";
    mysqli_query($Connect,$sql);  
    $file_type = "vnd.ms-excel";  
    $file_ending = "xls";  
    header("Content-Type: application/$file_type;charset=utf8");  
    header("Content-Disposition: attachment; filename=".$savename.".$file_ending");  
    header("Pragma: no-cache");  
    $now_date = date("Y-m-j H:i:s");  

    //$title = "数据库名:$DB_DBName,数据表:$DB_TBLName,备份日期:$now_date"; 
    $sql = "Select * from $DB_TBLName";  

    $result = mysqli_query($Connect,$sql) or die(mysqli_connect_error());  
    //echo("$title\n");  
    $sep = "\t";  
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
          if(!isset($row[$j])) $schema_insert .= "NULL".$sep;  
          elseif ($row[$j] != "") $schema_insert .= "$row[$j]".$sep;  
          else $schema_insert .= "".$sep;  
      }  
    $schema_insert = str_replace($sep."$", "", $schema_insert);  
    $schema_insert .= "\t";  
    print(trim($schema_insert));  
    print "\n"; $i++;  
    }  
    return (true);
  }
?>