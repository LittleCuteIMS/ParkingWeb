<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>用户信息管理页面</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/custom/general.js"></script>
    <script type="text/javascript" src="js/custom/blog.js"></script>
    <!--[if IE 9]>
        <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
    <![endif]-->
    <!--[if IE 8]>
        <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
    <![endif]-->
    <!--[if lt IE 9]>
    	<script src="js/plugins/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<body class="withvernav">
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
            <!--div class="notification">
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
            </div-->
        	<div class="userinfo">
            	<img src="images/thumbs/avatar.png" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                    	切换主题: <br />
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
                        <li><a href="index.html">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<ul class="headermenu">
        	<li><a href="dashboard.html"><span class="icon icon-flatscreen"></span>智能后台</a></li>
            <li class="current"><a href="manageblog.php"><span class="icon icon-pencil"></span>用户管理</a></li>
            <li><a href="messages.html"><span class="icon icon-message"></span>停车场管理</a></li>
            <li><a href="reports.html"><span class="icon icon-chart"></span>财务管理</a></li>
        </ul>
        
        <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	<h4>今日进帐</h4>
                    <h2>￥640.01</h2>
                </div>
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->
    
    <div class="vernav">
    	<ul>
        	<li class="current"><a href="#" class="editor">用户注册信息查询</a></li>
            <li><a href="newpost.html">用户停车信息</a></li>
            <li><a href="">用户信息变动</a></li>
            <li><a href="">其他</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader">
            
            <ul class="hornav blogmenu">
                <li class="current"><a href="#" >用户注册基本信息</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
            <form name="select" action="" method="POST">
                <p>请选择查询方案：
                <select size="1" name="sltUser">
                    <option value="所有用户">所有用户</option>
                    <option value="id">id</option>
                    <option value="昵称">昵称</option>
                    <option value="余额">余额</option>
                    <option value="注册日期">注册日期</option>
                    <option value="手机号">手机号</option>
                </select>
                <input type="submit" class="butn" name="sltSubmit" value="提交">
            </form>

            <div>           
                <?php
                /*
                在网页上输出所有已注册用户信息
                */
                include_once "mysql_db/Select.php";                             
                
                if ( isset($_POST['sltSubmit']) ) {
                    $select = new Select();                   

                    if ($_POST["sltUser"] == "所有用户") 
                    {
                            echo "<table style='text-align:center;' border='1'>";
                            echo "<tr valign='top' height='60'>"; 
                            echo "<td width='12%'>id</td>";
                            echo "<td width='20%'>昵称</td>";
                            echo "<td width='20%'>余额</td>";
                            echo "<td width='28%'>注册日期</td>";
                            echo "<td width='20%'>手机号</td>";
                            echo "</tr>"; 

                            $select->select_user_all('intelligentparking');
                    }   
                    /*
                    else if($_POST["sltUser"] == "注册日期")
                        {
                            echo "<p>";
                            echo "<form action='' method='GET' style='width:300px; height:16px'>";
                            echo "请输入查询日期：";
                            echo "<input type='text' name='date' value='2017-10-5'>";
                            echo "<p><input type='submit' name='dtSubmit' value='确认'>";
                            echo "</form>";
                        }*/
                        else
                            echo "暂不支持查找！<p>";
                } 
                else{
                    echo "没有提交数据！";
                }

                ?>        
            </table>
                <!--ajax实现局部页面刷新，将查询结果显示在当前div块中-->
            </div>

        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>
