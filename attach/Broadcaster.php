<?php
//群发助手
include_once('../manager/AdminManager.php');
use EasyWeChat\Message\News;
$news_AdminOrder = new News([
	'title'       => '接单面板',
	'description' => '您在此页面中将以店家的身份来控制用户的订单动向',
	'url'         => _URL('own','accd=admin'),
	'image'       => 'http://ygsdjlk.online/YuanGu_Pro/sources/pangxtmenu.jpg',
]);
class Broadcaster{
	//var $broadcast;
	var $notice;// = $app->notice;
	public function Broadcaster(){
		//$this->broadcast = $GLOBALS['app']->broadcast;
		$this->notice = $GLOBALS['app']->notice;
	}
	
	public function BrocastTextToAllAdmin($userid , $url,$datas){
		$AM = new AdminManager();
		foreach($AM->GetAllAdmins() as $key=>$value){
			$messageId = $this->notice->send([
				'touser' => $value,
				'template_id' => 'fhm2e714oREX-DdfjNTXg47TpeVC0yXVHpSJYwWYUVs',
				'url' => $url,
				'topcolor' => '#ff0000',
				'data' => $datas,
			]);
		}
		
	//	$GLOBALS['app']->broadcast->previewNews('8SrdMI4to1UuOQkDABCadUdhEBP6Q_XUYVOnvRiFYUU','oiqWTwmr-lCPaLJ8fnl3Qqv6wfkY');
	//echo empty($GLOBALS['app']->broadcast->sendText($text));
	//	$this->broadcast->sendText($text);
	}
}
?>