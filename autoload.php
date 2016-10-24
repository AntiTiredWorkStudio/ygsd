<?php
	include_once('conf.php');
	foreach($GLOBALS['rDirs'] as $key=>$value){
		if($value['autoload']=='false'){
			continue;
		}
		$list = _FILEALL(_URLD($key));
		if(!$list){
			continue;
		}
		foreach($list as $k=>$v){
			echo _URLD($key).'\\'.$v.'</br>';
			include_once((_URLD($key).'\\'.$v));
		}
		
	}

	function _FILEALL($dir) { 
		if(!is_dir($dir)){
			return null;
		}
		$handle=opendir($dir); 
		$i=0; 
		while($file=readdir($handle)) { 
			if (($file!= ". ")and($file!= ".. ") and substr($file,strlen($file)-3,3)=='php') { 
				$list[$i]=$file; 
				$i++; 
			} 
		} 
		closedir($handle); 
		return $list; 
	}
?>