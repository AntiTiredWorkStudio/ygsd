<?php
//引用此页面前需先引用conf.php DBManager.php
include_once('DBManager.php');
error_reporting(E_ALL ^ E_DEPRECATED);
//管理user的操作类
class AdminManager extends DBManager{
	
	public function AdminManager()
    {
        parent::DBManager();
		$this->CreateDBLink();
    }
	
	public function InsertUser($openid){
		$this->CreateDBLink();
		return $this->InsertDataToTable($GLOBALS['tables']['tAdmin']['name'],[
					'openid'=>'"'.$openid.'"',
					'State'=>'"unregisted"',
					'getDate'=>'CURRENT_DATE()',
					'getTime'=>'CURRENT_TIME()',
				],false);
	}
	public function UpdateUser($state,$openid){
		$sql = 'UPDATE `yg_admin` `State`='.$state.',` WHERE openid="'.$openid.'"';
		$result = mysql_query($sql,$this->dbLink);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function GetAllAdmins(){
		$this->CreateDBLink();
		$sql = 'SELECT `openid` FROM `'.$GLOBALS['tables']['tAdmin']['name'].'` WHERE 1';
		$result = mysql_query($sql,$this->dbLink);
		$resultArray = [];
		$index = 0;
		while($row = mysql_fetch_array($result)){
			$resultArray[$index] =  $row['openid'];
			$index ++;
		}
		return $resultArray;
	}
	public function GetUser($openid){
		//$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tAdmin']['name'].' where openid="'.$openid.'"';
		file_put_contents('sqql.txt',$sql);
		//echo $sql;
		$rr = mysql_query($sql,$this->dbLink);
		$resultArray = mysql_fetch_array($rr);
		if($resultArray){
			$resultArray = mysql_fetch_array($rr);
			
			return $resultArray;//array ('openid'=>$resultArray['openid'],'state'=>$resultArray['State']);
		}else{
			return null;
		}
	}
}
?>