<!DOCTYPE html>
<html>
	<head>
		<?php 
			include_once('../conf.php');
			include_once('../attach/Accessor.php');
			include_once('../manager/OrderManager.php');
			include_once('../manager/SourcesManager.php');
			use SourcesManager as S;
			$accd = '';
			if(isset($_GET['accd'])){
				$accd = 'accd='.$_GET['accd'];
			}
			$OM = new OrderManager();
			$orders = ($accd=='')?($OM->GetOrder($_COOKIE['openid'])):($OM->GetAllOrder());
			
			$USM = new USManager();
			$user_obj = $USM->GetUser($_COOKIE['openid']);
		//	(new DBManager())->
			//foreach($user_obj as $key=>$value){
			//	echo $key.'=>'.$value;
			//}
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
		<title><?php echo ($accd==''?'订单列表':'店家页面');?></title>
		<style type="text/css">
			
		</style>
	</head>
	<body>
		<div class="menu_header clearfix">
			<div class="bao">
				<span><?php echo ($accd==''?$user_obj['nickname']:'全部');?>的订单</span>
			    <a href="<?php echo _URL('ind');?>" class="left"></a>
			    <a href="<?php echo _URL('ind');?>" class="right">退出</a>
			</div>
		</div>
		<div class="menu_content clearfix" style="overflow:auto;height:400px;">
			<ul class="shop_list">
			<?php 
				foreach($orders as $key=>$value){
					if($accd !='' && $value['State'] == 'Submiting'){
						continue;
					}
			?>
			<div class="dingdan_mr">
				<li><a href="<?php echo _URL('ownd','od='.$value['OrderSecret'].($accd==''?'':('&'.$accd)));?>">
					<?php if($accd!=''){?>
					<span class="dingdan_name"><?php echo $USM->GetUser($value['UserID'])['nickname'];?></span>
				</li>	<?php }?>
				<li class="dingdan_li">	
				    <span class="dingdan_time"><?php echo $value['OrderDate'];?></span>
					<span class="dingdan_time"><?php echo $value['OrderTime'];?></span>
					<span class="dingdan_status"><?php echo _STATE($value['State']);?></span>
					<span class="dingdan_rate">￥<?php echo $value['OrderPrice'];?></span>
				</a></li>
		    </div>
			<?php }?>
			</ul>
		</div>
		
		<div class="shop_order">
			<a href="<?php echo _URL('men');?>">
				<input type="button" value="返回菜单" />
			</a>
		</div>
		<div class="footer ">
        	<div class="top">
	        	<ul>
	        		<li><a href="<?php echo _URL('ind');?>"><div><img src="img/li_1.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp首页</span></div></a></li>
	        		<li><a href="<?php echo _URL('men');?>"><div><img src="img/li_2.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp点餐</span></div></a></li>
	        		<li><a href="<?php echo _URL('sho');?>"><div><img src="img/li_3.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp商城</span></div></a></li>
	        		<li><a href="<?php echo _URL('card');?>"><div><img src="img/li_4.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp游戏</span></div></a></li>
	        		<li class="active"><a href="<?php echo _URL('own',$accd);?>"><div><img src="img/li_5.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp我的</span></div></a></li>
	        	</ul>
        	</div>
        	<script type="text/javascript">
        		$('.top li').click(function(){
        			$(this).siblings().removeClass('active');
        			$(this).addClass('active');
        		});
        		$(document).ready(function(){
        			$("#jiesuan").click(function(){
        				$.ajax({
        					type:"get",
        					url:"",
        					async:true,
        					dataType:"json",
        					success:function(data){
        						if(data.success){
        							$(".express").html(data.msg);
        						}else{
        							$(".express").html("出现错误："+data.msg);
        						}
        					},
        					error:function(jqXHR){
        						alert("发生错误"+jqXHR.status);
        					}
        				});
        			});
        		});
        	</script>
        </div>
	</body>
</html>
