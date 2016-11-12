<?php
include_once('../conf.php');
include_once('Respond.php');
include_once('../manager/OrderManager.php');
$ODM = new OrderManager();
//$link = $DBM->DBLink();
//$confirm = rand(10000, 32000).date('YmdHis',time()).rand(1000, 9999);
//$confirmSecret = sha1($confirm);
$index=1;
/*$DBM->InsertDataToTable('yg_orderstatus',
	['OrderID'=>'"'.$confirm.'"',
	'OrderSecret'=>'"'.$confirmSecret.'"',
	'UserID'=>'10001',
	'OrderDate'=>'CURRENT_DATE()',
	'OrderTime'=>'CURRENT_TIME()',
	'OperatDate'=>'CURRENT_DATE()',
	'OperatTime'=>'CURRENT_TIME()',
	'State'=>'"Submiting"']
);*/
//if(!isset($_POST['openid'])){
//	file_put_contents('or.txt', "<script>alert('没有openid');</script>");
//}
$ODM->InsertNewOrder($_POST['openid'],$_POST['total']);
while(isset($_POST['Dish'.$index])){
	$dishesBooked = json_decode($_POST['Dish'.$index],true);
	/*$DBM->InsertDataToTable('yg_order',
		['OrderSecret'=>'"'.$confirmSecret.'"',
		'DishID'=>'"'.$dishesBooked['id'].'"',
		'DishCount'=>$dishesBooked['count']
		]
	);*/
	$ODM->InsertDish($ODM->confirm_Secret,$dishesBooked['id'],$dishesBooked['count']);
	//$sql = "INSERT INTO `yg_order`(`OrderID`, `DishID`, `DishCount`, `OrderDateID`, `OrderTimeID`, `UserID`) VALUES (\"".$confirm."\",\"".$dishesBooked['id']."\",".$dishesBooked['count'].",CURRENT_DATE(),CURRENT_TIME(),10001)";			
	//mysql_query($sql,$link);
	$index++;
}
//file_put_contents('dish.txt',serialize($dishesBooked));
/*foreach($dishesBooked as $key=>$value){
	//$sql = "INSERT INTO `yg_order`(`OrderID`, `DishID`, `DishCount`, `OrderDateID`, `OrderTimeID`, `UserID`) VALUES (\"".$confirm."\",\"".$value['id']."\",".$value['count'].",CURRENT_DATE(),CURRENT_TIME(),10001)";			
	file_put_contents('sql.txt',$sql);
	mysql_query($sql,$link);
}*/
//mysql_close($link);
/*if(isset($_GET['totnew'])){
	file_put_contents('log.txt','totnew');
	echo 'totnew';
	//Header('Location: '.$urls['index']);
}*/

//$BC = new Broadcaster();
//$BC->BrocastNewsToAllAdmin();

echo "{ \"confirm\": \"".$ODM->confirmCode."\", \"secret\": \"".$ODM->confirm_Secret."\", \"targetUrl\": \""._URL('ownd','od='.$ODM->confirm_Secret)."\" }";
?>