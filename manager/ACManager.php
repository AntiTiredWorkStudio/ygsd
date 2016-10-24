<?php
//引用此页面前需先引用conf.php DBManager.php
include_once('DBManager.php');
error_reporting(E_ALL ^ E_DEPRECATED);
//管理access_token的操作类
class ACManager extends DBManager{
	
	
	public function ACManager()
    {
        parent::DBManager();
		$this->CreateDBLink();
    }
	public function UpdateACIndex(){
		$this->CreateDBLink();
	//	$this->dbLink;
		
		$sql = 'SELECT * FROM `'.$GLOBALS['tables']['tAccess']['name'].'`';
		$sqlUpdate = 'UPDATE `yg_access` SET `tokenIndex`=';
		$index = 1;
		$result = mysql_query($sql,$this->dbLink);
		while($row = mysql_fetch_array($result)){
			$r = mysql_query($sqlUpdate.$index.' WHERE getTime="'.$row['getTime'].'" AND getDate="'.$row['getDate'].'"',$this->dbLink);
			echo '<p>'.$row['getDate'].'日  '.$row['getTime'].'时间获取的access_token序号更新为'.$index.'</p>';
			$index++;
		}
	}
	var $access_tokenIndex = 0;
	
	public function InsertAccessToken($access_token,$openid){
		if($access_token == "" || $openid == ""){
			return;
		}
		$this->CreateDBLink();
		$this->GetNearestAccessToken($openid);
		mysql_close($this->dbLink);
		$this->access_tokenIndex = $this->CountTableRow('tAccess');
		
		$this->InsertDataToTable($GLOBALS['tables']['tAccess']['name'],
			[
				'tokenIndex'=>($this->access_tokenIndex+1),
				'access_token'=>'"'.$access_token.'"',
				'openid'=>'"'.$openid.'"',
				'getDate'=>'CURRENT_DATE()',
				'getTime'=>'CURRENT_TIME()'
			]
		,true);
		$this->CreateDBLink();
	}
	
	
	public function GetNearestAccessToken($openid){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tAccess']['name'].' where openid="'.$openid.'" order by `tokenIndex` desc limit 1';
		//file_put_contents('tAccess.txt',$sql);
		//echo $sql;
		$result = mysql_query($sql,$this->dbLink);
		if($result){
			$resultArray = mysql_fetch_array($result);
			$this->access_tokenIndex = $resultArray['tokenIndex']+1;
			return $resultArray['access_token'];
		}else{
			$this->access_tokenIndex = 0;
			return null;
		}
	}
}
?>