<?php session_start();
if(!@$_SESSION["name"])
{?>
<script type="text/javascript">
    window.location.href="index.php";
    </script>
<?php } ?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>财务管理页面</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="js/custom/general.js"></script>

</head>

<body>

    <div class="bodywrapper">

        <div class="topheader">
            <div class="left">
                <h1 class="logo">停了吗</h1>
                <span class="slogan">后台管理系统</span>
                
                <div class="search">
                	<form action="" method="post">
                    	<input type="text" name="keyword" id="keyword" value="请输入" />
                        <button class="submitbutton"></button>
                    </form>
                </div><!--search-->
                
                <br clear="all" />
                
            </div><!--left-->
            
            <div class="right">
            	<!--<div class="notification">
                    <a class="count" href="notifications.html"><span>9</span></a>
            	</div>
    			-->
            	<div class="userinfo">
                	<img src="images/thumbs/avatar.png" alt="" />
                    <span>管理员</span>
                </div><!--userinfo-->
                
                <div class="userinfodrop">
                	<div class="avatar">
                    	<a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                        <div class="changetheme">
                        	切换主题： <br />
                        	<a class="default"></a>
                            <a class="blueline"></a>
                            <a class="greenline"></a>
                            <a class="contrast"></a>
                            <a class="custombg"></a>
                        </div>
                    </div><!--avatar-->
                    <div class="userdata">
                    	<h4>管理员</h4>
                        <span class="email">youremail@yourdomain.com</span>
                        <ul>
                        	<li><a href="editprofile.html">编辑资料</a></li>
                            <li><a href="accountsettings.html">账号设置</a></li>
                            <li><a href="help.html">帮助</a></li>
                            <li><a href="exit.php">退出</a></li>
                        </ul>
                    </div><!--userdata-->
                </div><!--userinfodrop-->
            </div><!--right-->
        </div><!--topheader-->
        
        
        <div class="header">
        	<ul class="headermenu">
                <li><a href="manageblog.php"><span class="icon icon-pencil"></span>用户管理</a></li>
                <li><a href="messages.php"><span class="icon icon-message"></span>停车场管理</a></li>
                <li class="current"><a href="financial.php"><span class="icon icon-chart"></span>财务管理</a></li>
            </ul>         
        </div><!--header-->
        
        <div class="vernav">
            <ul>
                <li class="current"><a href="financial.php" class="editor">账单管理</a>
                    <span class="arrow"></span>
                    <ul id="formsub">
                        <li><a href="">查询账户消费账单</a></li>
                    </ul>
                </li>
                <li><a href="balance.php">余额管理</a></li>
            </ul>
            <a class="togglemenu"></a>
        </div><!--leftmenu-->

        <div class="centercontent">        
            <div class="pageheader">            
                <ul class="hornav">
                    <li class="current"><a href="#charts">查询账户消费账单</a></li>
                </ul>
            </div><!--pageheader-->

            <div class="contentwrapper">
            
                <div id="charts" class="subcontent">
                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable mailinbox">
                        <colgroup>
                            <col class="con0" width="9%" />
                            <col class="con1" width="13%"/>
                            <col class="con0" width="10%"/>
                            <col class="con1" width="18%"/>
                            <col class="con0" width="10%"/>
                            <col class="con1" width="20%"/>
                            <col class="con0" width="10%"/>
                            <col class="con1" width="10%"/>
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="head0">用户编号</th>
                                <th class="head1">手机号</th>
                                <th class="head0">车牌号</th>
                                <th class="head1">停车场名称</th>
                                <th class="head0">收费标准</th>
                                <th class="head1">交易时间</th>
                                <th class="head0">本次消费</th>
                                <th class="head1">账户余额</th>
                            </tr>
                            <?php
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

                            $sql = "SELECT * FROM parking_record";
                            $result = mysqli_query($con,$sql);
                            while( $row = mysqli_fetch_array($result) ){
                                $number = $number+1;
                            }
                            
                            for($i=1;$i<=$number;$i++){
                                $sql1 = "SELECT * FROM parking_record WHERE id = '$i'";
                                $result1 = mysqli_query($con,$sql1);
                                $row1 = mysqli_fetch_array($result1);

                                $plate_number = $row1['plate_number'];
                                $in_datetime = $row1['in_datetime'];
                                $out_datetime = $row1['out_datetime'];
                                $time = floor( (strtotime($out_datetime)-strtotime($in_datetime))%86400/3600 );
                                $park_id = $row1['park_id'];


                                $sql2 = "SELECT * FROM car WHERE plate_number = '$plate_number'";
                                $result2 = mysqli_query($con,$sql2);
                                $row2 = mysqli_fetch_array($result2);

                                $user_id = $row2['user_id'];


                                $sql3 = "SELECT * FROM user WHERE id = '$user_id'";
                                $result3 = mysqli_query($con,$sql3);
                                $row3 = mysqli_fetch_array($result3);

                                $mobile = $row3['mobile'];
                                $balance = $row3['balance'];


                                $sql4 = "SELECT * FROM park WHERE id = '$park_id'";
                                $result4 = mysqli_query($con,$sql4);
                                $row4 = mysqli_fetch_array($result4);

                                $name = $row4['name'];
                                $charge = $row4['charge'];

                                echo "<tr>";
                                echo "<td >".$user_id."</td>";
                                echo "<td >".$mobile."</td>";
                                echo "<td >".$plate_number."</td>";
                                echo "<td >".$name."</td>";
                                echo "<td >".$charge."</td>";
                                echo "<td >".$out_datetime."</td>";
                                echo "<td >".($time*$charge)."</td>";
                                echo "<td >".($balance-$time*$charge)."</td>";
                                echo "</tr>";
                            }
                            ?>
                        </thead>
                    </table>             
                </div>                       
            </div><!--contentwrapper-->       
                      
        </div><!-- centercontent -->     

    </div><!--bodywrapper-->

</body>
</html>
