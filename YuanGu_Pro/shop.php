<!DOCTYPE html>
<html>
	<?php 
		include_once('../conf.php');
		include_once('../attach/Accessor.php');
		include_once('../manager/SourcesManager.php');
		use SourcesManager as S;
	?>  
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" href="css/common.css" />
		<link rel="stylesheet" href="css/index.css" />
		
		<script type="text/javascript" src="js/jquery_1_11_1min.js" ></script>
		<!--<script type="text/javascript" src="js/spider.js" ></script>-->
		<script type="text/javascript" src="js/do.js"></script>
		<script type="text/javascript" src="js/Mobile.js" ></script>
		<title>商城</title>
		<style type="text/css">
            /*分类导航*/
		    .fenlei{width: 100%;float: left;position: fixed;left: 0;top:0.8rem;background-color: #97694F;font-size: 0.25rem;z-index: 9999}
		    .fenlei li{float: left;padding: 0.1rem 0;margin-left: 5%}
		    .fenlei li+li{margin-left: 10%}
		    .fenlei li a{color: white}
			/*菜品展示*/
			.bao90{width: 90%;margin: 0 auto;}
			.bao85{width: 85%;margin: 0 auto;}
			.bao90 .cai{width:48%;height: 60%;float: left;border-bottom: #999 thin solid;padding-bottom: 0.2rem}
			.cai:nth-child(even){border-left: #999 thin solid; }
			.bao90 .cai .pic{width: 90%;height: 70%;margin: 0 auto;text-align: center;position: relative;z-index: 1;margin-top: 0.15rem}
			.bao90 .cai .pic .care{width: 0.5rem;height: 0.5rem;position: absolute;top: 0;right: 0;z-index:2;background-image: url(img/xin.png);background-repeat: no-repeat;background-position: 0px 0px;background-size: cover;
			}
			.bao90 .cai .pic .active{width: 0.5rem;height: 0.5rem;position: absolute;top: 0;right: 0;background-image: url(img/xin.png);background-repeat: no-repeat;background-position: 0px 90% !important;background-size: cover;}
            .bao90 .cai .pic img{width: 100%;height: 100%}
            .jieshao{width: 90%;margin: 0 auto}
            .jieshao p{padding-top: 5px}
            .caipin{overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color: #666;display: block;margin-top: 0.20rem}
            .caipin2{overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color: #999;font-size: 0.2rem}
            .dianzan{overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color: #999;font-size: 0.2rem}
		</style>
	</head>
	<body>
		<div class="menu_header clearfix">
			<div class="bao">
				<span>商品展示</span>
			    <a href="<?php echo _URL('ind');?>" class="left"></a>
			    <a href="<?php echo _URL('ind');?>" class="right">退出</a>
			</div>
		</div>
		<div class="fenlei">
			<div class="bao85">
				<li><a href="<?php echo _URL('sho','');?>">全部</a></li>
				<li><a href="<?php echo _URL('sho','t=bread');?>">面包</a></li>
				<li><a href="<?php echo _URL('sho','t=milk');?>">牛奶</a></li>
				<li><a href="<?php echo _URL('sho','t=chock');?>">巧克力</a></li>
				<li><a href="<?php echo _URL('sho','t=cake');?>">蛋糕</a></li>
			</div>
		</div>
		<div class="menu_content clearfix" style="margin-top: 1.3rem">
            <div class="bao90">
             <!--  第一个 -->
			 <?php if((isset($_GET['t']) && ($_GET['t']=='bread')) || !isset($_GET['t'])){?>
            	<div class="cai">
            		<div class="pic">
            		<section class="care"></section>
            			<a href="#"><img src="sources/IMG_0725.JPG"></a>
            		</div>
            		<div class="jieshao">
	            		<p class="caipin">我们就是反人累,嗯~</p>
	            		<p class="caipin2">量大,美味,老牛逼了,吃得老爽了~</p>
	            		<p class="dianzan">已有<font color="red">100</font>人点赞</p>
            	    </div>
            	</div>
			 <?php }?>
            	  <!--  第一个 -->
            	<div class="cai">
            		<div class="pic">
            		<section class="care"></section>
            			<a href="#"><img src="sources/IMG_0725.JPG"></a>
            		</div>
            		<div class="jieshao">
	            		<p class="caipin">我们就是反人累,嗯~</p>
	            		<p class="caipin2">量大,美味,老牛逼了,吃得老爽了~</p>
	            		<p class="dianzan">已有<font color="red">100</font>人点赞</p>
            	    </div>
            	</div>
            	  <!--  第一个 -->
            	<div class="cai">
            		<div class="pic">
            		<section class="care"></section>
            			<a href="#"><img src="sources/IMG_0725.JPG"></a>
            		</div>
            		<div class="jieshao">
	            		<p class="caipin">我们就是反人累,嗯~</p>
	            		<p class="caipin2">量大,美味,老牛逼了,吃得老爽了~</p>
	            		<p class="dianzan">已有<font color="red">100</font>人点赞</p>
            	    </div>
            	</div>
            	  <!--  第一个 -->
            	<div class="cai">
            		<div class="pic">
            		<section class="care"></section>
            			<a href="#"><img src="sources/IMG_0725.JPG"></a>
            		</div>
            		<div class="jieshao">
	            		<p class="caipin">我们就是反人累,嗯~</p>
	            		<p class="caipin2">量大,美味,老牛逼了,吃得老爽了~</p>
	            		<p class="dianzan">已有<font color="red">100</font>人点赞</p>
            	    </div>
            	</div>
            	  <!--  第一个 -->
            	<div class="cai">
            		<div class="pic">
            		<section class="care"></section>
            			<a href="#"><img src="sources/IMG_0725.JPG"></a>
            		</div>
            		<div class="jieshao">
	            		<p class="caipin">我们就是反人累,嗯~</p>
	            		<p class="caipin2">量大,美味,老牛逼了,吃得老爽了~</p>
	            		<p class="dianzan">已有<font color="red">100</font>人点赞</p>
            	    </div>
            	</div>
            	  <!--  第一个 -->
            	<div class="cai">
            		<div class="pic">
            		<section class="care"></section>
            			<a href="#"><img src="sources/IMG_0725.JPG"></a>
            		</div>
            		<div class="jieshao">
	            		<p class="caipin">我们就是反人累,嗯~</p>
	            		<p class="caipin2">量大,美味,老牛逼了,吃得老爽了~</p>
	            		<p class="dianzan">已有<font color="red">100</font>人点赞</p>
            	    </div>
            	</div>
            </div>
        </div>
		<script type="text/javascript">
			$('.cai section').click(function() {
				   if($(this).hasClass('active')){
						alert("您已经赞过了!");
				   //	$(this).removeClass('active');
				   }else{
				   	 $(this).addClass('active');
				   }
            });
		</script>
		<div style="width: 100%;float: left;height: 2.0rem;visibility: hidden;">xxxxxxxxxxx</div>
		
		<div class="footer ">
        	<div class="top">
	        	<ul>
	        		<li><a href="<?php echo _URL('ind');?>"><div><img src="<?php echo S::_CS("img/li_1.png"); ?>"></div><div><span style="font-size:12px; color:#FFF;">&nbsp首页</span></div></a></li>
	        		<li><a href="<?php echo  _URL('men');?>"><div><img src="<?php echo S::_CS("img/li_2.png"); ?>"></div><div><span style="font-size:12px; color:#FFF;">&nbsp点餐</span></div></a></li>
	        		<li class="active"><a href="<?php echo _URL('sho');?>"><div><img src="<?php echo S::_CS("img/li_3.png"); ?>"></div><div><span style="font-size:12px; color:#FFF;">&nbsp商城</span></div></a></li>
	        		<li><a href="<?php echo _URL('card');?>"><div><img src="<?php echo S::_CS("img/li_4.png"); ?>"></div><div><span style="font-size:12px; color:#FFF;">&nbsp游戏</span></div></a></li>
	        		<li><a href="<?php echo _URL('own');?>"><div><img src="<?php echo S::_CS("img/li_5.png"); ?>"></div><div><span style="font-size:12px; color:#FFF;">&nbsp我的</span></div></a></li>
	        	</ul>
        	</div>
        	
        </div>
	</body>
</html>
