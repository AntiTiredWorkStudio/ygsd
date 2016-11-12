<!DOCTYPE html>
<html>
	<head>
		<?php 
			include_once('../conf.php');
			include_once('../attach/Accessor.php');
			include_once('../manager/OrderManager.php');
			include_once('../manager/MenuManager.php');
			include_once('../manager/SourcesManager.php');
			include_once('../attach/Broadcaster.php');
			use SourcesManager as S;
			
			
			
			$accd = '';
			if(isset($_GET['accd'])){
				$accd = 'accd='.$_GET['accd'];
				include_once('../manager/USManager.php');
				//这里的引用容易出现问题
			}
			
			$OM = new OrderManager();
			
			
			if(isset($_GET['a']) && $_GET['a']=='Submiting'){
				$OM->UpdateOrderStatus($_GET['od'],'Submited');
				$AM = new Broadcaster();
				$AM->BrocastNewsToAllAdmin();
			}
			
			if(isset($_GET['od'])){
				$order = $OM->GetSingleOrder($_GET['od']);
				$dishes = $OM->GetDishes($_GET['od']);
			}else{
				echo '不知道你要请求的是哪个订单.';
				exit;
			}
		?>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!--css部分-->
		<link rel="stylesheet" href="css/common.css" />
		<link rel="stylesheet" href="css/index.css" />
		<!--JS部分-->
		<script type="text/javascript" src="js/jquery_1_11_1min.js" ></script>
		<!--<script type="text/javascript" src="js/do.js"></script>-->
		<script type="text/javascript" src="js/Mobile.js" ></script>
		<title>订单详情</title>
	</head>
	<style type="text/css">
		
	</style>
	<body>
		<div class="menu_header clearfix">
			<div class="bao">
				<span>订单详情</span>
			    <a href="<?php echo _URL('own',$accd);?>" class="left"></a>
			    <a href="<?php echo _URL('ind');?>" class="right">退出</a>
			</div>
		</div>
		<div class="menu_content">
			<ul class="detail_list">
			<div class="top">
			  <li>订单状态：<span class="status"><?php echo _STATE($order['State']);?></span></li>	
			  <li>订单时间：<span class="time"><?php echo $order['OrderDate'];?></span>
			  	<span class="time"><?php echo $order['OrderTime'];?></span>
			  </li>	
			  <li>订单编号：<span class="id_num"><?php echo $order['OrderID'];?></span></li>
			  <?php if($accd != ''){?>
			  <li>订单归属人：<span class="id_num"><?php echo (new USManager())->GetUser($order['UserID'])['nickname'];?></span></li>	
			   <li>联系电话：<span class="id_num"><?php echo (new USManager())->GetUser($order['UserID'])['tele'];?></span></li>	
			  <?php }?>		  
			</div>
			<table class="medium">
			<?php 
			
			$total = 0;
			$Menu = (new MenuManager())->GetBaseMenu();
			foreach($dishes as $key=>$value){ 
				$currentCount =  $value['DishCount'];
				$current = $Menu[$value['DishID']]['DishPrice']*$currentCount;
				$total+=$current;
			?>
				<tr>
					<td><?php echo $Menu[$value['DishID']]['DishName'];?></td>
					<td>×<?php echo $currentCount;?></td>
					<td>￥<?php echo $current;?></td>
				</tr>
			<?php }?>
			</table>
			<!--div class="detail_pass">
				<li>配送费：<span class="rate_color">20.0</span></li>	
			</div-->
			<div class="detail_bottom ">
				<li>总计：<span class="rate_color">￥<?php echo $total;?></span></li>	
			</div>
		</ul>
		</div>
		<?php 
			if($accd==''){
				if(($order['State'])=='Submiting'){?>
		<div class="shop_order">
			<a href="<?php echo _URL('ownd','a=Submiting&od='.$_GET['od']);?>">
				<input type="button" value="确认订单" />
			</a>
		</div>
		<?php }?>
		<?php if(($order['State'])=='Submited'){?>
		<div class="shop_order" onclick="alert('已经提醒!');">
			<a href="<?php echo _URL('ownd','a=Submited&od='.$_GET['od']);?>">
				<input type="button" value="提醒商家接单" />
			</a>
		</div>
		<?php }?>
		<?php if(($order['State'])=='Accepted'){?>
		<div class="shop_order" onclick="alert('已催!');">
			<a href="<?php echo _URL('ownd','a=Accepted&od='.$_GET['od']);?>">
				<input type="button" value="催单" />
			</a>
		</div>
		<?php }?>
		<?php if(($order['State'])=='Success' || ($order['State'])=='Close'){?>
		<div class="shop_order">
			<a href="<?php echo _URL('men');?>">
				<input type="button" value="再来一单" />
			</a>
		</div>
		<?php }
			}
		?>
		<div class="footer">
        	<div class="top">
	        	<ul>
	        		<li><a href="<?php echo _URL('ind');?>"><div><img src="img/li_1.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp首页</span></div></a></li>
	        		<li><a href="<?php echo _URL('men');?>"><div><img src="img/li_2.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp点餐</span></div></a></li>
	        		<li><a href="<?php echo _URL('sho');?>"><div><img src="img/li_3.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp商城</span></div></a></li>
	        		<li><a href="<?php echo _URL('card');?>"><div><img src="img/li_4.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp游戏</span></div></a></li>
	        		<li class="active"><a href="<?php echo _URL('own');?>"><div><img src="img/li_5.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp我的</span></div></a></li>
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
