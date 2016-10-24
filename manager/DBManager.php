<?php
//引用此页面前需先引用conf.php
error_reporting(E_ALL ^ E_DEPRECATED);
class DBManager{
	//获取配置文件
	public function C(){
		return $GLOBALS['options'];
	}
	public function T(){
		return $GLOBALS['tables'];
	}
	var $dbLink = null;
	public function CreateDBLink(){
		if($this->dbLink == null)
			$this->dbLink = $this->DBLink();
	}
	public function Finished(){
		if(!empty($this->dbLink)){
			
			mysql_close($this->dbLink);
		}
	}
	public function CountTableRow($tableName){
		$con = $this->DBLink();
		$sql = 'select count(*) as value from `'.$GLOBALS['tables'][$tableName]['name'].'`';
		//file_put_contents('count.txt',$sql);
		$result = mysql_query($sql,$con);
		return mysql_fetch_array($result)[0];
	}
	public function ExistRowInTable($tableName,$conditionArray,$closeDBLink = false){
		$con = $this->DBLink();
		$sql = 'SELECT * FROM `'.$tableName.'` WHERE ';
		foreach($conditionArray as $key=>$value){
			$sql = $sql.$key.'='.$value['var'].' '.$value['log'];
		}
		
		//file_put_contents('sql.txt',$sql);
		$result = mysql_query($sql,$con);
		if($closeDBLink){
			mysql_close($con);
		}
		
		return mysql_fetch_row($result);
		//return empty($result);
	}
	
	public function InsertDataToTable($tableName,$array,$closeDBLink = false){
		$con = $this->DBLink();
		$sqlPart0 = 'INSERT INTO `'.$tableName.'`(';			
		$sqlPart1 = ') VALUES (';
		$sqlPart2 = ')';
		$keys = '';
		$values = '';
		foreach($array as $key=>$value){
			$keys = $keys.'`'.$key.'`,';
			$values = $values.$value.',';
		}
		$keys = substr($keys, 0, -1);
		$values = substr($values, 0, -1);
		$result = mysql_query($sqlPart0.$keys.$sqlPart1.$values.$sqlPart2,$con);
		if($closeDBLink){
			mysql_close($con);
		}
		return $result;
	}
	
	public function DBManager(){
		$con = $this->DBLink();
		if(!$con)
		{
		  die('Could not connect: ' . mysql_error());
		}

		if(mysql_query("CREATE DATABASE ".$this->C()['database'],$con))
		{
		  echo "Database created</br>";
		}
		else
		{
			if(mysql_errno() != 1007){
				echo "Can not creating database: " . mysql_errno()."</br>";
			}
		}
		mysql_close($con);
	}
	
	public function InitDB(){
		$link = $this->DBLink();
		foreach($this->T() as $key=>$value){
			if(!$this->ExistTable($value['name'],$link)){
				$r = mysql_query($value['command'],$link);
				if($r){
					echo ' '.$value['name'].' 创建</br>';
				}else{
					echo ' '.$value['name'].' 创建失败</br>';
				}
			}else{
				echo ' '.$value['name'].' 存在</br>';
			}
		}
		mysql_close($link);
	}
	
	public function ExistTable($tableName,$con){
		//$con = $this->DBLink();
		$result =mysql_fetch_row(mysql_query("SHOW TABLES LIKE '".$tableName."' ",$con));
		//mysql_close($con);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	public function DBLink(){
		$con = mysql_connect("localhost",$this->C()['admin'],$this->C()['password']);
		mysql_set_charset('utf8');
		if($con){
			mysql_select_db($this->C()['database']);
		}
		return $con;
	}
}
?>