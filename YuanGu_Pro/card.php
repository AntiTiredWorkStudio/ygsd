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
		<!--css部分-->
		<link rel="stylesheet" href="css/common.css" />
		<link rel="stylesheet" href="css/index.css" />
		<!--js部分-->
		<script type="text/javascript" src="js/jquery_1_11_1min.js" ></script>
		<script type="text/javascript" src="js/card_do.js"></script>
		<script type="text/javascript" src="js/Mobile.js" ></script>
		<title>卡牌展示</title>
		
	</head>
	<body>
		<div class="menu_header clearfix">
			<div class="bao">
				<span>我的卡牌</span>
			    <a href="#" class="left"></a>
			    <a href="#" class="right">退出</a>
			</div>
		</div>
		<div class="menu_contentcard clearfix">
			<ul class="menu_list">
				<!--第一个-->
				<li id="xin">
					<a href="#">香车一</a>
					<a href="#" class="right" id="xin_nn"></a>
				</li>
				<div class="act clearfix" id="xin_nr">
				   <!--一组-->
				  
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/001f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/002f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/003f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/004f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/005f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--二组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/006f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/007f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/008f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/009f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/010f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--三组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/011f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/012f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/013f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/014f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/015f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
                    <div class="clear"></div>
                </div>
                
				<!--第二个-->
				<li id="xin1">
					<a href="#">香车二</a>
					<a href="#" class="right" id="xin_nn1"></a>
				</li>
				<div class="act clearfix" id="xin_nr1">
				   <!--一组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/016f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/017f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/018f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/019f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/020f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--二组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/021f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/022f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/023f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/024f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/025f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--三组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/026f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/027f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/028f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/029f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/car/030f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
                    <div class="clear"></div>
                </div>
				<!--第三个-->
				<li id="xin2">
					<a href="#">酒水一</a>
					<a href="#" class="right" id="xin_nn2"></a>
				</li>
				<div class="act clearfix" id="xin_nr2">
				   <!--一组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_001f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_002f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_003f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_004f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_005f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--二组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_006f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_007f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_008f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_009f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_010f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--三组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_011f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_012f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_013f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_014f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_015f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
                    <div class="clear"></div>
                </div>
                
				<!--第四个-->
				<li id="xin3">
					<a href="#">酒水二</a>
					<a href="#" class="right" id="xin_nn3"></a>
				</li>
				<div class="act clearfix" id="xin_nr3">
				   <!--一组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_016f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_017f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_018f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_019f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_020f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--二组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_021f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_022f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_023f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_024f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_025f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--三组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_026f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_027f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_028f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_029f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/drink/wine_030f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
                    <div class="clear"></div>
                </div>
				<!--第五个-->
				<li id="xin4">
					<a href="#">模特一</a>
					<a href="#" class="right" id="xin_nn4"></a>
				</li>
				<div class="act clearfix" id="xin_nr4">
				   <!--一组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_001f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_002f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_003f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_004f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_005f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--二组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_006f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_007f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_008f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_009f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_010f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--三组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_011f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_012f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_013f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_014f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_015f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
                    <div class="clear"></div>
                </div>
                
				<!--第六个-->
				<li id="xin5">
					<a href="#">模特二</a>
					<a href="#" class="right" id="xin_nn5"></a>
				</li>
				<div class="act clearfix" id="xin_nr5">
				   <!--一组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_016f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_017f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_018f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_019f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_020f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--二组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_021f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_022f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_023f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_024f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_025f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--三组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_026f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_027f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_028f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_029f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/man/wine_030f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
                    <div class="clear"></div>
                </div>
			   	<!--第七个-->
				<li id="xin6">
					<a href="#">香烟一</a>
					<a href="#" class="right" id="xin_nn6"></a>
				</li>
				<div class="act clearfix" id="xin_nr6">
				   <!--一组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_001f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_002f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_003f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_004f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_005f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--二组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_006f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_007f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_008f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_009f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_010f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--三组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_011f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_012f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_013f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_014f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_015f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
                    <div class="clear"></div>
                </div>
                
				<!--第四个-->
				<li id="xin7">
					<a href="#">香烟二</a>
					<a href="#" class="right" id="xin_nn7"></a>
				</li>
				<div class="act clearfix" id="xin_nr7">
				   <!--一组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_016f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_017f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_018f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_019f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_020f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--二组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_021f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_022f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_023f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_024f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_025f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
					<!--三组-->
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_026f.jpg",0.6); ?>"</a>
						<span>卡牌一</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_027f.jpg",0.6); ?>"</a>
						<span>卡牌二</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_028f.jpg",0.6); ?>"</a>
						<span>卡牌三</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_029f.jpg",0.6); ?>"</a>
						<span>卡牌四</span>
					</div>
					<div class="card">
						<a href="#"><img src="<?php echo S::_CS("img/cigarette/wine_030f.jpg",0.6); ?>"</a>
						<span>卡牌五</span>
					</div>
                    <div class="clear"></div>
                </div>
			</ul>
		</div>
		<section style="font-size: 0.25rem;color: white;margin: 0 auto;text-align: center;margin-bottom: 2.0rem;visibility: hidden; ">
			xxx
		</section>
		<div class="footer ">
        	<div class="top">
	        	<ul>
	        		<li><a href="<?php echo _URL('ind');?>"><div><img src="<?php echo S::_CS("img/li_1.png"); ?>"</div><div><span style="font-size:12px; color:#FFF;">&nbsp首页</span></div></a></li>
	        		<li><a href="<?php echo _URL('men');?>"><div><img src="<?php echo S::_CS("img/li_2.png"); ?>"</div><div><span style="font-size:12px; color:#FFF;">&nbsp点餐</span></div></a></li>
	        		<li><a href="<?php echo _URL('sho');?>"><div><img src="<?php echo S::_CS("img/li_3.png"); ?>"</div><div><span style="font-size:12px; color:#FFF;">&nbsp商城</span></div></a></li>
	        		<li class="active"><a href="<?php echo _URL('card');?>"><div><img src="<?php echo S::_CS("img/li_4.png"); ?>"</div><div><span style="font-size:12px; color:#FFF;">&nbsp游戏</span></div></a></li>
	        		<li><a href="<?php echo _URL('own');?>"><div><img src="<?php echo S::_CS("img/li_5.png"); ?>"</div><div><span style="font-size:12px; color:#FFF;">&nbsp我的</span></div></a></li>
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
