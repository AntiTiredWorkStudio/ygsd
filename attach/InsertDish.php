
<html>
<head>

<?php
	include_once('../conf.php');
//	include_once('MenuManager.php');
	if(isset($_POST['type'])){
		if((new MenuManager())->InsertDish($_POST['name'],$_POST['price'],$_POST['type'])){
			echo '插入'.$_POST['name'].'成功!';
		}
	}
?>

		<meta charset="utf-8">
		<link href="css/style_CB.css" rel="stylesheet" type="text/css" />
		<link href="favicon.ico" rel="icon" type="image/ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>插入菜肴</title>
		<script type="application/x-javascript"> 
			addEventListener(
				"load", function() { 
							setTimeout(hideURLbar, 0); 
									}, false);
			function hideURLbar(){ window.scrollTo(0,1); } 
		
		</script>
		
</head>
 
<body>
	<div class="main" style="margin-top: 0px;">
				 <h2>插入菜肴</h2>
				 <h3>菜肴种类请从:<?php echo _DTYPESTR();?>中选</h3>
				 <form action="#" method="post"enctype="multipart/form-data">
							<div class="lable">
		                     	<input type="text" class="text" id="type" name="type" value="菜肴种类" onfocus="if(this.value == '菜肴种类')this.value = '';" onblur="if (this.value == '') {this.value = '菜肴种类';}" >

		                     	<input type="text" class="text" id="name" name="name" value="菜肴名称" onfocus="if (this.value == '菜肴名称')this.value = '';" onblur="if (this.value == '') {this.value = '菜肴名称';}">
		                    </div>
		                    <div class="clear"> </div>
		                    <div class="lable-2">
		                    <input type="text" class="text" id="price" name="price" value="定价" onfocus="if (this.value == '定价')this.value = '';" onblur="if (this.value == '') {this.value = '定价';}">
		                     </div>
							<div class="clear"> </div>
							
								 <div class="submit">
									<input type="submit" style="margin-top: 10px;" onclick="myFunction()" value="插入" >
								</div>
									<div class="clear"> </div>
							 </form>
		</div>
</body>
</html>
