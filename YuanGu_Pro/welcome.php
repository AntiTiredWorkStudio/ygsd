<!DOCTYPE html>
<html>
<head>
	<?php 
		include_once('../conf.php');
		include_once('../attach/accessor.php');
		include_once('../manager/SourcesManager.php');
		use SourcesManager as S;
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>欢迎界面</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/welcome.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <script type="text/javascript" src="js/jquery_1_11_1min.js" ></script>
  
    <script type="text/javascript" src="js/Mobile.js" ></script>
    <style type="text/css">
    	#Bz{ animation-iteration-count: infinite;}
    	#Xian{ animation-iteration-count: 3;}
    </style>
</head>
<body>
	<div class="top clearfix">
		<div class="beizi" id="Bz"></div>
		<div class="xian" id="Xian"></div>
	</div>
	<div class="mid clearfix">
		<a href="<?php echo _URL('ind');?>" class="input">马上体验</a>
	</div>
	<script type="text/javascript">
		$(function(){
			$('#Bz').addClass('animated swing');
			$('#Xian').addClass('animated rubberBand');
			//$('a').addClass('animated shake');
			setTimeout(function(){
				//$('#Bz').removeClass('animated swing');
			    $('#Xian').removeClass('animated rubberBand');
		        $('a').addClass('animated shake');
		    }, 3000);
      });
	</script>
</body>
</html>