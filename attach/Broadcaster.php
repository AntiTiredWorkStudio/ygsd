<?php
//群发助手
include_once('../conf.php');
use EasyWeChat\Message\News;
$news_AdminOrder = new News([
	'title'       => '接单面板',
	'description' => '您在此页面中将以店家的身份来控制用户的订单动向',
	'url'         => _URL('own','accd=admin'),
	'image'       => 'http://ygsdjlk.online/YuanGu_Pro/sources/pangxtmenu.jpg',
]);
class Broadcaster{
	var $broadcast;
	
	public function Broadcaster(){$this->broadcast = $GLOBALS['app']->broadcast;}
	
	public function BrocastNewsToAllAdmin(){
		$GLOBALS['app']->broadcast->previewNews('8SrdMI4to1UuOQkDABCadUdhEBP6Q_XUYVOnvRiFYUU','oiqWTwmr-lCPaLJ8fnl3Qqv6wfkY');
	//	$this->broadcast->sendNews('8SrdMI4to1UuOQkDABCadUdhEBP6Q_XUYVOnvRiFYUU');
	}
}
?>