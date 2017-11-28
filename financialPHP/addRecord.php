 <?php 
    If ( isset($_POST['Submit']) ) {
        include_once "mysql_db/Insert.php";
        $s = new Insert();

        $s->insert_trading_record("intelligentparking",$_POST['PayTime'],$_POST['Amount'],$_POST['Remarks'],$_POST['UserId'],$_POST['ParkId']);

        echo "添加数据成功！";                                

        //修改数据库中用户表的余额：减去本次消费金额
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
        $Userid = $_POST['UserId'];
        $sql1 = "SELECT * FROM user WHERE id = '$Userid' ";
        $result = mysqli_query($con,$sql1);
        $row = mysqli_fetch_array($result);
        $Rbalance = $row['balance'];
        $Rbalance = $Rbalance-$_POST['Amount'];

        //修改balance
        $sql2 = "UPDATE user SET balance = '$Rbalance' WHERE id = '$Userid' ";
        mysqli_query($con,$sql2);                                
    }
?>