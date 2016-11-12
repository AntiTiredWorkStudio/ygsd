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
			
			if($accd == '')
				$openid = $_COOKIE['openid'];//'oiqWTwourx3IxuS0Ut9hphctOyT4';
			
			$orders = ($accd=='')?($OM->GetOrder($openid)):($OM->GetAllOrder());
			
			$USM = new USManager();
			
			if($accd == '')
			$user_obj = $USM->GetUser($openid);
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
	<body onbeforeunload="checkLeave()">
		<div class="menu_header clearfix">
			<div class="bao">
				<span><?php echo ($accd==''?$user_obj['nickname']:'全部');?>的订单</span>
			    <a href="<?php echo _URL('ind');?>" class="left"></a>
			    <a href="<?php echo _URL('ind');?>" class="right">退出</a>
			</div>
		</div>
		<div class="menu_content clearfix" >
			<ul class="shop_list">
			<?php 
				foreach($orders as $key=>$value){
					if($accd !='' && $value['State'] == 'Submiting'){
						continue;
					}
			?>
			<div class="dingdan_mr clearfix" ool="root">
				<li><a href="<?php echo _URL('ownd','od='.$value['OrderSecret'].($accd==''?'':('&'.$accd)));?>">
					<?php if($accd!=''){?>
					<span class="dingdan_name"><?php echo $USM->GetUser($value['UserID'])['nickname'];?></span>
				</li>	<?php }?>
				<li class="dingdan_li">
				    <span class="dingdan_time" style="text-indent: 0.8rem"><?php echo $value['OrderDate'];?></span>
					<span class="dingdan_time" style="text-indent: 0.2rem"><?php echo $value['OrderTime'];?></span>
					<span class="dingdan_status" style="text-indent: 0.2rem" os="<?php echo $value['OrderSecret'];?>"><?php echo _STATE($value['State']);?></span>
					<span class="dingdan_rate" style="text-indent: 0.2rem">￥ <?php echo $value['OrderPrice'];?> </span>
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
		<div style="width: 100%;float: left;height: 2.0rem;visibility: hidden;">xxxxxxxxxxx</div>
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
				//	alert('dataJson:');
        		var timer;
				var dataJson = {};
        		$(document).ready(function(){
					$("[os]").each(function(iIndex,gElement){
						//alert(iIndex+":"+$(gElement).attr("os"));
						dataJson[iIndex] = $(gElement).attr("os");
					});
					timer = setInterval(function(){
        					$.ajax({
        					type:"post",
        					url:"<?php echo _URLD('res','url');?>/OrderUpdateResponser.php<?php echo ($accd==''?'':('?'.$accd));?>",
        					data:dataJson,//{"menu_name":$('.dingdan_name').text(),"menu_status":$('.dingdan_status').text()},
        					async:true,
        					dataType:"text",
        					success:function(data, textStatus){
        						//console.log(data);
								var dataJson = JSON.parse(data);
								for(var key in dataJson){  
									if($("span[os='"+key+"']").attr('os')){
										$("span[os="+key+"]").text(dataJson[key]['state']);
								//		alert('改');
									}else{
										var htm = '<li><a href='+dataJson[key]['url']+'><span class="dingdan_name">'+dataJson[key]['nickname']+'</span></li><li class="dingdan_li">'+
					'<span class="dingdan_time" style="text-indent: 0.8rem">'+dataJson[key]['date']+'</span>'+
					'<span class="dingdan_time" style="text-indent: 0.2rem">'+dataJson[key]['time']+'</span>'+
					'<span class="dingdan_status" style="text-indent: 0.2rem" os="'+key+'">'+dataJson[key]['state']+'</span>'+
					'<span class="dingdan_rate" style="text-indent: 0.2rem">￥'+dataJson[key]['price']+'</span></a></li>';
										var target=$(htm);
										$('div[ool="root"]').prepend(target); 
										console.log('添'+key);
									}
									
								}  
								//$("[os="++"]")
        						/*if(data.success){
        							$(".express").html(data.msg);
        						}else{
        							$(".express").html("出现错误："+data.msg);
        						}*/
        					},
        					error:function(jqXHR){
        						//alert("发生错误"+jqXHR.status);
        					}
        				});
        				},3000);
						
        			//$("#jiesuan").click(function(){
        			//});
        		});
				function checkLeave(){
        			clearInterval(timer);
        		}
        	</script>
        </div>
	</body>
</html>
