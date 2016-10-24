<html>
	<?php 
		include_once('../conf.php');
		include_once('../manager/DBManager.php');
		
		
	//	$username = "konglf";
		if(isset($_COOKIE['name'])&&isset($_COOKIE['openid'])&&isset($_COOKIE['table'])){
			//setcookie('name',$user_obj['nickname'],time()+100);
		//	$username = $_COOKIE['name'];
			//echo '<script>alert("'.$_COOKIE['name'].'");</script>';
			
		}else{
			echo '<script>alert("die");</script>';
			exit;
		}
		
		
	/*	(new DBManager())->InsertDataToTable($_COOKIE['table'],[
					'UserID'=>'"'.$_COOKIE['openid'].'"',
					'UserName'=>'"'.$_COOKIE['name'].'"',
					'UserTele'=>'""',
					'RegistDateID'=>'CURRENT_DATE()',
					'RegistTimeID'=>'CURRENT_TIME()',
				],false);
		
		if(isset($_COOKIE['name'])){
			setcookie('name','',time()-100);
		}

		if(isset($_COOKIE['table'])){
			setcookie('table','',time()-100);
		}*/
	?>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
		<title>我的远古</title>
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/common.css" />
		<link rel="stylesheet" href="css/register.css" />
		<script type="text/javascript" src="js/jquery_1_11_1min.js" ></script>
		<script type="text/javascript" src="js/Mobile.js" ></script>
		
	</head>
	<body>
		<header class="nav clearfix">
			<a href="<?php echo _URL('ind');?>"><img src="img/back.png"></a>
			注册
		</header>
		<section class="section clearfix">
			<form action="<?php echo _URL('regr');?>" method = "POST" enctype="multipart/form-data">
				<input type="text" id="username" name="username" placeholder="用户名" value="<?php echo $_COOKIE['name'];?>"/>
				<input type="text" id="tele" name="tele" placeholder="输入手机号" value=""/>
				<!--input type="password" placeholder="输入密码" /-->
				<!--input type="password" placeholder="确认密码" /-->
				<input type="text" id="cCode" name="cCode" placeholder="输入验证码" value=""/>
				<input type="button" value="获取验证码" onclick="alert('验证码是111111');"/>
				<div class="free">
					<input type="checkbox" id="check" name="check" value="false"/>
				    <span>我同意并遵守<a href="#">《用户协议》</a></span>
				</div>
				<input type="button" value="立即注册" id="Sub"/>
			</form>
		</section>
		<script type="text/javascript">
		$(document).ready(function(){
				$("#Sub").click(function(){
					//alert("老孔交给你了");
					checkemail();
				});
			}
			//post_ajax()
		);
		function post_ajax(){
			 var PostForm = {};
			 PostForm['userName']= $('#username').val();
			 PostForm['tele']= $('#tele').val();
			// PostForm['name']="<?php echo 'konglf';//$_COOKIE['name'];?>";
			 PostForm['openid']="<?php echo $_COOKIE['openid'];?>";
			 PostForm['table']="<?php echo $_COOKIE['table'];?>";
			$.post('<?php echo _URLD('res','url');?>/RegisterResponser.php',PostForm,
			function(data){
				console.log(data);
				var dataJson = JSON.parse(data);
			//	alert(dataJson['request']);
				switch(dataJson['request']){
				case 1:
					alert('注册成功');
					location.href = "<?php echo _URL("men");?>";
					break;
				case -1:
					alert('注册失败!');
					break;
				case 2:
					alert('注册的太快了!');
					break;
				default:
					break;
				}
			},
			"text");
		}
		
		function checkemail(){
			if($('#username').val() == ""){
				alert("用户名不能为空");
				$('#username').focus;
				return false;
			}
			if($('#tele').val() == ""){
				alert("电话不能为空");
				//console.log("电话空");
				$('#tele').focus;
				return false;
			}
			if($('#cCode').val() != "111111"){
				alert("验证码错误");
				$('#cCode').focus;
				return false;
			}
			if(!$('#check').val()){
				alert("请查看用户协议");
				$('#cCode').focus;
				return false;
			}
			post_ajax();
		}

		</script>
		<?php setcookie('name','',time()-100);
			setcookie('table','',time()-100);?>
	</body>
</html>
