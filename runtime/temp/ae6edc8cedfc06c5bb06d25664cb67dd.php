<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"F:\whsystem\public/../application/index\view\order\index.html";i:1508124152;s:60:"F:\whsystem\public/../application/index\view\tpl\header.html";i:1508035573;s:60:"F:\whsystem\public/../application/index\view\tpl\footer.html";i:1508135442;s:57:"F:\whsystem\public/../application/index\view\tpl\msg.html";i:1506260401;}*/ ?>
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
<script type="text/javascript" src="/static/index/kline/code/highstock.js"></script>
<script src="https://img.hcharts.cn/highcharts/modules/exporting.js"></script>
<script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
<script>
    $(function () {
        var time = create_time(20000)
        setInterval(append_tab, time);
    });
</script>

<style>
    .my_coin ul li {
        font-size: 12px;
        width: 145px;
        height: 24px;
        overflow: hidden;
    }
</style>
<div id="main" style="background:#fbfaf8; padding-top:0;">
    <div class="total_top" style="margin-bottom: 20px;">
        <div class="price">
            <div class="left coin_coin"><?php echo $use['name']; ?><br>
                <span id="currency_mark"><?php echo $use['currency']; ?></span>
            </div>
            <ul class="right now_price">
                <li>最新价<br>
                    <span class="money" id="new_price"><?php echo $forex['price']; ?></span></li>
                <li>开盘价 / 昨收价<br>
                    <span id="24h_sell"><?php echo $forex['kp_price']; ?></span><span> / </span><span
                            id="24h_buy"><?php echo $forex['zs_price']; ?></span></li>
                <li>最高价 / 最低价<br>
                    <span id="24h_max"><?php echo $forex['zg_price']; ?></span><span> / <span><span
                            id="24h_min"><?php echo $forex['zd_price']; ?></span></span></span></li>
                <li>涨 / 跌<br>
                    <img src="/static/index/home/images/<?php echo $forex['change_color']; ?>.gif"><span id="24h_count"
                                                                                         style="color: <?php echo $forex['change_color']; ?>"><?php echo $forex['change']; ?></span>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="main_box">
        <!--普通-->
        <div class="k_img k-box" id="k-cus-box">
            <div id="graphbox" style="width:96%;height:455px;margin:0px auto;">
                <div id="container" style="height: 410px; min-width: 460px"></div>
                <!--<div id="chart-control" data="ybc" class="btn-group centered" style="width: 98%;height: 30px;line-height: 30px; marign:0 auto;text-align:center">-->
                    <!--<button data-time="kline_5m" class="btn">5分钟线</button>-->
                    <!--<button data-time="kline_15m" class="btn">15分钟线</button>-->
                    <!--<button data-time="kline_30m" class="btn">30分钟线</button>-->
                    <!--<button data-time="kline_1h" class="btn btn-success">1小时线</button>-->
                    <!--<button data-time="kline_8h" class="btn">8小时线</button>-->
                    <!--<button data-time="kline_1d" class="btn ">日线</button>-->
                <!--</div>-->
            </div>
        </div>
        <!--交易币种id-->
        <input value="" name="currency_id" type="hidden" id="currency_id">
        <!--交易币种id-->
        <div class="trading left clearfix">
            <div class="my_coin">
                <!--登录后-->
                <?php if(!empty($online_user)): ?>
                <ul>
                    <li style="width: 200px; overflow: hidden; height: 24px;">我的资产：<?php echo !empty($online_user['money'])?$online_user['money'] : '0.0000'; ?>
                    </li>
                    <li>可用：<span class="sell" id="to_over"><?php echo !empty($online_user['can'])?$online_user['can'] : '0.0000'; ?></span></li>
                    <li>冻结：<span class="buy" id="to_lock"><?php echo !empty($online_user['block'])?$online_user['block'] : '0.0000'; ?></span>
                    </li>
                    <div class="clear"></div>
                </ul>
                <ul>
                    <li style="width: 200px; overflow: hidden; height: 24px;"><?php echo $use['currency']; ?>：<?php echo !empty($online_user['money'])?$online_user['money'] : '0.0000'; ?>
                    </li>
                    <li>可用：<span class="sell" id="to_over"><?php echo !empty($online_user['can'])?$online_user['can'] : '0.0000'; ?></span></li>
                    <li>冻结：<span class="buy" id="to_lock"><?php echo !empty($online_user['block'])?$online_user['block'] : '0.0000'; ?></span>
                    </li>
                    <div class="clear"></div>
                </ul>
                <?php else: ?>
                <p>我的资产：<a href="<?php echo url('member/login'); ?>">登录</a> | <a href="<?php echo url('member/register'); ?>">注册</a></p>
                <?php endif; ?>
            </div>
            <div class="curve pay">
                <div class="buysell sellform">
                    <div class="buyformarea left">
                        <h2 class="buy">买入<?php echo $use['currency']; ?> </h2>
                        <ul class="buyform" id="member_buy_form">
                            <li>
                                <label>交易类型：</label>
                                <select name="jy_type" class="jy_type_select_buy">
                                    <option value="1">市价</option>
                                    <option value="2">限价</option>
                                </select>
                            </li>
                            <li>
                                <label for="price" class="buys">买入价格：</label>
                                <input id="price" value="" style="color:#999" name="buy_price" id="coinpricein"
                                       type="text" v-data="require">
                            </li>
                            <!--<li>-->
                            <!--<label for="coinbuy_max" class="buys">最大可买：</label>-->
                            <!--<b id="coinbuy_max" title="点击将数值写入数量输入框"></b><span class="maxcoin">0</span>-->
                            <!--</li>-->
                            <li>
                                <label for="buynum" class="buys">买入数量：</label>
                                <input id="buynum" style="display:none;">
                                <!-- for disable autocomplete on chrome -->
                                <input name="buynum" id="numberin" autocomplete="off" type="text" value=""
                                       v-data="number">
                            </li>
                            <li>
                                <label for="buyword" class="buys">交易密码：</label>
                                <input id="buyword" style="display:none;">
                                <!-- for disable autocomplete on chrome -->
                                <input class="buyinput" value="" id="pwdtradein" autocomplete="off" type="password"
                                       name="buypwd" v-data="require">
                            </li>
                            <!--<li style="margin-bottom:0;">-->
                            <!--<label for="feebuy" class="buys">手续费：</label>-->
                            <!--<b id="feebuy">0.00</b><span>（<?php echo (isset($currency['currency_buy_fee']) && ($currency['currency_buy_fee'] !== '')?$currency['currency_buy_fee']:"0.00%"); ?>% <?php echo (isset($currency['currency_mark']) && ($currency['currency_mark'] !== '')?$currency['currency_mark']:"&#45;&#45;"); ?>）</span>-->
                            <!--</li>-->
                            <li>
                                <label for="coinin_sumprice" class="buys">交易额：</label>
                                <b id="coinin_sumprice">0.00</b> <?php echo (isset($currency_trade['currency_mark']) && ($currency_trade['currency_mark'] !== '')?$currency_trade['currency_mark']:"CNY"); ?>
                            </li>
                        </ul>
                        <p class="sellform">
                            <input id="trustbtnin" class="submit" value="买入" type="button">
                        </p>
                        <p class="sellform" style="margin:15px 0;"><span id="trustmsgin" class="tishi"></span>
                        </p>
                    </div>
                    <div class="buyformarea right">
                        <h2 class="sell">卖出<?php echo $use['currency']; ?> </h2>
                        <ul class="buyform sellform">
                            <li>
                                <label>交易类型：</label>
                                <select name="jy_type" class="jy_type_select_sale">
                                    <option value="1">市价</option>
                                    <option value="2">限价</option>
                                </select>
                            </li>
                            <li>
                                <label for="price" class="buys">卖出价格：</label>
                                <input value="<?php echo (isset($currency_message['buy_one_price']) && ($currency_message['buy_one_price'] !== '')?$currency_message['buy_one_price']:'0.000'); ?>" name="sale_price"
                                       style="color:#999" class="buyinput" id="coinpriceout" type="text">
                            </li>
                            <!--<li>-->
                            <!--<label for="coinsale_max" class="buys">最大可卖：</label>-->
                            <!--<b id="coinsale_max"><?php echo (isset($sell_num) && ($sell_num !== '')?$sell_num:0); ?></b><span></span>-->
                            <!--</li>-->
                            <li>
                                <label for="buynum" class="buys">卖出数量：</label>
                                <input style="display:none;">
                                <!-- for disable autocomplete on chrome -->
                                <input class="buyinput" id="numberout"
                                       onkeyup="vNum2(this);" autocomplete="off"
                                       type="text">
                            </li>
                            <li>
                                <label for="buyword" class="buys">交易密码：</label>
                                <input style="display:none;">
                                <!-- for disable autocomplete on chrome -->
                                <input class="buyinput" id="pwdtradeout" autocomplete="off" type="password">
                            </li>
                            <!--<li style="margin-bottom:0;">-->
                            <!--<label for="fee" class="buys">手续费：</label>-->
                            <!--<b id="fee">0.00</b><span>（<?php echo (isset($currency['currency_sell_fee']) && ($currency['currency_sell_fee'] !== '')?$currency['currency_sell_fee']:"0.00"); ?>% <?php echo (isset($currency_trade['currency_mark']) && ($currency_trade['currency_mark'] !== '')?$currency_trade['currency_mark']:"&#45;&#45;"); ?>）</span>-->
                            <!--</li>-->
                            <li>
                                <label for="coinout_sumprice" class="buys">交易额：</label>
                                <b id="coinout_sumprice">0.00</b><?php echo (isset($currency_trade['currency_mark']) && ($currency_trade['currency_mark'] !== '')?$currency_trade['currency_mark']:"CNY"); ?>
                            </li>
                        </ul>
                        <p class="sellform2">
                            <input class="submit" id="trustbtnout" value="卖出" onclick="sell();" type="button">
                        </p>
                        <p class="sellform" style="margin:15px 0;"><span id="trustmsgout" class="tishi"></span>
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
                <h2>最新成交<a href="<?php echo url('Trade/myDeal'); ?>" class="right my_coin_trade">我的成交</a></h2>
                <div class="buysell" style="border:1px solid #d2d2d2;">
                    <ul class="record_title">
                        <li>成交时间</li>
                        <li>类型</li>
                        <li>成交价格</li>
                        <li>成交量</li>
                        <li>总计</li>
                    </ul>
                    <div class="record">
                        <table class="latest_list record_list" align="center" border="0" cellpadding="0"
                               cellspacing="0">
                            <tbody id="coinorderlist">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="latest right clearfix">
            <p class="more_coin"><a href="<?php echo (isset($currency['detail_url']) && ($currency['detail_url'] !== '')?$currency['detail_url']:''); ?> " target="_blank">查看货币详情</a></p>

            <notempty name="session">

                <h2 style="margin-top:20px;">我的委托<a href="<?php echo url('Entrust/manage'); ?>" class="right my_coin_trade">全部委托</a>
                </h2>
                <div style="border:1px solid #d2d2d2; color:#333;">
                    <ul class="my_title">
                        <li style=" width:40px;">类型</li>
                        <li style=" width:65px; text-align:left; padding-left:10px;">委托价格</li>
                        <li style=" width:100px; text-align:left; padding-left:10px;">委托数量</li>
                        <li style=" width:52px; text-align:left; padding-left:10px;"></li>
                        <li style=" width:52px; text-align:left; padding-left:10px;">操作</li>
                    </ul>
                    <div class="my_record">
                        <table class="latest_list weituo" style=" width:291px;" align="center" border="0"
                               cellpadding="0" cellspacing="0">
                            <tbody id="mycointrustlist">
                            <foreach name='user_orders' item='v'>
                                <tr class="list_con2">
                                    <td class="{} left_sell" style="width:55px;">
                                        <?php if(!empty($v['type'])) echo $v['type']; ?>
                                    </td>
                                    <td style="width:50px;"><?php echo (isset($v['price']) && ($v['price'] !== '')?$v['price']:0.00); ?></td>
                                    <td>{}</td>
                                    <td style="width:60px;"><span
                                            style="" class="{}Span"></span></td>
                                    <td style="width:40px;"><a href="javascript:void(0)"
                                                               onclick="cexiao({})">撤销</a></td>
                                </tr>
                            </foreach>
                            </tbody>
                        </table>
                    </div>
                </div>
                <else/>
                <div style="border:1px solid #e2e2e2; margin:15px 0; padding:15px; color:#333; background:#fff; line-height:20px; font-size:14px; text-align:left;">
                    <p style="width:278px; word-break:break-all;">交易规则：<br>
                        {}
                    </p>
                </div>
            </notempty>
            <div style="margin-top:0px;">
                <h2>委托信息</h2>
            </div>
            <table cellspacing="0" cellpadding="0" border="0" class="latest_list weituo" align="center"
                   style="border:1px solid #d2d2d2;">
                <tbody id="coinsalelist">
                <volist name='sell_record' key='k' id='vo'>
                    <tr class="list_con2">
                        <td class="sell left_sell" style="width:55px;">卖(

                            )
                        </td>
                        <td style="width:70px;" onclick="getsell(this)"><?php echo (isset($vo['price']) && ($vo['price'] !== '')?$vo['price']:0.00); ?></td>
                        <td onclick="sellnum(this)">{}</td>
                        <td style="width:80px;"><span style="" class="sellSpan"></span></td>
                    </tr>
                </volist>
                </tbody>
            </table>
            <table cellspacing="0" cellpadding="0" border="0" class="latest_list weituo" align="center"
                   style="border:1px solid #d2d2d2;">
                <thead>
                <tr style="height:26px;">
                    <th style="height:26px; text-align:center; width:55px;" class="left_sell">卖 / 买</th>
                    <th style="height:26px; width:70px;">价格</th>
                    <th style="height:26px;">委托量</th>
                    <th style="height:26px;">&nbsp;</th>
                </tr>
                </thead>
                <tbody id="coinbuylist">
                <?php if(!empty($buy_record)): ?>
                <volist name='buy_record' key='k' id='vo'>
                    <tr class="list_con2">
                        <td class="buy left_sell" style="width:55px;" onclick="getbuy(this);">买(<?php echo $k; ?>)</td>
                        <td style="width:70px;" onclick="buynum(this);"><?php echo (isset($vo['price']) && ($vo['price'] !== '')?$vo['price']:0.00); ?></td>
                        <td><?php echo $vo['num']-$vo['trade_num']; ?></td>
                        <td style="width:80px;"><span style="width:<?php echo $vo['bili']; ?>%" class="buySpan"></span></td>
                    </tr>
                </volist>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="clear"></div>
</div>
<format id="price_float" data="3"></format>
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
        <img src="">
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
<input type="hidden" value="<?php echo (isset($currency['currency_name']) && ($currency['currency_name'] !== '')?$currency['currency_name']:'虚拟币'); ?>" id="cname"/>
<script type="text/javascript">
    $('#numberin').keyup(function () {
        var number = $(this).val();
        var jy_type_select_buy = $('.jy_type_select_buy').val();
        if (isNaN(number)) {
            return false;
        }
        var price = 0;
        if (jy_type_select_buy == 1) {
            price = "<?php echo !empty($forex['price'])?$forex['price'] : 0; ?>";
        } else {
            price = $('input[name="buy_price"]').val();
            if (!price) {
                return false;
            }
        }
        var toteal_price = number * price;
        $('#coinin_sumprice').text(toteal_price.toFixed(4));
    });

    $('#trustbtnin').click(function () {
        $('#member_buy_form').v_validate('ajax', function () {
            var buy_money = $('input[name="buy_price"]').val();
            var numberin = $('#numberin').val();
            var pwdtradein = $('#pwdtradein').val();
            var parms = {};
            var url = '';
            if ($('.jy_type_select_sale').val() == 1) {
                var currency = "<?php echo $use['currency']; ?>";
                parms = {currency: currency, numberin: numberin, pwdtradein: pwdtradein};
                url = "<?php echo url('order/buy'); ?>";
            } else {
                parms = {buy_money: buy_money, numberin: numberin, pwdtradein: pwdtradein};
                url = "<?php echo url('order/wt_buy'); ?>";
            }
            $.post(url, parms, function (result) {

            }, 'json');
        });
    });
    $('input[name="buy_price"]').val("<?php echo !empty($forex['price'])?$forex['price'] : '0.0000'; ?>");
    $('input[name="sale_price"]').val("<?php echo !empty($forex['price'])?$forex['price'] : '0.0000'; ?>");
    $('input[name="buy_price"]').attr('disabled', true);
    $('input[name="sale_price"]').attr('disabled', true);
    $('.jy_type_select_buy').change(function () {
        var self = $(this);
        var price = "<?php echo !empty($forex['price'])?$forex['price'] : '0.0000'; ?>";
        var no_price = '0.0000';
        if (self.val() == 1) {
            $('input[name="buy_price"]').val(price);
            $('input[name="buy_price"]').attr('disabled', true);
        } else {
            $('input[name="buy_price"]').val(no_price);
            $('input[name="buy_price"]').attr('disabled', false);
        }
    });
    $('.jy_type_select_sale').change(function () {
        var self = $(this);
        var price = "<?php echo !empty($forex['price'])?$forex['price'] : 0; ?>";
        var no_price = '0.0000';
        if (self.val() == 1) {
            $('input[name="sale_price"]').val(price);
            $('input[name="sale_price"]').attr('disabled', true);
        } else {
            $('input[name="sale_price"]').val(no_price);
            $('input[name="sale_price"]').attr('disabled', false);
        }
    });
    function append_tab() {
        var time = new Date();
        var m = time.getMonth() + 1;
        var t = time.getFullYear() + "-" + m + "-"
                + time.getDate() + " " + time.getHours() + ":"
                + time.getMinutes() + ":" + time.getSeconds();
        var rand_num = Math.random();
        var buy_type = '';
        var buy_color = '';
        if (rand_num < 0.5) {
            buy_type = '买入';
            buy_color = 'red';
        } else {
            buy_type = '卖出';
            buy_color = 'green';
        }
        var price = "<?php echo !empty($forex['price'])?$forex['price'] : 0; ?>";
        if (price == 0) {
            price = Math.random() * 10000;
            price = Math.round(price) / 10000;
        }
        var buy_num = Math.random() * 1000;
        buy_num = Math.round(buy_num);
        var count_price = buy_num * price;
        count_price = Math.round(count_price * 10000) / 10000;
        var tr = '<tr><td class="list_con1">' + t + '</td> <td class="list_con1" style="color: ' + buy_color + ';">' + buy_type + ' </td> <td class="list_con1" style="color: ' + buy_color + ';">' + price + '</td> <td class="list_con1">' + buy_num + '</td> <td class="list_con1">' + count_price + '</td> </tr>';
        var time_out = create_time(10000);
        setTimeout($('#coinorderlist').prepend(tr), time_out);
    }

    function create_time(num) {
        var interval_time = Math.random() * num;
        interval_time = parseInt(interval_time);
        return interval_time;
    }


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
            enabled: false
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

<script>
    function cexiao(_this) {
        layer.confirm('确定撤销委托？', {
            btn: ['确定', '取消'], //按钮
            title: '撤销委托'
        }, function () {
            $.post('<?php echo url('
            Entrust / cancel
            '); ?>', {status: -1, order_id: _this}, function (data) {
                if (data['status'] == 1) {
                    layer.msg(data['info']);
                    setTimeout(window.location.reload(), 1000);
                } else {
                    layer.msg(data['info']);
                }
            }
            )
        }, function () {
            layer.msg('已取消');
        });

    }

    function getsell(_this) {
        $("#coinpricein").val($(_this).text());
        zuidakemai();
    }
    function sellnum(_this) {
        $("#numberin").val($(_this).text());
    }
    function getbuy(_this) {
        $("#coinpriceout").val($(_this).text());
    }
    function buynum(_this) {
        $("#numberout").val($(_this).text());
    }

</script>