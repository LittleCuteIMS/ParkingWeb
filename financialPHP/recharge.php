 <?php 
	/*
	接收充值信息
	 */
  	include_once "../mysql_db/Insert.php";
  	//$json = '{"mobile":18782003437,"amount":10}'; //测试数据
	//$arr=(array)json_decode($json);
    $json = file_get_contents('php://input');  //接收json数据
	$arr = json_decode($json,true);
	$userTelephone=$arr['mobile'];
	$userAmount=$arr['amount'];
    

	//修改数据库中用户表的余额：加上本次充值金额
    $con = mysqli_connect("localhost","root","","intelligentparking");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_connect_error());
    }

    //读取balance余额
    $sql1 = "SELECT * FROM user WHERE mobile = '$userTelephone' ";
    $result = mysqli_query($con,$sql1);
    $row = mysqli_fetch_array($result);
    $UserId = $row['id'];
    $Rbalance = $row['balance'];
    $Rbalance = $Rbalance + $userAmount;

    //修改balance
    $sql2 = "UPDATE user SET balance = '$Rbalance' WHERE mobile = '$userTelephone' ";
    mysqli_query($con,$sql2);

    echo $Rbalance;


    //添加充值记录
    $s = new Insert();    
    $PayTime = date("Y-m-d h:i:s");
    $Remarks = "手机充值";

    $s->insert_pay_rank('intelligentparking',$PayTime,$userAmount,$Remarks,$UserId);

?>