<?php
//include_once('../conf.php');
class Respond{
	public function OnMsgSuccess(){
		return '请求成功';
	}
	
	
	public function OnMsgFailed(){
		return '请求失败';
	}
	
	var $result;
	
	public function Respond($EventList,$msg){
		if(isset($msg)){
		//	echo "Msg:".$msg;
			if(isset($EventList[$msg])){
				$this->result = $EventList[$msg]['methord']();
				$this->OnMsgSuccess();}
				else{$this->result=$this->OnMsgFailed();}
				
		}else{$this->result=$this->OnMsgFailed();}
	}
	
	public function GetReturn(){
		return $this->result;
	}
}
?>