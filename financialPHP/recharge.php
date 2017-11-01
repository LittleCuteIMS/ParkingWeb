 <?php 
    If ( isset($_POST['Submit']) ) {
        include_once "mysql_db/Insert.php";
        $s = new Insert();

        $PayTime = $_POST['PayTime'];
        $Amount = $_POST['Amount'];
        $Remarks = $_POST['Remarks'];
        $UserId = $_POST['UserId'];

        $s->insert_pay_rank('intelligentparking',$PayTime,$Amount,$Remarks,$UserId);

        echo "充值成功！";                            

        //修改数据库中用户表的余额：加上本次充值金额
        $con = mysqli_connect("localhost","root","","intelligentparking");
        if (!$con)
        {
            die('Could not connect: ' . mysqli_connect_error());
        }

        //防止中文乱码
        $sql = "set names 'utf8' ";
        mysqli_query($con,$sql);
        $sql = "set character_set_client=utf8";
        mysqli_query($con,$sql);
        $sql = "set character_set_results=utf8";
        mysqli_query($con,$sql);

        //读取balance余额
        $sql1 = "SELECT * FROM user WHERE id = '$UserId' ";
        $result = mysqli_query($con,$sql1);
        $row = mysqli_fetch_array($result);
        $Rbalance = $row['balance'];
        $Rbalance = $Rbalance + $Amount;

        //修改balance
        $sql2 = "UPDATE user SET balance = '$Rbalance' WHERE id = '$UserId' ";
        mysqli_query($con,$sql2);                            
    }
?>