<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"G:\whsystem\public/../application/index\view\index\index.html";i:1507990289;s:60:"G:\whsystem\public/../application/index\view\tpl\header.html";i:1508035573;s:60:"G:\whsystem\public/../application/index\view\tpl\footer.html";i:1507974958;s:57:"G:\whsystem\public/../application/index\view\tpl\msg.html";i:1506260401;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<meta name="renderer" content="webkit">
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta property="wb:webmaster" content="8af72a3a7309f0ee">
    <title><?php if(!empty($config['title'])) echo $config['title']; ?></title>
	<link rel="Shortcut Icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/static/index/home/css/base.css">
    <link rel="stylesheet" type="text/css" href="/static/index/home/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/static/index/home/css/subpage.css">
    <link rel="stylesheet" type="text/css" href="/static/index/home/css/user.css">
    <link rel="stylesheet" type="text/css" href="/static/index/home/css/coin.css">
    <link rel="stylesheet" type="text/css" href="/static/index/home/css/zcpc.css">
    <link rel="stylesheet" type="text/css" href="/static/index/home/iconfont/demo.css">
    <link rel="stylesheet" type="text/css" href="/static/index/home/iconfont/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/static/index/home/css/jb_style.css">
    <script src="/static/index/home/js/hm.js"></script>
	<script type="text/javascript" src="/static/index/home/js/jquery-1.js"></script>
    <script type="text/javascript" src="/static/index/home/js/downList.js"></script>
    <script type="text/javascript" src="/static/index/common/js/jquery-2.1.1.min.js"></script>
    <script src="/static/index/common/js/bootstrap.min.js?v=3.4.0"></script>
    <script type="text/javascript" src="/static/index/common/js/layer/layer.js"></script>
    <script src="/static/index/common/js/jquery.validate.min.js"></script>
    <script src="/static/index/common/js/messages_zh.min.js"></script>
    <script src="/static/index/common/js/base.js"></script>
	<script src="/static/admin/js/base.js"></script>

</head>
<body>
<!--<div class="clearfix phone_top" id="phone_top_div" style="display:none;">
	<div class="left">
		<p class="left phone_logo"><img src="/images/phone_logo01.png"/></p>
		<p class="left phone_title">第一数字货币众筹交易平台</p>
	</div>
	<a href="javascript:hidephone();" class="phone_x">X</a>
</div>-->
<!--top start-->
<div style="background:#f9f9f9; height:30px;">
    <div style="width:1000px; margin:0 auto;">
            <?php if(!empty($online_user)): ?>
                <div class="person right">
                    <a class="left myhome" style=" height:30px; line-height:30px; margin-right:5px;">
						<span id="user_name_show"><?php if(!empty($online_user['name'])) echo $online_user['name']; ?></span>
					</a>
                    <div style="display: none;" class="mywallet_list"><div class="clear"><ul class="balance_list"><h4>可用余额</h4><li><a href="javascript:void(0)"><em style="margin-top: 5px;" class="deal_list_pic_cny"></em><strong>人民币：</strong><span><?php if(!empty($rmb)) echo $rmb; ?></span></a></li></ul><ul class="freeze_list"><h4>委托冻结</h4><li><a href="javascript:void(0)"><em style="margin-top: 5px;" class="deal_list_pic_cny"></em><strong>人民币：</strong><span><?php if(!empty($forzen_rmb)) echo $forzen_rmb; ?></span></a></li></ul></div><div class="mywallet_btn_box"><a href="<?php echo url('User/pay'); ?>">充值</a><a href="<?php echo url('User/draw'); ?>">提现</a><a href="<?php echo url('User/index'); ?>">转入</a><a href="<?php echo url('User/index'); ?>">转出</a><a href="<?php echo url('Entrust/manage'); ?>">委托管理</a><a href="<?php echo url('Trade/myDeal'); ?>">成交查询</a></div></div>
                    <span class="left" style="height:30px; line-height:30px; color:#999; margin-right:5px;">(UID: <?php if(!empty($online_user['uid'])) echo $online_user['uid']; ?> )</span>
                    <a class="left" href="<?php echo url('member/logout'); ?>" style="height:30px; line-height:30px; margin:0 5px;">退出</a>
                    <div id="my" class="account left" href="javascript:void(0)" style="z-index:9997; margin-right:5px;">
                        <a class="user_me" href="<?php echo url('User/index'); ?>">我的账户</a>
                        <ul class="accountList" style="padding: 6px 0px; background: rgb(85, 85, 85) none repeat scroll 0% 0%; border-radius: 5px 0px 5px 5px; display: none;">
                            <!--<li class="accountico no"></li>-->
                            <li><a href="<?php echo url('User/index'); ?>">我的资产</a></li>
                            <li><a href="<?php echo url('Entrust/manage'); ?>">我的交易</a></li>
                            <li><a href="<?php echo url('User/zhongchou'); ?>">我的众筹</a></li>
                            <li style="border-top:1px solid #666;"><a href="<?php echo url('User/pay'); ?>">人民币充值</a></li>
                            <li><a href="<?php echo url('User/draw'); ?>">人民币提现</a></li>
                            <li style="border-bottom:1px solid #444;"><a href="<?php echo url('User/index'); ?>">充币提币</a></li>
                            <li><a href="<?php echo url('User/updatePassword'); ?>">修改密码</a></li>
                            <li><a href="<?php echo url('User/sysMassage'); ?>">系统消息<if condition="<?php if(!empty($newMessageCount)) echo $newMessageCount; ?>"><span class="messagenum"><?php if(!empty($newMessageCount)) echo $newMessageCount; ?></span></if></a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; if(empty($online_user)): ?>
				<div class="loginArea right" style=" margin-right:5px;">
            	<a href="<?php echo url('member/login'); ?>" style="color:#f60; font-size:14px;">登录</a>
            	<span class="sep">&nbsp;|&nbsp;</span>
            	<a href="<?php echo url('member/register'); ?>" style="color:#f60; font-size:14px;">注册</a>
        		</div>
		<?php endif; ?>
    </div>
</div>
<div class="top">
    <div class="wapper clearfix">
        <h1 class="left">
			<a href="<?php echo url('Index/index'); ?>">
				<img style=" width:280px; height:70px;" src="<?php if(!empty($images['logo'])) echo $images['logo']; ?>" alt="虚拟币" title="虚拟币">
			</a>
		</h1>
        <ul class="nav right" style="z-index:9995;">
            <li><a href="<?php echo url('Index/index'); ?>">首页</a></li>
            <li><a href="<?php echo url('order/currency_trade'); ?>">交易大厅</a></li>
            <li><a href="<?php echo url('Safe/index'); ?>">用户中心</a></li>
            <li><a href="<?php echo url('Help/index',array('id'=>60)); ?>">帮助中心</a></li>
            <li><a href="<?php echo url('Art/index',array('ramdon_id'=>'1')); ?>">最新动态</a></li>
            <!--<li><a href="<?php echo url('Market/index'); ?>">行情中心</a></li>-->
            <!--<li><a href="<?php echo url('Dow/index'); ?>">下载中心</a></li>-->
        </ul>
    </div>
</div>
<div class="pclxfsbox"> 
		<ul> 
			<li id="opensq">
				<i class="pcicon1 iscion6">有疑问？</i>
				<div class="pcicon1box">
					<div class="iscionbox" >
						<p>在线咨询</p>
						<p><?php if(!empty($worktime)) echo $worktime; ?></p>
					</div>
					<i></i>
				</div>
			</li>
			<li> 
				<i class="pcicon1 iscion1"></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><img src="<?php if(!empty($weixin)) echo $weixin; ?>" alt="投筹网微信公众号" width="108"></p>
						<p><?php if(!empty($name)) echo $name; ?>微信群</p>
					</div>
					<i></i>
				</div>
			</li>
			<li>
				<i class="pcicon1 iscion2"></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><?php if(!empty($tel)) echo $tel; ?></p>
						<p><?php if(!empty($name)) echo $name; ?></p>
					</div>
					<i></i>
				</div>
			</li>
           <li>
				<i class="pcicon1 iscion3"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php if(!empty($qq)) echo $qq; ?>&site=qq&menu=yes"></a></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><?php if(!empty($qq)) echo $qq; ?></p>
						<p><?php if(!empty($name)) echo $name; ?>QQ在线客服1</p>
					</div>
					<i></i>
				</div>
			</li>
            <li>
				<i class="pcicon1 iscion3" style="background:url(/static/index/home/images/kefu2.png) no-repeat #9b9b9b;background-position:-144px 11px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php if(!empty($qq)) echo $qq; ?>&site=qq&menu=yes"></a></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><?php if(!empty($qq)) echo $qq; ?></p>
						<p><?php if(!empty($name)) echo $name; ?>QQ在线客服2</p>
					</div>
					<i></i>
				</div>
			</li>
            <li>
				<i class="pcicon1 iscion3" style="background:url(/static/index/home/images/kefu3.png) no-repeat #9b9b9b;background-position:-144px 11px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php if(!empty($qq)) echo $qq; ?>&site=qq&menu=yes"></a></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><?php if(!empty($qq)) echo $qq; ?></p>
						<p><?php if(!empty($name)) echo $name; ?>QQ在线客服3</p>
					</div>
					<i></i>
				</div>
			</li>
			
			<li>
				<i class="pcicon1 iscion4"></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p>返回顶部</p>
					</div>
					<i></i>
				</div>
			</li>
		</ul>
	</div>
    <script type="text/javascript"> 
		$(function(){
			$(".pcicon1").on("mouseover",function(){
				$(this).addClass("lbnora").next(".pcicon1box").css({"width":"148px"});
			}).on("mouseout",function(){
				$(this).removeClass("lbnora").next(".pcicon1box").css("width","0px");
			});
			$(".iscion4").on("click",function(){
				$("html, body").animate({
					scrollTop: 0
				})
			});

			var objWin;
			$("#opensq").on("click",function(){
				var top = window.screen.height/2 - 250;
				var left = window.screen.width/2 - 390;
				var target = "http://p.qiao.baidu.com//im/index?siteid=8050707&ucid=18622305"; 
				var cans = 'width=780,height=550,left='+left+',top='+top+',toolbar=no, status=no, menubar=no, resizable=yes, scrollbars=yes' ;

				if((navigator.userAgent.indexOf('MSIE') >= 0)&&(navigator.userAgent.indexOf('Opera') < 0)){
						//objWin = window.open ('','baidubridge',cans) ; 
						if (objWin === undefined || objWin === null || objWin.closed) { 
							objWin = window.open (target,'baidubridge',cans) ; 
						}else { 
							objWin.focus();
						}
				}else{
					var win = window.open('','baidubridge',cans );
					if (win.location.href == "about:blank") {
					    //窗口不存在
					    win = window.open(target,'baidubridge',cans);
					} else {
					    win.focus();
					}
				}
				return false;

			})
		})
		
	</script>
<!--top end-->

<script>
$(".myhome").hover(function(){
	$(".mywallet_list").show();	
},function(){
	$(".mywallet_list").hover(function(){
		$(".mywallet_list").show();	
	},function(){
		$(".mywallet_list").hide();	
	});
	$(".mywallet_list").hide();
});

var user_name =  $('#user_name_show').text();
var new_user_name =  user_name.replace(user_name.substr(3,4),'***');
$('#user_name_show').text(new_user_name);
</script>

<!--top end-->
<!--header end-->
<style>
    .pull-left {
        float: left;
    }

    .pull-right {
        float: right;
    }

    .link a {
        color: #000;
    }

    .link {
        margin: 0px auto;
        width: 100%;
    }

</style>
<script type="text/javascript" src="/static/index/home/js/focus.js"></script>
<script type="text/javascript" src="/static/index/home/js/Fnc.js"></script>
<script type="text/javascript" src="/static/index/home/js/zc.js"></script>
<script type="text/javascript" src="/static/index/home/js/1.js"></script>
<script type="text/javascript" src="/static/index/home/js/bootstrap.js"></script>
<script type="text/javascript" src="/static/index/home/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="/static/index/kline/code/highstock.js"></script>
<script src="https://img.hcharts.cn/highcharts/modules/exporting.js"></script>
<script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
<link rel="stylesheet" type="text/css" href="/static/index/home/css/hb_index.css">
<link rel="stylesheet" type="text/css" href="/static/index/home/css/zc.css">
<link rel="stylesheet" type="text/css" href="/static/index/home/css/flexslider.css">
<link rel="shortcut icon" href="1.ico"/>
<!--banner start-->
<div style="height:360px; width:100%; position:relative; overflow:hidden; min-width:1200px;">

    <div>
        <div class="flexslider">
            <ul class="slides">
                <?php if(!empty($carousel)): foreach($carousel as $item): ?>
                <li><a href="javascript:;"><img src="<?php echo $item; ?>" style="height:320px;"></a></li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="ybcoin_volume">
            <div style="color:#fff;">
                <p style=" font-size:16px; margin-bottom:5px; text-align: center;">风险提示</p>
                <p style=" font-size:12px; line-height:22px;"><?php if(!empty($config['risk'])) echo $config['risk']; ?></p>
            </div>
            <div class="news_coin">
                <?php if(empty($online_user)): ?>
                <a href="<?php echo url('member/login'); ?>">立即登录</a>
                <?php else: ?>
                <a href="<?php echo url('User/index'); ?>">我的账户</a>
                <?php endif; ?>
            </div>
            <!-- <p class="coin_reg"><empty name="member"><a href="<?php echo url('Reg/reg'); ?>" class="left">免费注册</a><a href="<?php echo url('Oauth/index',array('type'=>'qq')); ?>" class="right">QQ登录  </a><else/></empty><a href="<?php echo url('Dow/newcoin'); ?>" class="right">我要上新币</a></p> -->
        </div>
    </div>
</div>
<!--banner end-->
<div class="ybcoin_section clearfix" style="border:0;">
    <!--币币交易开始-->
    <div id="tags_coin" class="coinarea left" style="position:relative;">
        <!--<ul id="tags" class="for_coin">
            <li class="selectTag"><a onmouseover="selectTag('tagContent0',this)">对CNY交易区</a></li>
            <li><a onmouseover="selectTag('tagContent3',this)">对TRMB交易区</a></li>
            </ul>
        -->
        <div class="bgcolor" style="display:none;"></div>
        <div style="margin-top:30px;" id="tagContent">
            <!-- 对CNY交易区 结束-->
            <div class="tagContent selectTag" id="tagContent0">
                <p style="color:#f00; font-size:14px; margin-bottom:10px;">
                    <?php if(!empty($config['friendship'])) echo $config['friendship']; ?></p>
                <table class="coin_list coinarea" border="0" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="text-align:left;">汇 种</th>
                        <th class="header">最新价格(CNY)</th>
                        <th class="header">开盘价</th>
                        <th class="header">昨收价(CNY)</th>
                        <th class="header">最低价(CNY)</th>
                        <th class="header">最高价</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($forex)): foreach($forex as $item): ?>
                    <tr class="coin_num">
                        <td class="coin_name"><?php echo $item['name']; ?><?php echo $item['currency']; ?></td>
                        <td>
                            <span style="color: <?php echo $item['price_color']=='current_green'?'green' : 'red'; ?>"><?php echo $item['price']; ?><?php echo $item['price_color']=='current_green'?'↓' : '↑'; ?></span>
                        </td>
                        <td>
                            <span style="color: <?php echo $item['kp_price_color']; ?>"><?php echo $item['kp_price']; ?></span>
                        </td>
                        <td>
                            <?php echo $item['zs_price']; ?>
                        </td>
                        <td>
                            <span style="color: <?php echo $item['zd_price_color']; ?>"><?php echo $item['zd_price']; ?></span>
                        </td>
                        <td>
                            <span style="color: <?php echo $item['zg_price_color']; ?>"><?php echo $item['zg_price']; ?></span>
                        </td>
                    </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
                </table>
                <a style="float: right;color: #FF6600;font-weight: bold">查看更多..</a>
            </div>
            <div id="container" style="height: 400px; min-width: 310px"></div>
        </div>
    </div>
    <!--币币交易结束-->
    <div class="right coin_news">
        <div class="news_title clearfix">
            <h2 class="left"><?php if(!empty($menu[1]['name'])) echo $menu[0]['name']; ?></h2>
            <a href="<?php echo url('Art/index',array('id'=>'1')); ?>" class="right">更多</a>
        </div>
        <ul>
            <?php foreach($menu[1]['title'] as $item): ?>
            <li><?php echo $item['title']; ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="news_title clearfix" style="margin-top:20px;">
            <h2 class="left"><?php if(!empty($menu[2]['name'])) echo $menu[2]['name']; ?></h2>
            <a href="<?php echo url('Art/index',array('id'=>'2')); ?>" class="right">更多</a>
        </div>
        <ul>
            <?php foreach($menu[2]['title'] as $item): ?>
            <li><?php echo $item['title']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="index_box_2 slogan" style="width:1200px; margin:0px auto; margin-top:30px;">

    <div class="slogan_title">选择<?php echo $config['title']; ?>,安全可信赖</div>
    <div class="slogan_tis">累计交易额:<span id="yi"><span id="sum_money_id"><?php echo $config['sum_money']; ?></span></div>
    <div id="cumulative">
        <div class="number_box">
            <?php foreach($config['sum_money_list'] as $item): ?>
            <div class="unit">
                <div class="top"><span><?php echo $item; ?></span></div>
                <div style="" class="top"><span><?php echo $item; ?></span></div>
                <div class="btm"><span><?php echo $item; ?></span></div>
                <div style="transform: rotateX(0deg);" class="btm"><span><?php echo $item; ?></span></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/index/home/js/coinindex.js"></script>
<script type="text/javascript" src="/static/index/home/js/tab.js"></script>
<script type="text/javascript" src="/static/index/home/js/slide.js"></script>
<script type="text/javascript" src="/static/index/home/js/hb_lang.js"></script>
<script type="text/javascript" src="/static/index/home/js/hb_sea.js"></script>
<script type="text/javascript" src="/static/index/home/js/hb_hm.js"></script>
<script>
    seajs.use("dist/page_index");

    /**/
    function change_vcode(e) {
        e.src = "/account/captcha?" + Math.random();
    }

    /**/

</script>

<script type="text/javascript">
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?18784dd00dc1c9774528d08ae7943072";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!-- 成功案例 -->
<!-- 客服信息 -->
<div class="autobox">
    <ul class="web_service clear pl30">
        <li class="w265"><a id="BizQQWPA" href="http://wpa.qq.com/msgrd?v=3&uin=<?php if(!empty($qq)) echo $qq; ?>&site=qq&menu=yes">
            <div class="web_service_pic service_1"></div>
            <div class="web_service_pic_num"><p><?php if(!empty($qq)) echo $qq; ?></p>
                <div class="qqsecvice">在线QQ客服</div>
            </div>
        </a></li>
        <li class="w245">
            <div class="web_service_pic service_2"></div>
            <div class="web_service_pic_num"><p><?php if(!empty($tel)) echo $tel; ?></p>
                <div>工作日:9-19时 节假日:9-18时</div>
            </div>
        </li>
        <li class="w265"><a href="http://weibo.com/<?php if(!empty($weibo)) echo $$weibo; ?>" target="_blank">
            <div class="web_service_pic service_3"></div>
            <div class="web_service_pic_num"><p><?php if(!empty($weibo)) echo $$weibo; ?></p>
                <div>新浪官方微博</div>
            </div>
        </a></li>
        <li>
            <div class="web_service_pic service_4"></div>
            <div class="web_service_pic_num"><p>2群：<?php if(!empty($qqqun)) echo $qqqun; ?></p>
                <div class="h_underl">交流QQ群<!--  <a href="javascript:;" class="orange">查看更多</a>   --></div>
            </div>
        </li>
    </ul>
</div>


<div class="safety_tips">
    <div style="border-top:#d8d8d8 dotted 1px;width: 1000px; margin: 0 auto; margin-bottom: 20px;"></div>
    <h3>专业的安全保障</h3>
    <div class="autobox">
        <ul class="safety_tips_ul clear">
            <li>
                <img src="/static/index/home/images/safe_1.jpg" alt="" height="70" width="70">
                <h4>系统可靠</h4>
                <p>银行级用户数据加密、动态身份验证，多级风险识别控制，保障交易安全</p>
            </li>
            <li>
                <img src="/static/index/home/images/safe_2.jpg" alt="" height="70" width="70">
                <h4>资金安全</h4>
                <p>钱包多层加密，离线存储于银行保险柜，资金第三方托管，确保安全</p>
            </li>
            <li>
                <img src="/static/index/home/images/safe_3.jpg" alt="" height="70" width="70">
                <h4>快捷方便</h4>
                <p>充值即时、提现迅速，每秒万单的高性能交易引擎，保证一切快捷方便</p>
            </li>
            <li>
                <img src="/static/index/home/images/safe_4.jpg" alt="" height="70" width="70">
                <h4>服务专业</h4>
                <p>专业的客服团队，400电话和24小时在线QQ，VIP一对一专业服务</p>
            </li>
        </ul>
    </div>
</div>
<!--友情链接-->
<div class="link">
    <div class="linkbox">
        <h4>友情链接</h4>
        <ul>
            <?php if(!empty($config['link'])): foreach($config['link'] as $item): ?>
            <li><a target="_blank" href="<?php echo $item['url']; ?>" style=" font-size:16px;"><?php echo $item['name']; ?></a></li>
            <?php endforeach; endif; ?>
        </ul>
    </div>
</div>

<!--footer start-->
<style>
    .rightwidth {
        width: 340px;
    }
</style>
<!--footer start-->

<div class="coin_footer" style="position:relative;">
    <div class="coin_hint">

        <h2><?php echo (isset($info_one4['title']) && ($info_one4['title'] !== '')?$info_one4['title']:"风险提示"); ?></h2>
        <p><?php if(!empty($config['risk'])) echo $config['risk']; ?></p>
    </div>
    <div class="coin_footerbar">
        <div class="coin_footer_nav clearfix">
            <div class="coin_nav left">
                <h2><?php if(!empty($menu[0]['name'])) echo $menu[0]['name']; ?></h2>
                <ul>
                    <?php foreach($menu[0]['title'] as $item): ?>
                    <li><?php echo $item['title']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="coin_nav left">
                <h2><?php if(!empty($menu[1]['name'])) echo $menu[1]['name']; ?></h2>
                <ul>
                    <?php foreach($menu[1]['title'] as $item): ?>
                    <li><?php echo $item['title']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="coin_nav left">
                <h2><?php if(!empty($menu[2]['name'])) echo $menu[2]['name']; ?></h2>
                <ul>
                    <?php foreach($menu[2]['title'] as $item): ?>
                    <li><?php echo $item['title']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="coin_nav coin_nav02 left">
                <h2 class="clearfix"><span class="left">联系我们</span><a href="http://weibo.com/<?php if(!empty($weibo)) echo $weibo; ?>"
                                                                      target="_blank" class="coin_sina left"></a>
                    <!--<a href="#" id="coin_weixin" class="coin_wei left"></a>--></h2>
                <ul>
                    <li>客服电话：<?php echo (isset($config['tel']) && ($config['tel'] !== '')?$config['tel']:"暂无"); ?></li>
                    <li>客服QQ：<?php echo (isset($config['qq1']) && ($config['qq1'] !== '')?$config['qq1']:"暂无"); ?></li>
                    <li><a href="mailto:<?php if(!empty($email)) echo $email; ?>">客服邮箱：<?php echo (isset($config['email']) && ($config['email'] !== '')?$config['email']:"暂无"); ?></a></li>
                    <li>
                        <a href="mailto:<?php if(!empty($business_email)) echo $business_email; ?>">业务合作：<?php echo (isset($config['business_email']) && ($config['business_email'] !== '')?$config['business_email']:"暂无"); ?></a>
                    </li>
                </ul>
            </div>
            <div class="coin_nav coin_nav02 left rightwidth" style="position:relative;">
                <div style=" float:left; padding-left:16px;">
                    <div style="margin-left: 2em">
                        <ul>
                            <?php if(!empty($config['qq_group'])): foreach($config['qq_group'] as $k=>$item): ?>
                            <li>QQ群<?php echo $k; ?>：<?php echo $item; ?></li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <p class="coin_phoneqq"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php if(!empty($qq)) echo $qq; ?>&site=qq&menu=yes"
                                               target="_blank">在线客服</a></p>
                    <p><?php echo (isset($config['work_time']) && ($config['work_time'] !== '')?$config['work_time']:"暂无"); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_aq">
        <p><?php if(!empty($config['copyright'])) echo $config['copyright']; ?></p>
        <p><?php if(!empty($config['record'])) echo $config['record']; ?></p>
        <ul class="footerSafety clearfix">
            <li class="safety02"><a href="http://net.china.com.cn/" target="_blank"></a></li>
            <li class="safety03"><a href="http://webscan.360.cn/index/checkwebsite/?url=<?php if(!empty($host)) echo $host; ?>"
                                    target="_blank"></a></li>
            <li class="safety04"><a href="http://www.cyberpolice.cn/wfjb/" target="_blank"></a></li>
        </ul>
    </div>
    <div id="weixin" style="position:absolute; bottom:88px; left:50%; margin-left:170px; display:block;">
        <img src="<?php if(!empty($logo)) echo $logo; ?>">
    </div>
    <script>
        $('#coin_weixin').mouseover(function () {
            $('#weixin').show();
        }).mouseout(function () {
            $('#weixin').hide();
        });
    </script>
    <!--footer end-->
    <script type="text/javascript" src="/static/index/home/js/gotop.js"></script>
    <script type="text/javascript" src="/static/index/home/js/link.js"></script>
    <script type="text/javascript" src="/static/index/home/js/slides.js"></script>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?0ab4db557b96d841137861e0740d1e0a";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
        $('.hidden-xs').hide();
    </script>


</div></body></html>
<script type="text/javascript">
    var succ_notice = "<?php if(\think\Session::get('succ_notice')) echo \think\Session::get('succ_notice'); ?>";
    var error_notice = "<?php if(\think\Session::get('error_notice')) echo \think\Session::get('error_notice'); ?>";
    if (succ_notice){
        $().wh_succ_notice(succ_notice);
    }
    if (error_notice){
        $().wh_error_notice(error_notice);
    }
</script>
<!--footer end-->
<script>
    $(function () {
        $(".flexslider").flexslider({
            directionNav: true,
            pauseOnAction: false
        });
    });

</script>
<script type="text/javascript">
//    "<?php echo url('admin/crontab/get_cache_wh_data',['currency'=>'AUDHKD']); ?>"
    $.getJSON('http://data.jianshukeji.com/jsonp?a=e&filename=json/aapl-ohlc.json&callback=?', function (data) {
        // create the chart
        $('#container').highcharts('StockChart', {
            rangeSelector: {
                allButtonsEnabled: true,
                inputEnabled: false,
                buttons: [{
                    type: 'minute',
                    count: 1,
                    text: '1分'
                }, {
                    type: 'minute',
                    count: 5,
                    text: '5分'
                }, {
                    type: 'minute',
                    count: 15,
                    text: '15分'
                }, {
                    type: 'minute',
                    count: 30,
                    text: '30分'
                }, {
                    type: 'hour',
                    count: 1,
                    text: '1小时'
                }, {
                    type: 'hour',
                    count: 8,
                    text: '8小时'
                }, {
                    type: 'day',
                    count: 1,
                    text: '1天'
                }],
                selected: 1
            },
            title: {
                text: 'AAPL Stock Price'
            },
            series: [{
                type: 'candlestick',
                name: 'AAPL Stock Price',
                data: data,
                color: 'green',
                lineColor: 'green',
                upColor: 'red',
                upLineColor: 'red',

                dataGrouping: {
                    units: [
                        [
                            'week', // unit name
                            [1] // allowed multiples
                        ], [
                            'month',
                            [1, 2, 3, 4, 6]
                        ]
                    ]
                }
            }]
        });
    });

    Highcharts.setOptions({
        global: {
            useUTC: false
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled:false
        },
//        navigator: {
//            enabled: false
//        },
//        scrollbar:{
//            enabled: false
//        },
        lang: {
            rangeSelectorFrom: "日期:",
            rangeSelectorTo: "至",
            rangeSelectorZoom: "范围",
            loading: '加载中...',
        }
    });

</script>
