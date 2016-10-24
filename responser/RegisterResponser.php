<?php
include_once('../conf.php');
include_once('Respond.php');
include_once('../manager/DBManager.php');
/*if(isset($_POST['username'])){
	ShowLog();
}*/

$responserState = [
	'success'=>1,
	'failed'=>-1,
	'existed'=>2,
];

$issuccess = $responserState['failed'];
if((new DBManager())->ExistRowInTable($_POST['table'],
	['UserID'=>['var'=>'"'.$_POST['openid'].'"','log'=>'']],false)){
	$issuccess = $responserState['existed'];
}
if((new DBManager())->InsertDataToTable($_POST['table'],[
					'UserID'=>'"'.$_POST['openid'].'"',
					'UserName'=>'"'.$_POST['userName'].'"',
					'UserTele'=>'"'.$_POST['tele'].'"',
					'RegistDateID'=>'CURRENT_DATE()',
					'RegistTimeID'=>'CURRENT_TIME()',
	],false)){
	$issuccess = $responserState['success'];
}
		

echo "{ \"request\": ".$issuccess."}";
?>