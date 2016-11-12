<?php
include_once('conf.php');
include_once('attach/WriteRecode.php');
include_once('responser/MsgResponser.php');
include_once('manager/USManager.php');
include_once('manager/AdminManager.php');
use EasyWeChat\Message\News;

		
//$url01 = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.urlencode('http://ygsdjlk.online/YuanGu_Pro/welcome.php').'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';  		
		
$news_bale = new News([
        'title'       => '吧乐卡牌游戏',
        'description' => '卡牌->玩法、卡牌分类->卡牌的图文介绍。（辅助游戏）',
        'url'         => _URL('card'),
        'image'       => 'http://ygsdjlk.online/YuanGu_Pro/sources/IMG_0725.JPG',
    ]);
$news_menu = new News([
    'title'       => '菜单（未来的点餐系统）',
    'description' => '菜品->菜品分类->菜品的图文介绍。（辅助点餐）',
    'url'         => _URL('men'),
    'image'       => 'http://ygsdjlk.online/YuanGu_Pro/sources/pangxtmenu.jpg',
]);

$news_queue = new News([
    'title'       => '排号（未来的排号系统）',
    'description' => '排号功能：排号人数、自己排号状态（未取号、已取号以及排位顺序、已过号提示重新取号）、取号、是否有座。附带店长页面，控制叫号，确认到店，确认过号，确认无座（关闭排号）。',
    'url'         => _URL('wel'),
    'image'       => 'http://ygsdjlk.online/YuanGu_Pro/sources/pangxtmenu.jpg',
]);

$news_ind = new News([
    'title'       => '主页',
    'description' => '访问主页',
    'url'         => _URL('ind'),
    'image'       => 'http://ygsdjlk.online/YuanGu_Pro/img/car/003f.jpg',
]);

$server = $app->server;

$server->setMessageHandler(function ($message) {
	if(isset($message->Event) && $message->Event == 'CLICK'){
		switch($message->EventKey){
			case 'V1001_Queue':
				return $GLOBALS['news_queue'];
			case 'V1001_BARLE':	
				return $GLOBALS['news_bale'];//"卡牌->玩法、卡牌分类->卡牌的图文介绍。（辅助游戏）";
			case 'V1001_Menu':
				return $GLOBALS["news_menu"];
			case 'V1001_All':
				return [$GLOBALS['news_queue'],$GLOBALS['news_bale'],$GLOBALS["news_menu"],$GLOBALS["news_ind"]];
			default:
				break;
		}
	}
	if($message->Event=='subscribe'){
		// return "您好！欢迎关注远古时代!";
		 return [$GLOBALS['news_queue'],$GLOBALS['news_bale'],$GLOBALS["news_menu"],$GLOBALS["news_ind"]];
	}
	if(isset($message->MsgType) && isset($message->MsgType) && $message->MsgType=='text'){
		return (new MsgRespond($message->Content,$message->FromUserName))->GetReturn();
	}
    return "您刚才输入的是:".$message;
});
$response = $app->server->serve();
// 将响应输出
$response->send(); // Laravel 里请使用：return $response;
?>