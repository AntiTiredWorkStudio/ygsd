<?php
$RCcontent = time()." \n";
$RCindex = 0;
$RCcontent = $RCcontent."GET List:\n";
foreach($_GET as $key=>$value){
	$RCindex++;
	$RCcontent = $RCcontent.$RCindex.'.'.$key.'=>'.$value."\n";
}

$RCindex = 0;
$RCcontent = $RCcontent."\nPOST List:\n";
foreach($_POST as $key=>$value){
	$RCindex++;
	$RCcontent = $RCcontent.$RCindex.'.'.$key.'=>'.$value."\n";
}

$RCcontent = $RCcontent."\n";

file_put_contents('getLog.txt',$RCcontent,FILE_APPEND);

function ShowLog(){
	echo $GLOBALS['RCcontent'];
}
?>