<?php
//引用此页面前需先引用conf.php DBManager.php
include_once('DBManager.php');
error_reporting(E_ALL ^ E_DEPRECATED);
//管理user的操作类
class OrderManager extends DBManager{
	
	public function OrderManager()
    {
        parent::DBManager();
		$this->CreateDBLink();
    }
	
	var $confirmCode = "";
	var $confirm_Secret = "";
	
	public function InsertNewOrder($openid,$orderprice){
		$this->CreateDBLink();
		$confirm = rand(10000, 32000).date('YmdHis',time()).rand(1000, 9999);
		$confirmSecret = sha1($confirm);
		
		$this->confirmCode = $confirm;
		$this->confirm_Secret = $confirmSecret;
		
		$this->InsertDataToTable($GLOBALS['tables']['tOrderStatus']['name'],
		['OrderID'=>'"'.$confirm.'"',
			'OrderSecret'=>'"'.$confirmSecret.'"',
			'UserID'=>'"'.$openid.'"',
			'OrderPrice'=>$orderprice,
			'OrderDate'=>'CURRENT_DATE()',
			'OrderTime'=>'CURRENT_TIME()',
			'OperatDate'=>'CURRENT_DATE()',
			'OperatTime'=>'CURRENT_TIME()',
			'State'=>'"Submiting"']
		);
	}
	public function InsertDish($confirmSecret,$dishID,$dishCount){
		$this->CreateDBLink();
		
		$this->InsertDataToTable($GLOBALS['tables']['tOrder']['name'],
		['OrderSecret'=>'"'.$confirmSecret.'"',
		'DishID'=>'"'.$dishID.'"',
		'DishCount'=>$dishCount
		]
	);
	}
	
	public function GetOrder($openid){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tOrderStatus']['name'].' where UserID="'.$openid.'"  order by OrderDate desc ,OrderTime desc';
		//echo $sql;
		//file_put_contents("resultArray.txt",$sql);
		$result = mysql_query($sql,$this->dbLink);
		$resultReturn = [];
		if($result){
			while($resultArray = mysql_fetch_array($result)){
				$resultReturn[$resultArray['OrderID']] = $resultArray;
			}
			return $resultReturn;
		}else{
			return null;
		}
	}
	public function GetAllOrder(){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tOrderStatus']['name'].' where 1 order by OrderDate desc ,OrderTime desc';
		//echo $sql;
		//file_put_contents("resultArray.txt",$sql);
		$result = mysql_query($sql,$this->dbLink);
		$resultReturn = [];
		if($result){
			while($resultArray = mysql_fetch_array($result)){
				$resultReturn[$resultArray['OrderID']] = $resultArray;
			}
			return $resultReturn;
		}else{
			return null;
		}
	}
	
	public function GetSingleOrder($secretID){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tOrderStatus']['name'].' where OrderSecret="'.$secretID.'"';
		//echo $sql;
		//file_put_contents("resultArray.txt",$sql);
		$result = mysql_query($sql,$this->dbLink);
		
		if($result){
			//while(){
			//	$resultReturn[$resultArray['OrderID']] = $resultArray;
			//}
			$resultArray = mysql_fetch_array($result);
			return $resultArray;
		}else{
			return null;
		}
	}
	
	public function UpdateOrderStatus($secretID,$state){
		$this->CreateDBLink();
		$sql = 'UPDATE `yg_orderstatus` SET `State`="'.$state.'" WHERE `OrderSecret`="'.$secretID.'"';
		return mysql_query($sql,$this->dbLink);
	}
	
	public function GetDishes($secretID){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tOrder']['name'].' where OrderSecret="'.$secretID.'"';
		//echo $sql;
		//file_put_contents("resultArray.txt",$sql);
		$result = mysql_query($sql,$this->dbLink);
		$resultReturn = [];
		if($result){
			while($resultArray = mysql_fetch_array($result)){
				$resultReturn[$resultArray['DishID']] = $resultArray;
			}
			return $resultReturn;
		}else{
			return null;
		}
	}
}
?>