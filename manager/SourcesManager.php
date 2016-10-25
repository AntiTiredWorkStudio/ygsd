<?php
//引用此页面前需先引用conf.php DBManager.php
include_once('DBManager.php');
use Qiniu\Auth;

error_reporting(E_ALL ^ E_DEPRECATED);
//管理user的操作类
class SourcesManager extends DBManager{
	public static function _CS($localPath,$size=1){
		$baseUrl = $GLOBALS['options']['qiniu_domain'].$localPath;
		$accessKey = $GLOBALS['options']['qiniu_ak'];
		$secretKey = $GLOBALS['options']['qiniu_sk'];
		$auth = new Auth($accessKey, $secretKey);
		$authUrl = $auth->privateDownloadUrl($baseUrl);
		$sm = new SourcesManager();
		$array = $sm->GetSource($localPath);
		$authUrl = $authUrl.'&imageView2/2/w/'.(int)round($size*$array['width']).'/h/'.(int)round($size*$array['height']);
		return $authUrl;
	}
	
	public static function isImage($filename){
		$types = '.gif|.jpeg|.png|.bmp';//检查的图片类型
		if(file_exists($filename)){
			$info = getimagesize($filename);
			$ext = image_type_to_extension($info['2']);
			return stripos($types,$ext);
		}else{
			return false;
		}
	}
	
	public function SourcesManager()
    {
        parent::DBManager();
		$this->CreateDBLink();
    }
	
	public function GetSource($key){
		$this->CreateDBLink();
		return $this->ExistSources($key);
	}
	
	public function InsertSources($index,$hash,$key,$type='text',$width=0,$height=0){
		$this->CreateDBLink();
		$this->InsertDataToTable($GLOBALS['tables']['tSources']['name'],[
					'id'=>'"'.$index.'"',
					'hash'=>'"'.$hash.'"',
					'key'=>'"'.$key.'"',
					'Type'=>'"'.$type.'"',
					'width'=>$width,
					'height'=>$height,
				],false);
	}
	
	public function ExistSources($key){
		$this->CreateDBLink();
		$sql = 'select * from '.$GLOBALS['tables']['tSources']['name'].' where `key`="'.$key.'"';
		//echo $sql;
		//file_put_contents("resultArray.txt",$sql);
		$result = mysql_query($sql,$this->dbLink);
		if($result){
			$resultArray = mysql_fetch_array($result);
			return $resultArray;
		}else{
			return null;
		}
	}
}
?>