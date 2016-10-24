<?php 
//引用此页面前需先引用conf.php
	include_once('../conf.php');
	include_once('../manager/ACManager.php');
	include_once('../manager/USManager.php');
	$code= '';
	session_start();
	//echo 'accessor';
	if(isset($_GET['code'])){
		$_SESSION['code'] = $_GET['code'];
		$code = $_GET['code'];
	}
	if($code==''){}else{
		// echo $_SERVER['HTTP_HOST'];
		new accessor($options,$code);
	}
	
	
	class accessor{
		var $access_token;
		var $openID;
		var $ACM;
		var $options;
		var $code;
		//定义了但是先不想用
		function SaveUserInfoToCookie($user_obj){
			if(isset($user_obj['nickname'])){
				setcookie('_name',$user_obj['nickname'],time()+720000);
			}
		}
		function GetUserInfoStruct(){
			//echo "<script>alert('开始获取用户数据');</script>";
			$USM = new USManager();
			$user_obj = $USM->GetUser($this->openID);
			if(isset($user_obj['nickname'])){
				//setcookie('name',$user_obj['nickname'],time()+100);
				//echo "<script>alert('从数据库获取个人信息');</script>";
				//$this->SaveUserInfoToCookie($user_obj);
				return $user_obj;
			}
			//}else{
				$get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$this->access_token.'&openid='.$this->openID.'&lang=zh_CN';
				
				$ch = curl_init();  
				curl_setopt($ch,CURLOPT_URL,$get_user_info_url);  
				curl_setopt($ch,CURLOPT_HEADER,0);  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );  
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);  
				$res = curl_exec($ch);  
				curl_close($ch);  
				//解析json  
				//echo '</br></br>';
				$user_obj = json_decode($res,true);
				if(!empty($user_obj['errcode'])){
					echo "<script>alert('".$user_obj['errcode']."');</script>";
				}
				//$this->SaveUserInfoToCookie($user_obj);
				//echo "<script>alert('通过access_token和openid获取个人信息".$user_obj['nickname']."');</script>";
			//}
			return $user_obj;
		}
		function initUserEntracne($a_t,$openid){
			//echo "<script>alert('initUserEntracne');</script>";
			$user_obj = $this->GetUserInfoStruct();
			if(!empty($user_obj['errcode']) && $user_obj['errcode']==42001){
				//echo "<script>alert('access_token 过期');</script>";
				$this->UpdateAccessToken();
				$user_obj = $this->GetUserInfoStruct();
			}
			
			if(!$this->ACM->ExistRowInTable($GLOBALS['tables']['tUser']['name'],['UserID'=>['var'=>'"'.$openid.'"','log'=>'']],true)){
				//echo "<script>alert('未检测到用户，跳转到注册页面');</script>";
				
					setcookie('name',$user_obj['nickname'],time()+720000);
				
					setcookie('openid',$user_obj['openid'],time()+720000);
				
					setcookie('table',$GLOBALS['tables']['tUser']['name'],time()+100);
					//echo "<script>alert('".$_COOKIE['name'].' '.$_COOKIE['openid'].' '.$_COOKIE['table']."');</script>";
				
				Header('Location:'._URL('reg'));
				
			}else{
				//echo "<script>alert('检测到用户注册');</script>";
				
			}
			
		}
		function initTokenAndIDByCache(){
			$this->openID = $_COOKIE['openid'];
			$this->ACM = new ACManager();
			$this->access_token = $this->ACM ->GetNearestAccessToken($this->openID);
			//echo "<script>alert('".$this->access_token."');</script>";
			if(!($this->access_token)){
				$this->UpdateAccessToken();
				//echo '<script>location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
			}
		}
		
		
		//jhkkbjhbkhbkhbkhjb
		function UpdateAccessToken(){
			$get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->options['app_id'].'&secret='.$this->options['secret'].'&code='.$this->code.'&grant_type=authorization_code';  
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$get_token_url);  
			curl_setopt($ch,CURLOPT_HEADER,0);  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );  
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
			$res = curl_exec($ch);   
			curl_close($ch);  
			$json_obj = json_decode($res,true); 
			$access_token = $json_obj['access_token'];   
			$openid = $json_obj['openid'];
			$this->ACM = new ACManager();
			setcookie('openid',$openid,time()+720000);
			$this->ACM ->InsertAccessToken($access_token,$openid); 
			$this->access_token = $access_token;
			$this->openID = $openid;
			//echo "<script>alert('重新获取 access_token ');</script>";
		}
		function accessor($options,$code){
			//getcookie('openid',360000);
			$this->options = $options;
			$this->code = $code;
			if(isset($_COOKIE['openid'])){
				//echo "<script>alert('has openid:".$_COOKIE['openid']."');</script>";
				$this->initTokenAndIDByCache();
			}else{
			//	echo "<script>alert('no openid update access_token');</script>";
				$this->UpdateAccessToken();
			}
			
			$this->initUserEntracne($this->access_token ,$this->openID);
		}
	}
?>  