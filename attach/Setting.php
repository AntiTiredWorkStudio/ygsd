<?php
include_once('../conf.php');
include_once('../responser/Respond.php');
$REQUEST = 'Setting.php?key='.constant("KEY").'&action=';
//设置命令列表
$ActionEventList = [
	'MenuInit'=>[
		'description'=>'初始化菜单',
		'methord'=>function() { 
				$menu = $GLOBALS['app']->menu;
				$menu->destroy(); 
				$menu->add($GLOBALS['buttons']);
				echo $GLOBALS['ActionEventList']['MenuInit']['description'];
		}
	] ,
	'MenuClear'=>[
		'description'=>'删除菜单',
		'methord'=>function() { 
				$menu = $GLOBALS['app']->menu;
				$menu->destroy(); 
				echo $GLOBALS['ActionEventList']['MenuClear']['description'];
		}
	] ,
	'InitDB'=>[
		'description'=>'初始化数据库',
		'methord'=>function() { 
				(new DBManager())->InitDB();
				echo $GLOBALS['ActionEventList']['InitDB']['description'];
		}
	] ,
	'ACTest'=>[
		'description'=>'测试Access_Token类',
		'methord'=>function() { 
			print_r((new ACManager())->C());
		}
	] ,
	'ACInsertTest'=>[
		'description'=>'测试Access_Token插入',
		'methord'=>function() { 
			(new ACManager())->InsertAccessToken('sadasdasdasdasdqwdwq');
		//			print_r();
		}
	] ,
	'ACGetTest'=>[
		'description'=>'测试Access_Token获取',
		'methord'=>function() { 
			echo (new ACManager())->GetNearestAccessToken('oiqWTwourx3IxuS0Ut9hphctOyT4');
		}
	] ,
	'UpdateACIndex'=>[
		'description'=>'重置Access_Token序号',
		'methord'=>function() { 
			echo (new ACManager())->UpdateACIndex();
		}
	] ,
	'SwitchToPro'=>[
		'description'=>'切换到Master分支',
		'methord'=>function() { 
			$menu = $GLOBALS['app']->menu;
			$menu->destroy(); 
			$menu->add($GLOBALS['buttons']);
			file_put_contents('bundleConfig.def','master');
			echo '切换到Master分支';
		}
	] ,
	'SwitchToTest'=>[
		'description'=>'切换到Development分支',
		'methord'=>function() { 
			$menu = $GLOBALS['app']->menu;
			$menu->destroy(); 
			$menu->add($GLOBALS['buttons']);
			file_put_contents('bundleConfig.def','development');
			echo '切换到Development分支';
		}
	] ,
	'CheckBundle'=>[
		'description'=>'测试当前bundle',
		'methord'=>function() { 
			echo _URL('ind');
		}
	] ,
	'InsertMenuDish'=>[
		'description'=>'插入菜品',
		'methord'=>function() { 
		include_once('InsertDish.php');
		//	(new MenuManager())->InsertDish();
			//echo _URL('ind');
		}
	] ,
];




class SettingRespond extends Respond{
	function OnMsgSuccess(){
		echo "</br><a style = 'font-size:30px; color:#999999' href='".$GLOBALS["REQUEST"]."null'>返回</a></br>";
	}
		
	function OnMsgFailed(){
		echo '<h1>动作菜单:</h1>';
		$index = 1;
		foreach($GLOBALS['ActionEventList'] as $key=>$value){
			echo "<a style = 'font-size:30px; color:#999999' href='".$GLOBALS["REQUEST"].$key."'>".$index.'.'.$key."-".$value['description']."</a></br>";
			$index++;
		}
	}
}




//响应部分
if(isset($_GET['key'])){
	if(constant("KEY")!= $_GET['key']){
		echo "身份验证失败!";
		exit;
	}
	new SettingRespond($GLOBALS['ActionEventList'],(isset($_GET['action']))?$_GET['action']:'');
}else{
	echo "身份验证失败!";
}


?>