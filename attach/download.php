<?php
	include_once('../conf.php');
	use Qiniu\Auth;

  
	$accessKey = $options['qiniu_ak'];
	$secretKey = $options['qiniu_sk'];
	$auth = new Auth($accessKey, $secretKey);


    //baseUrl构造成私有空间的域名/key的形式
    $baseUrl = 'http://ofaj2dlq0.bkt.clouddn.com/img/BuynBtn.png';
    $authUrl = $auth->privateDownloadUrl($baseUrl);
    echo $authUrl;
?>
