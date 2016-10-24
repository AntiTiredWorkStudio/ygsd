<?php
//引用此页面前需先引用conf.php DBManager.php
include_once('DBManager.php');
error_reporting(E_ALL ^ E_DEPRECATED);
//管理user的操作类
class MenuManager extends DBManager{
	
	public function MenuManager()
    {
        parent::DBManager();
		$this->CreateDBLink();
		$this->Menu = $this->GetMenu();
    }
	var $Menu;
	
	public function InsertDish($DishName,$DishPrice,$DishType){
		$this->CreateDBLink();
		$id = _DTYPEID($DishType)+(isset($this->Menu[$DishType])?count($this->Menu[$DishType]):0)+1;
		return $this->InsertDataToTable($GLOBALS['tables']['tMenu']['name'],
		[
			'DishID'=>'"'.$id.'"',
			'DishName'=>'"'.$DishName.'"',
			'DishPrice'=>'"'.$DishPrice.'"',
			'DishType'=>'"'.$DishType.'"']
		);
	}
	
	public function GetMenu(){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tMenu']['name'];
		$menuList = [];
		$result = mysql_query($sql,$this->dbLink);
		if($result){
			while($resultArray = mysql_fetch_array($result)){
				if(!isset($menuList[$resultArray['DishType']])){
					$menuList[$resultArray['DishType']] = [];
				}
				$menuList[$resultArray['DishType']][$resultArray['DishID']] = $resultArray;
				//echo $menuList[$resultArray['DishType']]['DishID'];
			}
			return $menuList;
		}else{
			return null;
		}
	}
	
	public function GetBaseMenu(){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tMenu']['name'];
		$menuList = [];
		$result = mysql_query($sql,$this->dbLink);
		if($result){
			while($resultArray = mysql_fetch_array($result)){
				$menuList[$resultArray['DishID']] = $resultArray;
				//echo $menuList[$resultArray['DishType']]['DishID'];
			}
			return $menuList;
		}else{
			return null;
		}
	}
	
}
?>