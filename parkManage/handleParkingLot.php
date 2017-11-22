<?php
include '../mysql_db/mysqliBySql.php';

//判断停车场传来的消息停车记录ID是否为空
/*if(!empty($_POST['parkingRecordId'])){
    
}else*/if(isset($_POST['plateNumber'],$_POST['parkId'],$_POST['inDatetime'] ) ){
    $plateNumber=$_POST['plateNumber'];
    //查询数据库中是否有该车信息
    $selectResult=selectBySql("SELECT * FROM car WHERE plate_number='".$plateNumber."'");
    if($selectResult){
        echo date("Y-m-d H:i:s" ,strtotime( $_POST['inDatetime'] ));
        //插入一条新的停车记录
        $newRecordSql="INSERT INTO parking_record(in_datetime,park_id,plate_number) 
            VALUES ('".date("Y-m-d H:i:s" ,strtotime( $_POST['inDatetime'] ))."','".$_POST['parkId']."','".$plateNumber."')";
        $result=insertBySql($newRecordSql);
        //如果插入成功
        if($result){
            //查询插入停车记录的ID
            $recordId=selectBySql("SELECT id FROM parking_record 
                WHERE in_datetime='".$_POST['inDatetime']."' AND park_id='".$_POST['parkId']."'");
            echo $recordId.' '.'IS';
        }else{
            echo '插入失败';
        }
    }else{
        echo 'NOT';//表明此辆车并非系统用户
    }
}
?>