<?php
    include '../mysql_db/mysqliBySql.php';

    $sql="select * from park";
    $jsonData=selectBySql($sql);//查询结果为json格式数据
    echo $jsonData;//将json数据发送到浏览器

/*
    $number = 0;
    $con = mysqli_connect("localhost","root","","intelligentparking");
        if (!$con)
        {
            die('Could not connect: ' . mysqli_connect_error());
        }

        //解决中文乱码问题
        $sql = "set names 'utf8' ";
        mysqli_query($con,$sql);
        $sql = "set character_set_client=utf8";
        mysqli_query($con,$sql);
        $sql = "set character_set_results=utf8";
        mysqli_query($con,$sql);

        $sql0 = "SELECT * FROM park";
        $result = mysqli_query($con,$sql);
        while( $row = mysqli_fetch_array($result) ){
            //$number = $number+1;
        }

        for($i=1;$i<=$number;$i++){
            $sql0 = "SELECT * FROM trading_record WHERE park_id = $i";          
            $result0 = mysqli_query($con,$sql0);
            $amount = 0;
            //$today = 0;
            while( $row0 = mysqli_fetch_array($result0) ){                                    
                if( $row0['datetime'] == Date() ){
                    $today = $today+$row0['amount'];
                }
                $amount = $amount+$row0['amount'];
            }
                                

            $sql1 = "SELECT * FROM park WHERE id = $i";

            $jsonData1=selectBySql($sql1);
            echo $jsonData1;
            
            $result1 = mysqli_query($con,$sql1);
            $row1 = mysqli_fetch_array($result1);

            $id = $row1['id'];
            $name = $row1['name'];                                
            $address = $row1['address'];

            echo "<tr>";
            echo "<td >".$id."</td>";
            echo "<td >".$name."</td>";
            echo "<td >".$address."</td>";
            echo "<td >".$today."</td>";
            echo "<td >".$amount."</td>";
            echo "</tr>";
        }
*/
?>