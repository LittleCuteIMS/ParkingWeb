<?php session_start();
if(empty($_SESSION["name"]))
{ echo "<script> window.location.href = 'index.php';</script>";
}?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>财务管理页面</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
    <script type='text/javascript' src='js/plugins/fullcalendar.min.js'></script>
    <script type="text/javascript" src="js/custom/general.js"></script>
    <script type="text/javascript" src="js/custom/calendar.js"></script>
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
                <li class="current"><a href="" class="editor">账单管理</a>
                    <span class="arrow"></span>
                    <ul id="formsub">
                        <li><a href="queryRecord.php">查询账户消费账单</a></li>
                    </ul>
                </li>
                <li><a href="balance.php">余额管理</a></li>
            </ul>
            <a class="togglemenu"></a>
        </div><!--leftmenu-->

        <div class="centercontent">

            <div class="pageheader">            
                <ul class="hornav">
                    <li class="current"><a href="#statistics">导出账户消费账单</a></li>
                </ul>
            </div><!--pageheader-->

            <div id="contentwrapper" class="contentwrapper withrightpanel">
            
                <div id="calendar"></div>
            
            </div><!--contentwrapper-->

            <div class="rightpanel">
                <div class="rightpanelinner">
                    <div class="widgetbox">
                        <div class="title"><h4>导出</h4></div>
                        <div class="widgetcontent">
                            <div id="external-events">                          
                                <div class="external-event">
                                    <form method="post" action="financialPHP/downloadExcel.php">
                                        <input type="submit" name="Submit" value="导出Excel文档">
                                    </form>
                                </div>
                                <div class="external-event">
                                    <form method="post" action="">
                                        <input type="submit" name="Submit" value="导出Word文档">
                                    </form>
                                </div>

                              	<p>点击导出。</p>
                            </div>  
                            
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                </div><!--rightpanelinner-->
            </div><!--rightpanel-->
        </div><!--centercontent-->

    </div><!--bodywrapper-->

</body>
</html>
