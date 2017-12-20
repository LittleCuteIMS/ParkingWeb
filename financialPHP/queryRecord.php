 <?php 
	/*
	接收充值信息
	 */
  	include_once "../mysql_db/Select.php";
	$json = '{"mobile":18782003437,"amount":10}'; //测试数据
	$arr=(array)json_decode($json);
    //$json = file_get_contents('php://input');  //接收json数据
	//$arr = json_decode($json,true);
	$userTelephone=$arr['mobile'];
   
    //连接用户id
    $con = mysqli_connect("localhost","root","","intelligentparking");
    if (!$con)
    {
      die('Could not connect: ' . mysqli_connect_error());
    }

    $sql1 = "SELECT * FROM user WHERE mobile = '$userTelephone' ";
    $result = mysqli_query($con,$sql1);
    $row = mysqli_fetch_array($result);
    $UserId = $row['id'];
    
    //查询充值记录
        $sql = "set names 'utf8' ";
        mysqli_query($con,$sql);
        $sql = "set character_set_client=utf8";
        mysqli_query($con,$sql);
        $sql = "set character_set_results=utf8";
        mysqli_query($con,$sql);
    $sql3 = "SELECT * FROM pay_rank WHERE user_id = '$UserId' ";
    $result1 = mysqli_query($con,$sql3);
    
    $jarr = array();//说明$jarr是一个数组

    while ($row = mysqli_fetch_array($result1)) {
    	$count=count($row);   //不能在循环语句中，由于每次删除 row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($row[$i]);  //删除冗余数据
        }
        array_push($jarr,$row);
    }

    $json=json_encode($jarr, JSON_UNESCAPED_UNICODE);//将数组进行json编码,防止中文乱码

    echo $json;

?>