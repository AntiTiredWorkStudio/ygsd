<html>
	<head>
		<?php 
			include_once('../conf.php');
			include_once('../attach/Accessor.php');
			include_once('../manager/USManager.php');
			include_once('../manager/MenuManager.php');
			include_once('../manager/SourcesManager.php');
			use SourcesManager as S;
			$MM = new MenuManager();
		?>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" href="css/common.css" />
		<link rel="stylesheet" href="css/index.css" />
		
		<script type="text/javascript" src="js/jquery_1_11_1min.js" ></script>
		<!--<script type="text/javascript" src="js/spider.js" ></script>-->
		<script type="text/javascript" src="js/do.js"></script>
		<script type="text/javascript" src="js/Mobile.js" ></script>
		<title>订餐中心</title>
		
	</head>
	<body>
		<div class="menu_header clearfix">
			<div class="bao">
				<span>菜单</span>
			    <a href="<?php echo _URL('ind');?>" class="left"></a>
			    <a href="<?php echo _URL('ind');?>" class="right">退出</a>
			</div>
		</div>
		<div class="menu_content clearfix">
			<ul class="menu_list" >
				<!--第一个-->
				<?php 
					$index = 1;
					foreach($MM->Menu as $key=>$value){
				?>
				<li id="xin<?php echo $index;?>">
					<a href="<?php echo _URL('men');?>"><?php echo _DTYPE($key);?></a>
					<a href="<?php echo _URL('men');?>" class="right" id="xin_nn<?php echo $index;?>"></a>
				</li>
				<div class="act clearfix" id="xin_nr<?php echo $index;?>">
				<?php 
				
					foreach($value as $k=>$v){
				?>
					<div class="fen clearfix">
						<a href="#"><img src="sources/IMG_0725.JPG"></a>
						<section>
							<a href="#"><span><?php echo $v['DishName'];?></span></a>
							<a href="#"><span>单价:￥<b class="price"><?php echo $v['DishPrice'];?></b></span></a>
						</section>
						<div class="suan">
							<input class="jian" type="button" value="-" />
                            <input class="text_box" type="text" id="<?php echo $v['DishID'];?>" value="0" />
                            <input class="jia" type="button" value="+" />
						</div>
                    </div>
                    <div class="clear"></div>
				<?php }?>
                </div>
				<script>
				$('#xin<?php echo $index;?>').click(function(){
					//alert("xxx");
					$("#xin_nr<?php echo $index;?>").slideToggle("slow");
					$('#xin_nn<?php echo $index;?>').toggleClass("change");
					//alert( $(".Amount").value);
					return false;
			   });
				</script>
				<?php 
						$index++;
					}
				?>
				</li>
			</ul>
			<div style="background: yellow;width: 100%;height: 2.0rem;visibility: hidden;">
			
		   </div>
		</div>
		
		<div class="footer ">
        	<div class="top">
	        	<ul>
	        		<li><a href="<?php echo _URL('ind');?>"><div><img src="img/li_1.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp首页</span></div></a></li>
	        		<li class="active"><a href="<?php echo _URL('men');?>"><div><img src="img/li_2.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp点餐</span></div></a></li>
	        		<li><a href="<?php echo _URL('sho');?>"><div><img src="img/li_3.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp商城</span></div></a></li>
	        		<li><a href="<?php echo _URL('card');?>"><div><img src="img/li_4.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp游戏</span></div></a></li>
	        		<li><a href="<?php echo _URL('own');?>"><div><img src="img/li_5.png"></div><div><span style="font-size:12px; color:#FFF;">&nbsp我的</span></div></a></li>
	        	</ul>
        	</div>
		<div class="total clearfix">
			<input type="button" value="结算" id="jiesuan"/>
			<div class="bao">
				<span class="tol" >合计：￥<b id="totnew">0.00</b></span>
			<span class="express">(不含运费)</span>
			</div>
		</div>
        	<script type="text/javascript">
				var isSubmit = false;
        		$('.top li').click(function(){
        			$(this).siblings().removeClass('active');
        			$(this).addClass('active');
        		});
				
				//var val = $("#300001").val();
				//alert(val);
				
        		$(document).ready(function(){
				//	setTotal();
        			$("#jiesuan").click(function(){
						if(isSubmit)
							return;
        				/*$.ajax({
        					type:"get",
        					url:"<?php echo 'http://ygsdjlk.online/callback.php';?>"+"?total="+$('#totnew').text(),
        					async:true,
        					dataType:"json",
        					success:function(data){
								console.log(data);
        						if(data.success){
        							$(".express").html(data.msg);
        						}else{
        							$(".express").html("出现错误："+data.msg);
        						}
        					},
        					error:function(jqXHR){
								//console.log(jqXHR);
        						alert("发生错误"+jqXHR.status);
        					}
        				});*/
						
							/*
							
							
									判断哪些菜被点了，被点了的菜，传菜id和份数（已完成）
							
							
							*/
							var PostForm = 
							  {//在此添加POST请求
								total:$('#totnew').text()
							  };
							 
							var countSelection = 0;
							$(":input[type=text]").each(function(){
								//alert(this.value+" "+this.id);
								if(this.value>0){
									countSelection++;
									PostForm["Dish"+countSelection] = "{\"id\":"+(this.id)+",\"count\":"+(this.value)+"}";
								}
							});
							
							if(countSelection == 0){
								alert("你没选择任何菜品!");
								return;
							}
							
							/*
							
							
									判断哪些菜被点了，被点了的菜，传菜id和份数
							
							
							*/
						 // var index = 1;
						  
							  //之前的测试
							  PostForm["openid"] = "<?php echo $_COOKIE['openid'];?>";
						/*	  while(index<10){
									PostForm["Dish"+index] = "{\"id\":"+(12347+index)+",\"count\":"+(2+index)%3+"}";
									index++;
							  }*/
						//  PostForm["Dish"+index] = "{\"id\":"+13333+",\"count\":"+4+"}";
							  
							  
						  $.post("<?php echo _URLD('res','url');?>/OrderResponser.php",
							PostForm,
							function(data){
								//$('#msg').html("please enter the email!");
								isSubmit = true;
								console.log(data);
								var dataJson = JSON.parse(data);
								alert("订单已经提交");//dataJson['confirm']);
								//$('#msg').html(dataJson);
								window.location.href = dataJson['targetUrl'];
							},
						  "text");
        			});
        		});
        	</script>
        </div>
	</body>
</html>
