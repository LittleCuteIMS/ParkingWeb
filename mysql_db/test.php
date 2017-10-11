<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

<?php
	/*
	向数据库插入数据实例
	 */
	include "Insert.php";
	
	$a = new Insert();

	$a->insert_user('intelligentparking','catchy','2008-1-4','2013','18782003537');
	$a->insert_park('intelligentparking','1','road','200','9','roads','18263728191','2');
	$a->insert_trading_record('intelligentparking','1','2008-1-4','3','something','1','1');
	$a->insert_advalue('intelligentparking','2','洗车','akdrn','13666289539','8','1');
	$a->insert_car('intelligentparking','川A278XZ','nothing','1');
	$a->insert_parking_record('intelligentparking','1','2010-1-2','2010-2-1','no','1','川A278XZ');
	$a->insert_pay_rank('intelligentparking','2','2009-1-3','20','nothing','1');

	/*
	向数据库查询数据实例
	 */
	include "Select.php";

	$b = new Select();

	$b->select_user('intelligentparking','nickname','catchy');
	$b->select_trading_record('intelligentparking','id','1');
	$b->select_pay_rank('intelligentparking','id','1');
	$b->select_parking_record('intelligentparking','id','1');
	$b->select_park('intelligentparking','id','1');
	$b->select_car('intelligentparking','user_id','1');
	$b->select_advalue('intelligentparking','id','2');


	/*
	向数据库修改数据实例
	 */
	include "Alter.php";

	$c = new Alter();

	$c->alter('user','nickname','www','id','1');

?>



</body>
</html>