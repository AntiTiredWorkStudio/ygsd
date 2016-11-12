<?php
//$UM = new USManager();
//echo $UM->IsAdmintrator('oiqWTwmr-lCPaLJ8fnl3Qqv6wfkY');
include_once('Respond.php');
use EasyWeChat\Message\News;
$news_setting = new News([
    'title'       => '设置',
    'description' => '设置及公众号调试',
    'url'         => _URL('opt'),
    'image'       => 'http://ygsdjlk.online/YuanGu_Pro/sources/pangxtmenu.jpg',
]);

$news_AdminOrder = new News([
    'title'       => '接单面板',
    'description' => '您在此页面中将以店家的身份来控制用户的订单动向',
    'url'         => _URL('own','accd=admin'),
    'image'       => 'http://ygsdjlk.online/YuanGu_Pro/sources/pangxtmenu.jpg',
]);
$MsgList = [
	'接单'=>[
		'description'=>'接单',
			'methord'=>function() { 
			$UM = new USManager();
			if($UM->IsAdmintrator(MsgRespond::$LastMsg->userid)){
				return  $GLOBALS['news_AdminOrder'];
			}
			else{
				return '您没有这个权限!';
			}
		}
	],
//设置公众号的切换模式
	'切换到pro'=>[
		'description'=>'切换到pro',
			'methord'=>function() { 
			file_put_contents('bundleConfig.def','master');
			$menu = $GLOBALS['app']->menu;
			$menu->destroy(); 
			$menu->add($GLOBALS['buttons']);
			return '切换到了master分支！';
		}
	],
	'切换到test'=>[
		'description'=>'切换到test',
			'methord'=>function() { 
			file_put_contents('bundleConfig.def','development');
			$menu = $GLOBALS['app']->menu;
			$menu->destroy(); 
			$menu->add($GLOBALS['buttons']);
			return '切换到了development分支！';
		}
	],
	'郝国亮'=>[
			'description'=>'郝国亮',
			'methord'=>function() { 
			return "牛逼牛逼牛逼牛逼牛逼牛逼牛逼!";//.MsgRespond::$LastMsg->msgContent;
		}
	],
	'fuck'=>[
			'description'=>'fuck',
			'methord'=>function() { 
			return "fuck you without condom.";//.MsgRespond::$LastMsg->msgContent;
		}
	],
	'你妹'=>[
			'description'=>'你妹',
			'methord'=>function() { 
			return "我没妹，你有。";//.MsgRespond::$LastMsg->msgContent;
		}
	],
	'我饿了'=>[
			'description'=>'我饿了',
			'methord'=>function() { 
			return "我这里有一串优秀的DNA序列。";//.MsgRespond::$LastMsg->msgContent;
		}
	],
	'操'=>[
			'description'=>'操',
			'methord'=>function() { 
			return "滚!";//.MsgRespond::$LastMsg->msgContent;
		}
	],
	'你妈死了'=>[
			'description'=>'操',
			'methord'=>function() { 
			return "你妈才死了!";//.MsgRespond::$LastMsg->msgContent;
		}
	],
	'菜单'=>[
			'description'=>'菜单',
			'methord'=>function() { 
			return $GLOBALS['news_menu'];//.MsgRespond::$LastMsg->msgContent;
		}
	],'排号'=>[
			'description'=>'排号',
			'methord'=>function() { 
			return $GLOBALS['news_queue'];//.MsgRespond::$LastMsg->msgContent;
		}
	],'活动'=>[
			'description'=>'活动',
			'methord'=>function() { 
			return  [$GLOBALS['news_queue'],$GLOBALS['news_bale'],$GLOBALS["news_menu"],$GLOBALS["news_ind"]];//.MsgRespond::$LastMsg->msgContent;
		}
	],
	'管理'=>[
			'description'=>'管理权限',
			'methord'=>function() { 
			
			$US = 
				(new USManager());
			if(!$US->IsAdmintrator(MsgRespond::$LastMsg->userid)){
				return '还未注册!';
			}
			return $GLOBALS['news_setting'];//.MsgRespond::$LastMsg->msgContent;
		}
	],
	'konglf2112'=>[
			'description'=>'注册',
			'methord'=>function() { 
			$US = 
				(new USManager());
			
			//$u = $AM->GetUser(MsgRespond::$LastMsg->userid);
			if($US->IsAdmintrator(MsgRespond::$LastMsg->userid)){
				/*switch($u->State){
					case 'unline':
					return '已经注册了，无需再注册!';
					case 'unregisted':
					return '还未登陆，请登录。';
				}*/
				return '您已经是管理员了！';
			}else{
				$AM = new AdminManager();
				if($AM->InsertUser(MsgRespond::$LastMsg->userid)){
					return '您已成为管理员！';
				}else{
					return '登记失败';
				}
			}
		}
	],
	'我'=>[
			'description'=>'我',
			'methord'=>function() { 
			$AM = 
				(new AdminManager());
			$u = $AM->GetUser(MsgRespond::$LastMsg->userid);
			if(empty($u)){
				return '还未注册!';
			}else{
				return 'openid:'.$u['openid'].' | 状态:'.$u['State'].' | 注册日期:'.$u['getDate'].' | 注册时间:'.$u['getTime'];//var_export($u,TRUE);
			}
		}
	],
	constant("KEY")=>[
			'description'=>'管理员密码',
			'methord'=>function() { 
			if(!$AM->GetUser(MsgRespond::$LastMsg->userid)){
				return '还未注册!';
			}
			return '管理员密码正确!';//.MsgRespond::$LastMsg->msgContent;
		}
	],
];


class MsgRespond extends Respond{
	public static $LastMsg=null;
	var $userid;
	var $msgContent;
	function OnMsgSuccess(){
		
	}
		
	function OnMsgFailed(){
		return "我检测到了,您刚才输入的是:“".$this->msgContent."”，但是并没有这项指令喔。";
	}
	
	function MsgRespond($msg,$openid){
		self::$LastMsg= $this;
		$this->userid = $openid;
		$this->msgContent = $msg;
		parent::Respond($GLOBALS['MsgList'],$msg);
	}
}

?>