<?php
include_once('conf.php');
  use Qiniu\Auth;
  use Qiniu\Storage\UploadManager;



	//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames

	  //print_r ($filesnames);

  
  $accessKey = 'd-SztTGFAV7_BX-dKRtM8y1diABoXe1zxCgd-2yi';
  $secretKey = 'CWv29dzAFng2KZ15Cf21Pv6FoOoWtB3-nzh1zgJH';
  $auth = new Auth($accessKey, $secretKey);

  // 空间名  http://developer.qiniu.com/docs/v6/api/overview/concepts.html#bucket
  $bucket = 'ygsdjkl';
  
  // 生成上传Token
  $token = $auth->uploadToken($bucket);
  
  $dirlist = [
	'sources',
	'img',
	'img/car',
	'img/cigarette',
	'img/drink',
	'img/man'
  ];
  foreach($dirlist as $d){
	$filesnames = scandir(_URLD($d));
	foreach ($filesnames as $name) {
		if($name == '.' || $name == '..'){
			continue;
		}
		
		//
		
		$filePath = _URLD($d).'/'.$name;
		if(!file_exists($filePath)){
			continue;
		}

		$key = $d.'/'.$name;
		// 初始化 UploadManager 对象并进行文件的上传
		$uploadMgr = new UploadManager();

		// 调用 UploadManager 的 putFile 方法进行文件的上传
		list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
		
		echo "\n====> putFile result: \n";
		if ($err !== null) {
			var_dump($err);
		} else {
			var_dump($ret);
		}echo $name . "<br/>";
	}
  }
  exit;
    
?>