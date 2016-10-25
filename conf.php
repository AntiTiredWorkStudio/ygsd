<?php
include_once '/vendor/autoload.php'; // 引入 composer 入口文件
include_once '/qiniu/autoload.php'; // 引入 composer 入口文件
use EasyWeChat\Foundation\Application;

define('KEY','konglf');
//公众号配置信息
$options = [
    'debug'  => true,
    'app_id' => 'wxdca9f5edc034c1a0',
    'secret' => 'e14f7b1ad2a43fb4977e5ce22456a0ec',
    'token'  => 'konglf',
    // 'aes_key' => null, // 可选
    'log' => [
        'level' => 'debug',
        'file'  => 'C:/xampp/htdocs/easywechat.log', // XXX: 绝对路径！！！！
    ],
	'wechatLink' => [
		'part0' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=',
		'part1' => '&redirect_uri=',
		'part2' => '&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect'
	],
	'domain' => 'http://ygsdjlk.online/ygsd/',
	'server' => '123.206.26.169',	//网站ip
    'admin'  => 'ygsd',	//数据库用户名
    'password'  => 'ygsdjkl',	//数据库用户密码
	'database' => 'yg_database' ,	//数据库名
	'access_token'=>'Wf-QESFHH9SOrLvuiImLShsSA1ztJRC7DN4ZVlRBdwMtgN3Z1EepOsLNF-O8wYC2PioYAp67N7vPeKQkzmz_qwR1-9oh0asZEntASI2XPHc',//Access_Token
	'qiniu_ak'=>'d-SztTGFAV7_BX-dKRtM8y1diABoXe1zxCgd-2yi',//	云盘access_key
	'qiniu_sk'=>'CWv29dzAFng2KZ15Cf21Pv6FoOoWtB3-nzh1zgJH',//secret_key
	'qiniu_bucket'=>'ygsdjkl',//空间名
	'qiniu_domain'=>'http://ofaj2dlq0.bkt.clouddn.com/'//域名
  //...
];
$state = [
	'Submiting'=>'还未确认',
	'Submited'=>'已提交',
	'Accepted'=>'商家已接单',
	'Success'=>'已完成',
	'Close'=>'已取消'
];
$dishType = [
	'AType'=>[ 'text'=>'川湘菜','id'=>100000],
	'BType'=>[ 'text'=>'烧烤','id'=>200000],
	'CType'=>[ 'text'=>'凉菜','id'=>300000],
	'DType'=>[ 'text'=>'小炒','id'=>400000],
	'EType'=>[ 'text'=>'干锅','id'=>500000],
	'FType'=>[ 'text'=>'汤品','id'=>600000],
	'GType'=>[ 'text'=>'主食','id'=>700000],
	'HType'=>[ 'text'=>'酒水/饮料','id'=>800000],
];

$tables = [
	'tMenu' => [
		'name'=>'yg_menu',
		'command'=> 'CREATE TABLE yg_menu
		(`DishID` int(11) NOT NULL ,
		 `DishName` VARCHAR(32) NOT NULL ,
		 `DishPrice` float NOT NULL ,
		 `DishType` enum('._DTYPESTR().') NOT NULL
		) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	],	//菜单表名
	'tOrder' => [
		'name'=>'yg_order',
		'command'=> 'CREATE TABLE yg_order
		(`OrderSecret` VARCHAR(128) NOT NULL ,
		 `DishID` VARCHAR(32) NOT NULL ,
		 `DishCount` INTEGER NOT NULL
		) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	],	//用户订单表名
	'tOrderStatus' => [
		'name'=>'yg_orderstatus',
		'command'=> 'CREATE TABLE yg_orderstatus
		(`OrderID` VARCHAR(128) NOT NULL ,
		 `OrderSecret` VARCHAR(128) NOT NULL ,
		 `UserID` VARCHAR(64) NOT NULL ,
		 `OrderPrice` float NOT NULL ,
		 `OrderDate` DATE NOT NULL ,
		 `OrderTime` TIME NOT NULL ,
		 `OperatDate` DATE NOT NULL ,
		 `OperatTime` TIME NOT NULL ,
		 `State` enum(\'Submiting\', \'Submited\', \'Accepted\', \'Success\', \'Close\') NOT NULL
		) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	],	//订单表名
	'tUser' => [
		'name'=>'yg_user',
		'command'=> 'CREATE TABLE yg_user
		(`UserID` VARCHAR(64) NOT NULL ,
		 `UserName` VARCHAR(64) NOT NULL ,
		 `UserTele` VARCHAR(15) NOT NULL ,
		 `RegistDateID` DATE NOT NULL ,
		 `RegistTimeID` TIME NOT NULL
		) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	],	//用户表名
	'tAccess' => [
		'name'=>'yg_access',
		'command'=> 'CREATE TABLE yg_access
		(
		 `tokenIndex` INTEGER NOT NULL ,
		 `access_token` VARCHAR(300) NOT NULL ,
		 `openid` VARCHAR(64) NOT NULL ,
		 `getDate` DATE NOT NULL ,
		 `getTime` TIME NOT NULL
		) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	],	//access_token记录表
	'tAdmin' => [
		'name'=>'yg_admin',
		'command'=> 'CREATE TABLE yg_admin
		(
		 `openid` VARCHAR(64) NOT NULL , 
		 `State` enum(\'unregisted\', \'unline\', \'online\') NOT NULL ,
		 `getDate` DATE NOT NULL ,
		 `getTime` TIME NOT NULL
		) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	],	//administrator记录表
	'tSources' => [
		'name'=>'yg_sources',
		'command'=> 'CREATE TABLE yg_sources
		(
		 `id` int(11) NOT NULL ,
		 `hash` VARCHAR(32) NOT NULL,
		 `key` VARCHAR(128) NOT NULL,
		 `Type` enum(\'image\', \'audio\', \'text\') NOT NULL ,
		 `width` int(11) NOT NULL ,
		 `height` int(11) NOT NULL
		) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	],	//administrator记录表
];
//目录功能块定义对接autoload.php模块
$rDirs = [
	'att'=> ['dir'=>'attach','autoload'=>'false','sub'=>['acc'=>'\Accessor.php','ins'=>'\InsertDish.php','set'=>'\Setting.php','wri'=>'\WriteRecode.php']],
	'bas'=> ['dir'=>'base','autoload'=>'true'],
	'man'=> ['dir'=>'manager','autoload'=>'true'],
	'res'=> ['dir'=>'responser','autoload'=>'false'],
	'development'=> ['dir'=>'YuanGu_Test','autoload'=>'false'],
	'master'=> ['dir'=>'YuanGu_Pro','autoload'=>'false'],
	'sources'=>['dir'=>'YuanGu_Pro/sources','autoload'=>'false'],
	'img'=>['dir'=>'YuanGu_Pro/img','autoload'=>'false'],
	'img/car'=>['dir'=>'YuanGu_Pro/img/car','autoload'=>'false'],
	'img/cigarette'=>['dir'=>'YuanGu_Pro/img/cigarette','autoload'=>'false'],
	'img/drink'=>['dir'=>'YuanGu_Pro/img/drink','autoload'=>'false'],
	'img/man'=>['dir'=>'YuanGu_Pro/img/man','autoload'=>'false'],
];
function _URLD($flag,$d = 'dir'){
	if(isset($GLOBALS['rDirs'][$flag]['dir'])){
		switch($d){
			case 'dir':
				return __DIR__ .'\\'.$GLOBALS['rDirs'][$flag]['dir'];
			case 'url';
				return $GLOBALS['options']['domain'].$GLOBALS['rDirs'][$flag]['dir'];
			default:
				return __DIR__ .'\\'.$GLOBALS['rDirs'][$flag]['dir'];
		}
	}else{
		return $flag;
	}
}
//公众号页面定义
$rUrls = ['ind'=> _BUNDLE().'/index.php',
		'men'=>  _BUNDLE().'/order.php' ,
		'wel' => _BUNDLE().'/welcome.php' ,
		'own' => _BUNDLE().'/owner.php' ,
		'sho' => _BUNDLE().'/shop.php' ,
		'ownd' => _BUNDLE().'/owner_detials.php' ,
		'card' => _BUNDLE().'/card.php' ,
		'reg' => _BUNDLE().'/register.php',
		'map' => _BUNDLE().'/map.php',
		'regr' =>'base/RegisterResponser.php',
		'opt' =>'attach/Setting.php?key='.constant("KEY"),
];
//公众号按钮定义
$buttons = [
    [
        "name"       => "点餐",
        "sub_button" => [
            [
                "type" => "view",
                "name" => "排号",
                "url" => "http://m.dianping.com/appshare/shop/67192857"
            ],
            [
                "type" => "view",
                "name" => "菜单",
                "url" => _URL('men')
            ],
            [
                "type" => "view",
                "name" => "订单",
                "url" => _URL('own')
            ],
        ],
    ],
	[
        "type" => "click",
        "name" => "吧乐",
        "key"  => "V1001_BARLE"
    ],
	[
        "name" => "远古时代",
		 "sub_button" => [
            [
                "type" => "view",
                "name" => "首页",
                "url" => _URL('ind')
            ],
			[
                "type" => "view",
                "name" => "位置",
                "url" => _URL('map')
            ],
			[
                "type" => "click",
                "name" => "公众号动态",
                "key"  =>  "V1001_All"
            ],
        ],
    ],
];
function _DTYPE($dt){
	if(isset($GLOBALS['dishType'][$dt])){
		return $GLOBALS['dishType'][$dt]['text'];
	}
	return $dt;
}
function _DTYPEID($dt){
	if(isset($GLOBALS['dishType'][$dt])){
		return $GLOBALS['dishType'][$dt]['id'];
	}
	return $dt;
}
function _STATE($st){
	if(isset($GLOBALS['state'][$st])){
		return $GLOBALS['state'][$st];
	}
	return $st;
}

function _DTYPESTR(){
	$str = '';
	foreach($GLOBALS['dishType'] as $key=>$value){
		$str = $str.'\''.$key.'\',';
	}
	$str = substr($str,0,strlen($str)-1); 
	return $str;
}
function _BUNDLE(){
	if($GLOBALS['options']['debug']){
		$bundDef = 'master';
		if(file_exists('bundleConfig.def')){
			$bundDef = file_get_contents('bundleConfig.def');
//			echo $bundDef;
		}else{
			return $GLOBALS['rDirs'][$bundDef]['dir'];
		}
		if(isset($GLOBALS['rDirs'][$bundDef]['dir'])){
			return $GLOBALS['rDirs'][$bundDef]['dir'];
		}
	}else{
		return $GLOBALS['rDirs']['master']['dir'];
	}
}
function _URL($flags ,$attach='', $s='wechat'){
	$result = $GLOBALS['rUrls'][$flags];
	if($attach != ''){
		$result = $result.'?'.$attach;
	}//.(($attach=='')?'':'?'$attach);
	$result = $GLOBALS['options']['domain'].$result;
	$wechatGrp = $GLOBALS['options']['wechatLink'];
	if($s=='wechat'){
		$result = $wechatGrp['part0']. $GLOBALS['options']['app_id'].$wechatGrp['part1'].urlencode($result). $wechatGrp['part2'];
	}
	
	return $result;
}
function _ATTACH($attachName){
	if(isset($GLOBALS['rDirs']['att']['sub'][$attachName])){
		return $GLOBALS['rDirs']['att']['dir'].$GLOBALS['rDirs']['att']['sub'][$attachName];
	}else{
		return $attachName;
	}
}

//include_once('autoload.php');

$app = new Application($options);
?>