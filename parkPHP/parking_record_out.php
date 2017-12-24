<?php
/*
 * （需要接收的数据包括车牌号、进入时间、出停车场的时间、以及停车场编号）
 *本php文件用于解决以下问题：
 * 1.车辆停车交易过程，从用户的账户中扣除消费的金额
 * 2.当扣费成功后，停车场收入增加，交易的金额会存入对应停车场的income字段下
 * 3.车辆出停车场的信息录入(即：更新出停车场的时间）
 * 4.车辆完成停车过程及交易后，计算消费情况，将本次的停车记录存入数据库
 *
 * written by荣誉婷 on Nov 28,2017
 */
include_once '../mysql_db/mysqliBySql.php';
include_once '../user/link1.php';
$json = file_get_contents('php://input');  //接收车辆出停车场时传来的json数据
$arr = json_decode($json,true);
// $json ='{"plate_number":"川A52333","park_id":"1","in_datetime":"2017-12-24 15:36:44","out_datetime":"2017-12-24 17:36:44"}';
// $arr=(array)json_decode($json);
$plateNumber=$arr['plate_number'];
$parkId=$arr['park_id'];
$dateTime1=$arr['in_datetime'];
$dateTime2=$arr['out_datetime'];
//将字符串类型的时间转为时间戳
$a=strtotime($dateTime1);   
$b=strtotime($dateTime2);
//将时间戳表示为时间日期格式
$inDateTime=date("Y-m-d H:i:s",$a); //进入时间
$outDateTime=date("Y-m-d H:i:s",$b); //出停车场时间
//根据传来的信息查询该车辆是否有进入停车场的信息记录，如果有则更新出停车场的时间，没有就返回FAILURE
$confirmSql="select * from parking_record where plate_number='".$plateNumber."'And in_datetime='$inDateTime'And park_id='$parkId'";
$out=selectBySql($confirmSql);
if($out==true)
{
    /*
     * 1.车辆停车交易过程，从用户的账户中扣除消费的金额
     */
    $day=floor(($b-$a)/86400);
    $hour=ceil(($b-$a)%86400/3600);  //取整（eg:没满1小时的做1小时处理）
    $time=24*$day+$hour;
    //查询该车牌号对应的user_id
    $sql_id="select user_id from car where plate_number='".$plateNumber."'";
    $comeout1=mysqli_query($link, $sql_id);
    $row = mysqli_fetch_array($comeout1);
    $userId=$row['user_id'];
    //查询对应停车场的收费标准
    $sql_charge="select charge from park where id=$parkId";
    $comeout2=mysqli_query($link, $sql_charge);
    $row = mysqli_fetch_array($comeout2);
    $charge=$row['charge'];
    //计算本次停车的费用
    $amount=$time*$charge;
    //从user表中读取余额
    $sql1="select balance from user where id='$userId'";
    $result=mysqli_query($link,$sql1);
    $row=mysqli_fetch_array($result);
    $Rbalance=$row['balance'];
    //计算扣费后的余额
    $balance=$Rbalance-$amount;
    if($balance<0)
    {
        echo "账户余额不足，请充值";
    }else{
        $sql_balance="UPDATE user SET balance='$balance'WHERE id='$userId'";
        $result1=updateBySql($sql_balance);
        if($result1==true)
        {
            
            echo "扣费成功";
            /*
             * 2.当扣费成功后，停车场的收入增加
             */
            $sql2="select income from park where id='$parkId'";
            $result2= mysqli_query($link,$sql2);
            $row=mysqli_fetch_array($result2);
            $Rincome=$row['income'];
            //计算将交易费用添加到停车场的收入中
            $income=$Rincome+$amount;
            $sql_income="UPDATE park SET income='$income'WHERE id='$parkId'";
            $result1=updateBySql($sql_income);
            
            /*
             * 3.更新车辆出停车场的时间，若更新成功则返回录入成功，若失败则返回录入失败
             */
            $sql="UPDATE parking_record SET out_datetime='$outDateTime' where plate_number='".$plateNumber."'And in_datetime='$inDateTime'";
            $result=updateBySql($sql);
            if($result==true)
            {
                echo "录入成功";
                /*
                 * 4.当交易成功完成后，将本次的停车记录录入trading_record表中
                 */
                //将车辆出停车场的时间记为交易时间
                $tradingTime=$outDateTime;
                //将该次的消费记录录入数据库的trading_record表中，若成功返回交易成功，若失败返回交易失败
                $sql_trading="INSERT INTO trading_record (datetime,amount,plate_number,user_id,park_id)
                             VALUES('".$tradingTime."','$amount','$plateNumber','$userId','$parkId')";
                $result3=insertBySql($sql_trading);
                if($result3==true)
                {
                    echo "交易成功";
                }else{
                    echo "交易失败";
                }
            }else{
                echo "录入失败";
            }
        }else{
            echo "扣费失败";
        }
    }
}else{
    echo "FAILURE";
}
?>

