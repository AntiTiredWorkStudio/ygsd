<?php
//引用此页面前需先引用conf.php DBManager.php
include_once('DBManager.php');
error_reporting(E_ALL ^ E_DEPRECATED);
//管理user的操作类
class USManager extends DBManager{
	
	public function USManager()
    {
        parent::DBManager();
		$this->CreateDBLink();
    }
	
	public function InsertUser($openid,$name,$tele){
		$this->CreateDBLink();
		$this->InsertDataToTable($GLOBALS['tables']['tUser']['name'],[
					'UserID'=>'"'.$openid.'"',
					'UserName'=>'"'.$name.'"',
					'UserTele'=>'"'.$tele.'"',
					'RegistDateID'=>'CURRENT_DATE()',
					'RegistTimeID'=>'CURRENT_TIME()',
				],false);
	}
	
	public function GetUser($openid){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tUser']['name'].' where UserID="'.$openid.'"';
		//echo $sql;
		//file_put_contents("resultArray.txt",$sql);
		$result = mysql_query($sql,$this->dbLink);
		if($result){
			$resultArray = mysql_fetch_array($result);
			$resultReturn = ['openid'=>$resultArray['UserID'],'nickname'=>$resultArray['UserName'],'tele'=>$resultArray['UserTele']];
			return $resultReturn;
		}else{
			return null;
		}
	}
}
?>