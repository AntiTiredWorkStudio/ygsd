<!DOCTYPE html>
<html>	
	<?php 
		include_once('../conf.php');
		include_once('../attach/Accessor.php');
	?>  
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" href="css/common.css" />
		<link rel="stylesheet" href="css/index.css" />
	    <link rel="stylesheet" href="css/unslider.css" />
	    <link rel="stylesheet" href="css/unslider-dots.css" />
		<script type="text/javascript" src="js/jquery_1_11_1min.js" ></script>
		<script type="text/javascript" src="js/Mobile.js" ></script>
		<script type="text/javascript" src="js/unslider-min.js" ></script>
		<title>远古时代</title>
	</head>
	<body>
		<audio src="mp3/who.mp3"  autobuffer="autobuffer" id="mus"></audio>
		<div class="header clearfix">
			<div class="top clearfix">
				<div class="left"></div>
				<div class="center"></div>
				<div class="logo"></div>
				<script type="text/javascript">
				    //$('#mus').play(); 
				/*    var mus = document.getElementById('mus');
				    $('.logo').addClass('open');
				    mus.play();
					$('.logo').click(function(){
						if($(this).hasClass('open')){
							 $('.logo').removeClass('open');
							 mus.pause();
						}else{
							 $('.logo').addClass('open');
							mus.play();
						}
					});*/
				</script>
			</div>
			<div class="ban"></div>
		</div>
		<div class="slider clearfix" >
    	   <ul>
    		<li>
    			<img src="http://ofaj2dlq0.bkt.clouddn.com/sources/IMG_0725.JPG">
    		    <div>本店盛大开业</div>
    		</li>
    		<li><img src="http://ofaj2dlq0.bkt.clouddn.com/sources/IMG_0726.JPG">
    		    <div>本店开张，招收各地有志之士</div>
    		</li>
    		<li>
    			<img src="http://ofaj2dlq0.bkt.clouddn.com/sources/IMG_0727.JPG">
    			<div>到店享受即刻8折优惠</div>
    		</li>
    		<li>
    			<img src="http://ofaj2dlq0.bkt.clouddn.com/sources/IMG_0728.JPG">
    		    <div>high到爆的夜场生活</div>
    		</li>
    	</ul>
        </div>
         <script type="text/javascript">
    	$('.slider').unslider({
				animation:'horizontal',
				autoplay:true,
				arrows:true,
				infinite: true,
				easing: 'swing',
			});
    </script>
        <div class="content clearfix">
        	<div class="bao">
        		<div class="left clearfix">
	        		<span>热门推荐</span>
	        		<img src="img/list_1.png" style = "height:0.16rem;">
        	    </div>
        	    <div class="right clearfix">
        	        <a href="<?php echo _URL('ind');?>"><img src="img/list_right.png"></a>	
        	    </div>
        	</div>
        	<div class="border_Bottom clearfix"></div>
        	<div class="di">
        		<li>
        			<a href="<?php echo _URL('wel');?>"><img src="img/img1.png"></a>
					<a href="<?php echo _URL('wel');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img2.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img2.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img1.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img2.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img2.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        	</div>
        </div>
        
        <div class="content clearfix">
        	<div class="bao">
	        	<div class="left clearfix">
	        		<span>吧乐互动</span>
	        		<img src="img/list_2.png" style = "height:0.21rem;">
	        	</div>
	        	<div class="right clearfix">
	        	    <a href="<?php echo _URL('ind');?>"><img src="img/list_right.png"></a>	
	        	</div>
        	</div>
        	<div class="border_Bottom clearfix"></div>
        	<div class="di1">
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img1.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img2.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img2.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img1.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img2.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        		<li>
        			<a href="<?php echo _URL('ind');?>"><img src="img/img2.png"></a>
					<a href="<?php echo _URL('ind');?>"><span>context</span></a>
        		</li>
        	</div>
        </div>
        <div class="topic"></div>
        <div class="footer ">
        	<div class="top">
	        	<ul>
	        		<li class="active"><a href="<?php echo _URL('ind');?>"><div><img src="img/li_1.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp首页</span></div></a></li>
	        		<li><a href="<?php echo  _URL('men');?>"><div><img src="img/li_2.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp点餐</span></div></a></li>
	        		<li><a href="<?php echo _URL('sho');?>"><div><img src="img/li_3.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp商城</span></div></a></li>
	        		<li><a href="<?php echo _URL('card');?>"><div><img src="img/li_4.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp游戏</span></div></a></li>
	        		<li><a href="<?php echo _URL('own');?>"><div><img src="img/li_5.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp我的</span></div></a></li>
	        	</ul>
        	</div>
        	<script type="text/javascript">
        		$('.top li').click(function(){
        			$(this).siblings().removeClass('active');
        			$(this).addClass('active');
        		});
        	</script>
        </div>
	</body>
</html>
