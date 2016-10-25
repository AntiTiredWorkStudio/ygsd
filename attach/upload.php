<?php
include_once('../conf.php');
include_once('../manager/SourcesManager.php');


  use Qiniu\Auth;
  use Qiniu\Storage\UploadManager;

	$SM = new SourcesManager();
	//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames

	  //print_r ($filesnames);

  
  $accessKey = $options['qiniu_ak'];
  $secretKey = $options['qiniu_sk'];
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
  ini_set("max_execution_time", "120");
  $count = 0;
  foreach($dirlist as $d){
	$filesnames = scandir(_URLD($d));
	foreach ($filesnames as $name) {
		if($name == '.' || $name == '..'){
			continue;
		}
		
		//
		
		$filePath = _URLD($d).'/'.$name;
		if(!is_file($filePath)){
			continue;
		}
		if(SourcesManager::isImage($filePath)){

			list($width, $height, $type, $attr) = getimagesize($filePath);

			$key = $d.'/'.$name;
			// 初始化 UploadManager 对象并进行文件的上传
			$uploadMgr = new UploadManager();
			
			// 调用 UploadManager 的 putFile 方法进行文件的上传
			list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
			$count++;
			if(!$SM->ExistSources($err['key'])){
				$SM->InsertSources($count,$ret['hash'],$ret['key'],'image',$width, $height);
			}
			echo "\n====> putFile result: \n";
			if ($err !== null) {
				var_dump($err);
			} else {
				var_dump($ret);
			}echo $name . "<br/>";
		}
	}
  }
  echo '总共上传完毕'.$count.'个文件。';
  ini_set("max_execution_time", "30");
  exit;
    
?>