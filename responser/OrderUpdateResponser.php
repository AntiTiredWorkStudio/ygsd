<?php
header('Content-Type:text/html;charset=utf-8');
include_once('../conf.php');
include_once('Respond.php');
include_once('../manager/OrderManager.php');
include_once('../manager/USManager.php');
include_once('../attach/WriteRecode.php');
$accd = '';
if(isset($_GET['accd'])){
	$accd = $_GET['accd'];
}
$om = new OrderManager();
$oms=$om->GetAllOrder();
if($accd!='admin'){
	$om = new OrderManager();
	$oms=$om->GetOrder($accd);
}
$us = new USManager();
$count =0;
foreach($oms as $key=>$value){
	if($value['State'] != 'Submiting'){
		$count++;
	}
}
echo '{';
foreach($oms as $key=>$value){
	if($value['State'] != 'Submiting'){
		echo '"'.$value['OrderSecret'].'":{
				"url":"'._URL('ownd','od='.$value['OrderSecret'].($accd==''?'':('&accd='.$accd))).'",
				"state":"'.$GLOBALS['state'][$value['State']].'",
				"nickname":"'.$us->GetUser($value['UserID'])['nickname'].'",
				"date":"'.$value['OrderDate'].'",
				"time":"'.$value['OrderTime'].'",
				"price":"'.$value['OrderPrice'].'"
			}';
		//$count = $count-1;
		if($count-- >1){
			echo ',';
		}
	}
}
echo '}';
/*foreach($_POST as $key=>$value){
	//11.10写
	$result = $om->GetSingleOrder($value);
	echo '"'.$value.'":"'.$GLOBALS['state'][$result['State']].'"';
	if($count > $key+1){
		echo ',';
	}
}*/
?>