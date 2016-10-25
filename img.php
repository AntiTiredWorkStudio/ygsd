<?php
	include_once('conf.php');
	include_once('manager/SourcesManager.php');
	use SourcesManager as S;
	$sm = S::_CS('img/wb.png');
	echo '<img src="'.$sm.'"></img>';
?>