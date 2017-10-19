<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:58:"F:\whsystem\public/../application/index\view\safe\pay.html";i:1508377739;s:60:"F:\whsystem\public/../application/index\view\tpl\header.html";i:1508035573;s:60:"F:\whsystem\public/../application/index\view\tpl\footer.html";i:1508135442;s:57:"F:\whsystem\public/../application/index\view\tpl\msg.html";i:1506260401;}*/ ?>
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
<div id="main">
    <div class="main_box">
        <div class="raise clearfix" style="margin: 0 auto;">
            <!--<link rel="stylesheet" href="/static/index/home/css/layer.css">-->
            <script src="/static/index/home/js/base64.js"></script>
            <script src="/static/index/home/js/Fnc.js"></script>
            <style>
                .pagination{
                    width: 500px;
                }
                #layui-layer1{
                    width: 500px;
                    height: 430px;
                    align-content: center;
                    text-align: center;
                }
                .alert_p{
                    background-color: rgb(255, 255, 202);
                }
                .alert_span{
                    font-weight: bolder;
                    color: rgb(255, 102, 0);
                }
                .alert_content{
                    color: rgb(255, 102, 0);
                }
                .zzzn a {
                    display: block;
                    float: right;
                    margin: 20px;
                    padding: 8px 20px;
                    color: #fff;
                    background: #82b52d;
                    font-size: 20px;
                    border-radius: 30px;
                    text-decoration: none;
                }

                .zzzn a:hover {
                    background: #90c13e;
                }

                .ul_recharge_padding {
                    padding: 20px 0 0px 160px;
                }

                .recharge_tips {
                    color: #f00;
                    line-height: 40px;
                    margin: 0;
                }

                .recharge_left_input {
                    margin-left: 16px;
                }

                .help_link {
                    line-height: 40px;
                    color: #2471cb;
                    text-decoration: urlnderline;
                    font-size: 14px;
                }

                .help_link:hover {
                    color: #f30;
                }

                .ebank_pay {
                    font-family: Arial, "微软雅黑";
                    width: 260px;
                    height: 40px;
                    color: #fff;
                    font-size: 16px;
                    line-height: 40px;
                    text-align: center;
                    margin: 0 auto;
                    background: #f60;
                    display: block;
                    text-decoration: none;
                    border: 0;
                }

                .ebank_pay:hover {
                    background: #f70;
                    color: #fff;
                    text-decoration: none;
                    cursor: pointer;
                }

                .box_close {
                    height: 24px;
                    line-height: 24px;
                    width: 24px;
                    text-align: center;
                    font-size: 14px;
                    color: #999;
                    border-radius: 20px;
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    text-decoration: none;
                    font-family: Arial;
                }

                .box_close:hover {
                    color: #fff;
                    background: #f00;
                    text-decoration: none;
                }

                .choice_ebank .note1 {
                    width: 100px;
                    text-align: right;
                    display: block;
                    float: left;
                    margin-right: 5px;
                    line-height: 40px;
                }

                .layui-layer-content {
                    text-align: center;
                    margin-top: 80px;
                    font-size: 20px;
                    color: #666;
                    text-align: center;
                }

                .layui-layer-content .yes {
                    width: 160px;
                    height: 40px;
                    margin-top: 80px;
                    text-align: center;
                    line-height: 40px;
                    font-size: 14px;
                    background: #4b7100;
                    color: #fff;
                    border: none;
                    text-decoration: none;
                }

                .fkbtn {
                    width: 80px;
                    height: 30px;
                    color: #f60;
                    border: 1px #f60 solid;
                    border-radius: 3px;
                    font-size: 12px;
                    display: inline-block;
                    line-height: 30px;
                    text-align: center;
                }

                .fkbtn:hover {
                    color: #f60 !important;
                }

            </style>
            <name id="realname" data="<?php echo (isset($member['name']) && ($member['name'] !== '')?$member['name']:'暂无'); ?>"></name>
            <div class="ybc_list">
                <div class="ybcoin clearfix">
                    <h2 class="left">充值人民币CNY[<span style="color:red">谨防诈骗</span>]</h2>
                    <p class="right recharge_tips" style="margin-bottom:0;">
                        <a href="<?php echo url('Help/index',array('article_id'=>'59')); ?>" class="help_link">银行卡汇款帮助？</a></p>
                </div>
                <div class="support_ybc pass_ybc ybc_optimize" id="verifyon">
                    <!--        <ul id="pass_change">-->
                    <!--            <li class="selectTag ebank_change"><a onclick="selectTag('tagContent0',this);Ebank.platform('bank');" href="javascript:void(0)" class="">银行卡汇款</a></li>-->
                    <!--             <li class="ebank_change"><a onclick="selectTag('tagContent0',this);Ebank.platform('alipay');" href="javascript:void(0)" class="middle" class="ebank_pay">支付宝汇款</a></li>-->
                    <!--            <li class="note ebank_change"><a onclick="selectTag('tagContent1',this)" href="javascript:void(0)" class="">从元宝理财转账</a></li>-->
                    <!--            <div class="clear"></div>-->
                    <!--        </ul>-->

                    <div id="tagContent" class="passContent">

                        <!-- bank/alipay -->
                        <div class="tagContent selectTag" id="tagContent0">
                            <ul class="ybc_optimize_con ul_recharge_padding" id="rollout2" style="margin-top:30px;">
                                <!--  <li class="clearfix">
                                     <span class="note1" style="color:#333;font-size:12px; margin-left: 30px;">选择汇款额度</span>
                                     <input type="radio" name="bank" id="choice_money_upper" onclick="Ebank.choiceMoney(1)" checked="checked" style="vertical-align:bottom; height:40px;">
                                     <label for="choice_money_upper" class="tibi_l" onclick="Ebank.choiceMoney(1)" style="font-size:16px; line-height:40px;">大于等于5000元&nbsp;&nbsp;</label>
                                     <input type="radio" name="bank" id="choice_money_lower" onclick="Ebank.choiceMoney(0)" style="vertical-align:bottom; height:40px;">
                                     <label for="choice_money_lower" class="tibi_l" onclick="Ebank.choiceMoney(0)" style="font-size:16px; line-height:40px;">小于5000元</label>
                                 </li> -->
                                <li style="margin-top:0; position:relative;" class="choice_ebank">
                                    <span class="note1" style="color:#333;font-size:12px;">金额</span>
                                    <input name="number" id="over_num" class="money num_three" onkeyup="value=value.replace(/[^\d]/g,'');" autocomplete="off" maxlength="10" type="text">
                                    <span class="note" style="margin-left: 5px;">请输入需要充值的金额</span>
                                    <input id="rand_num" value="0" type="hidden">
                                </li>
                                <li class="num_money choice_ebank" style="margin-left:105px; position:relative;">
                                    <span class="left">汇款金额：￥</span><span class="left" id="js_pay_money"></span>
                                    <font id="ure" class="left" color="red"></font>
                                    <span class="note" style="position:absolute; top:0; right:-270px; color:#f00; font-size:14px; line-height:20px;">请严格按照汇款金额汇款，汇款金额的后<br>2位是为了保证即时到账系统自动分配的。</span>
                                </li>

                                <li style="margin-top:10px; position:relative;" class="choice_ebank">
                                    <span class="note1" style="color:#333;font-size:12px;" id="recharge_name">汇款人姓名</span>
                                    <input id="recharge_name_yes" class="money num_three" value="<?php echo (isset($auth['real_name']) && ($auth['real_name'] !== '')?$auth['real_name']:'暂无'); ?>" autocomplete="off" readonly="readonly" type="text">
                                    <span class="note" style="margin-left: 5px;">系统只接受您实名账户充值</span>
                                </li>

                                <li style="margin-top:10px; position:relative;" class="choice_ebank">
                                    <span class="note1 recharge_left_input" style="color:#333;font-size:12px; margin-left:0;" id="recharge_account">汇出银行</span>
                                    <select class="money num_three" id="bankOut" name="bankOut" style="width:259px; height:40px;">
                                        <option selected="selected" value="">请选择账户类型</option>
                                        <?php if(!empty($qrcode)): ?>
                                        <option value="alipay">支付宝</option>
                                        <option value="wechat">微信</option>
                                        <?php endif; if(!empty($bank_list)): foreach($bank_list as $item): ?>
                                        <option value="<?php echo $item['id']; ?>" card="<?php echo $item['card']; ?>" card_people="<?php echo $item['card_people']; ?>">
                                            <?php echo $item['name']; ?>
                                        </option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                    <span class="note" style="position:absolute; top:0; color:#f00; font-size:13px; line-height:20px;">请注意：请在转账的备注信息里填写以下随机字符。</span>
                                </li>
                                <li style="margin-top:10px; position:relative;" class="choice_ebank">
                                    <!--<span class="note1 recharge_left_input" style="color:#333;font-size:12px; margin-left:0;" >收款二维码</span>-->
                                    <img src="" id="show_pay_img" width="200px" height="200px" style="margin-left: 106px;display: none;">
                                    <input id="show_pay_input" class="money num_three" type="text" value="" disabled style="display: none;border-left:0px;border-top:0px;border-right:0px;border-bottom:1px;width: 400px;margin-left: 106px;font-weight: bolder;color:#f60;background-color: #FFFFCA">
                                </li>
                                <li style="margin-top:10px; position:relative;" class="choice_ebank">
                                    <span class="note1 recharge_left_input" style="color:#333;font-size:12px; margin-left:0;" id="recharge_account_id">转账需填备注</span>
                                    <input id="recharge_account_yes" value="<?php echo $pay_code; ?>" class="money num_three" type="text" readonly>
                                    <span class="note" style="color: red;">如您已经转款，请点击下方已成功转款按钮</span>
                                </li>

                                <li style="color:#f00; font-size:16px; margin-top:20px; margin-left:99px;" class="choice_ebank"></li>

                                <li>
                                    <a href="javascript:void(0);" class="btn_turn" id="choice_submit" style="margin-left:105px;">已成功转款</a>
                                </li>
                            </ul>

                            <div class="turns truns_upper">
                                <h2><?php if(!empty($art['title'])) echo $art['title']; ?></h2>
                                <?php if(!empty($art['content'])) echo $art['content']; ?>
                            </div>
                            <!--  <div class="turns turns_lower" style="display: none;">
                                 <h2 style="margin-top:80px;">充值必看步骤</h2>
                                 <p style="margin-bottom:0; color:#f00; font-size:14px;">1. 元宝理财和元宝网账户互通，请直接登录，使用第三方支付渠道（连连支付、宝付）进行充值。</p>
                                 <p style="color:#f00; font-size:14px;">2. 在元宝理财充值成功后，请返回元宝网，并选择“从元宝理财提现”，将资金转入元宝网即可正常使用。</p>
                             </div> -->
                            <!--/* <div style=" width:750px; margin-left:30px;color:#f00; font-size:14px;">
                              汇款成功后，请及时将汇款信息（进盟网账号、
                              手机号码、
                              汇款人姓名、
                              汇款时间、
                              汇款金额、
                              汇款成功截图证明、）发送邮件到cz@jmcoin.net，进盟客服人员将会在48小时之内尽快手工处理到账，请耐心等待。
                              </div>*/-->
                            <!--  <div style=" width:750px; margin-left:50px; color:#f60;">
                             汇款成功后，请及时将汇款信息（
                             <br>进盟网账号:
                             <br>手机号码:
                             <br>汇款人姓名:
                             <br>汇款时间:
                             <br>汇款金额:
                             <br>汇款成功截图证明:
                             <br>）发送邮件到cz@jmcoin.net，进盟客服人员将会在48小时之内尽快手工处理到账，请耐心等待。
                             </div>-->
                        </div>

                        <!-- licai -->
                        <div class="tagContent selectTag" id="tagContent1" style="display:none;">
                            <form class="form-horizontal" onsubmit="return false;" onkeydown="if (event.keyCode == 13) {return false;}">
                                <ul class="ybc_con" id="rollout" style="padding:20px 0 0 160px;">
                                    <li>
                                        <label style="width:100px;"><span class="redstar">*&nbsp;</span>转账金额：</label>
                                        <input style="display:none;"><!-- for disable autocomplete on chrome -->
                                        <input name="number" onkeyup="value=value.replace(/[^\d.]/g,'')" value="0" autocomplete="off" style="width:260px;" type="text">
                                        <span class="note">不能小于10元</span>
                                    </li>
                                    <li>
                                        <label style="width:100px;"><span class="redstar">*&nbsp;</span>交易密码：</label>
                                        <input style="display:none;"><!-- for disable autocomplete on chrome -->
                                        <input name="pwdtrade" autocomplete="off" style="width:260px;" type="password">
                                        <span class="note">请输入交易密码</span></li>
                                    <li>
                                        <label style="width:100px;">&nbsp;</label>
                                        <input class="queding" id="submit_recharge" value="确定" style="border:0; height:42px; line-height:40px; width:262px; font-family:'Microsoft Yahei';" onclick="Ebank.fromDai();" type="submit">
                                    </li>
                                </ul>
                            </form>
                            <div class="turns">
                                <h2>使用说明</h2>
                                <p style="margin-bottom:0;">1. 从元宝理财同名账户提现到元宝网。</p>
                                <p style="margin-bottom:0;">2. 即时到账。</p>
                                <p>3. 通过元宝理财“第三方支付”充值CNY更便捷，多家银行即时到账；可提现到元宝网使用。</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- exchange_cny list start-->

            <div class="ybc_list">
                <div class="ybcoin ">
                    <h2 class="left">充值记录</h2>
                    <p class="right" style="font-size:14px; color:#f00; line-height:40px; margin-bottom:0;">
                        这里只列出最近5条充值记录..
                        <!--<a href="<?php echo url('Help/index?id=62'); ?>" class="help_link">充值不到账如何处理？</a>-->
                    </p>
                    <div class="clear"></div>
                </div>
            </div>
            <table class="raise_list" style="border:1px solid #e1e1df;" align="center" border="0" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th>转款方式</th>
                    <th>收款帐号</th>
                    <th>金额</th>
                    <th>提交时间</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($cztx_list)): foreach($cztx_list as $item): ?>
                <tr>
                    <td>
                        <?php echo $account_type_list[$item['account_type']]; ?>
                    </td>
                    <td>
                        <?php if($item['tx_account'] == 'alipay'): ?>
                        支付宝
                        <?php elseif($item['tx_account'] == 'wechat'): ?>
                        微信
                        <?php else: ?>
                        <?php echo $item['tx_account']; endif; ?>
                    </td>
                    <td><?php echo $item['money']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$item['pay_time']); ?></td>
                    <td>
                        <?php echo $ct_status_list[$item['ct_status']]; ?>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>

            <style type="text/css">
                .ybc_chongzhi_tc {
                    width: 810px;
                    height: 520px;
                    border: 1px #ddd solid;
                    z-index: 9999;
                    position: fixed;
                    left: 50%;
                    top: 50%;
                    margin: -300px 0 0 -405px;
                    background: #fff;
                    z-index: 9999;
                }

                .ybc_chongzhi_tc_tittle {
                    width: 770px;
                    height: 80px;
                    padding: 0 20px 0 20px;
                    text-align: center;
                }

                .ybc_chongzhi_tc_tittle h2 {
                    color: #666;
                    text-align: left;
                    font-size: 24px;
                    height: 80px;
                    line-height: 80px;
                }

                .ybc_chongzhi_tc_main {
                    width: 810px;
                    height: 200px;
                    background-color: #ffffc9;
                    padding: 30px 0px;
                }

                .ybc_chongzhi_tc_tittle_img {
                    margin-top: 26px;
                    width: 28px;
                    height: 28px;
                    background: url("/static/index/home/images/close.png") left bottom no-repeat;
                }

                .ybc_chongzhi_tc_tittle_img:hover {
                    margin-top: 26px;
                    width: 28px;
                    height: 28px;
                    background: url("/static/index/home/images/close.png") left top no-repeat;
                    cursor: pointer
                }

                .ybc_chongzhi_tc_main h3 {
                    color: #333;
                    text-align: center;
                    font-size: 20px;
                    line-height: 30px;
                }

                .ybc_chongzhi_tc_main .hs {
                    color: #ff0000;
                    text-align: center;
                    font-size: 20px;
                    line-height: 30px;
                }

                .ybc_chongzhi_tc_main li span { /*width: 300px; text-align: right;*/
                    float: left;
                    color: #333;
                    font-size: 16px;
                }

                .ybc_chongzhi_tc_main li {
                    font-size: 14px;
                    color: #333;
                    height: 30px;
                    line-height: 30px;
                }

                .ybc_chongzhi_tc_tishi h3 {
                    color: #ff0000;
                    text-align: center;
                    font-size: 25px;;
                    line-height: 60px;
                }

                .ybc_chongzhi_tc_tishi p {
                    color: #ff0000;
                    text-align: left;
                    font-size: 16px;;
                    line-height: 24px;
                    padding-left: 130px;
                }

                .ybc_chongzhi_tc_tishi_bz {
                    width: 770px;
                    height: 80px;
                    padding: 0 20px 0 20px;
                    line-height: 80px;
                    font-size: 18px;
                    color: #666;
                }

                .ybc_chongzhi_tc_tishi span {
                    width: 1px;
                    padding: 0px 2px;
                    border-right: 1px #ddd solid;
                    height: 18px;
                    margin-right: 8px;
                }

                .box_bg2 {
                    width: 100%;
                    height: 100%;
                    background: #000;
                    filter: Alpha(opacity=60);
                    -moz-opacity: 0.6;
                    -khtml-opacity: 0.6;
                    opacity: 0.6;
                    position: absolute;
                    z-index: 9998;
                    position: fixed;
                    left: 0;
                    top: 0;
                }

                .special_note {
                    width: 480px;
                    height: 320px;
                    background: #ffffca;
                    border: 1px solid #fbd163;
                    position: fixed;
                    top: 50%;
                    margin-top: -161px;
                    left: 50%;
                    margin-left: -241px;
                    z-index: 9999;
                }

                .special_note h2 {
                    color: #f60;
                    font-size: 24px;
                    text-align: center;
                    height: 60px;
                    line-height: 60px;
                }

                .special_note p {
                    font-size: 16px;
                    line-height: 28px;
                    padding: 0 40px;
                    margin-bottom: 10px;
                    text-indent: 2em;
                    color: #333;
                }

                .special_note .yes_no .yes, .special_note .yes_no .no {
                    width: 160px;
                    height: 40px;
                    border: 0;
                    margin: 10px 20px;
                    cursor: pointer;
                    color: #fff;
                    font-family: 'Microsoft Yahei';
                    font-size: 14px;
                }

                .special_note .yes_no {
                    width: 400px;
                    margin: 0 auto;
                }

                .special_note .yes_no .yes {
                    background: #690;
                    color: #fff;
                }

                .special_note .yes_no .yes:hover {
                    background: #4b7100;
                }

                .special_note .yes_no .no {
                    background: #f00;
                    color: #fff;
                }

                .special_note .yes_no .no:hover {
                    background: #ba0000;
                }

                .ybc_chongzhi_tc_tittle_img {
                    margin-top: 26px;
                    width: 28px;
                    height: 28px;
                    background: url("/static/index/home/images/close.png") left bottom no-repeat;
                }

                .wid {
                    width: 170px;
                    overflow: hidden;
                }

                .pad {
                    padding-left: 38px;
                }
            </style>
            <!-- recharge alert end -->



            <script type="text/javascript" src="/static/index/home/js/tab2.js"></script>
            <script src="/static/index/home/js/layer.js"></script>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
    $('#bankOut').change(function () {
        var bank_val = $(this).val();
        if (bank_val == 'alipay') {
            $('#show_pay_img').attr('src', "<?php echo $qrcode['al_url']; ?>");
            $('#show_pay_img').show();
            $('#show_pay_input').hide();
        } else if (bank_val == 'wechat') {
            $('#show_pay_img').attr('src', "<?php echo $qrcode['wx_url']; ?>");
            $('#show_pay_img').show();
            $('#show_pay_input').hide();
        } else if (bank_val) {
            $('#show_pay_img').hide();
            var card = $(this).find('option:selected').attr('card');
            var card_people = $(this).find('option:selected').attr('card_people');
            if (/\S{5}/.test(card)) {
                card = card.replace(/\s/g, '').replace(/(.{4})/g, "$1 ");
            }
            $('#show_pay_input').val('收款人：' + card_people + ' 卡号：' + card);
            $('#show_pay_input').show();
        } else {
            $('#show_pay_img').hide();
        }
    });

    $('#over_num').on('keyup',function () {
        var over_money = $(this).val();
        if (!over_money) {
            $('#js_pay_money').text('');
            return false;
        }
        over_money = parseInt(over_money);
        var math_money = Math.random();
        math_money = parseFloat(math_money.toFixed(2));
        over_money = over_money + math_money;
        $('#js_pay_money').text(over_money);
    });

    $('#choice_submit').click(function () {
        var over_money = $.trim($('#js_pay_money').text());
        var select_val = $('#bankOut').val();
        var bank = $.trim($('#bankOut').find('option:selected').text());
        var card_people = $('#bankOut').find('option:selected').attr('card_people');
        var card = '';
        var card_type = '';
        if (select_val != 'alipay' && select_val != 'wechat') {
            card = $('#bankOut').find('option:selected').attr('card');
            card_type = card;
        } else {
            card = select_val;
            card_type = '二维码支付';
        }
        var pay_flag = $('#recharge_account_yes').val();
        if (!over_money || !pay_flag || !select_val) {
            return false;
        }
        card = !card ? null : card;
        card_people = !card_people ? '二维码收款' : card_people;
        layer.confirm('<p class="alert_p"><span class="alert_span">转账金额：</span><span class="alert_content">'+over_money+'</span></p><p class="alert_p"><span class="alert_span">收款银行：</span><span class="alert_content">'+bank+'</span></p><p class="alert_p"><span class="alert_span">收款卡号：</span><span class="alert_content">'+card_type+'</span></p><p class="alert_p"><span class="alert_span">收款人：</span><span class="alert_content">'+card_people+'</span></p><p class="alert_p"><span class="alert_span">转款标识：</span><span class="alert_content">'+pay_flag+'</span></p><br><br><p class="alert_p">请核对信息并确认是否已经转款，如已转款请点击确定，否则点击取消从新转款</p>', {icon: 3, title:'充值提示'},function (index) {
            layer.close(index);
            var load_index = layer.load(1, {
                shade: [0.1,'#fff']
            });
            $.post("<?php echo url('safe/do_pay'); ?>", {
                over_money: over_money,
                card: card,
                pay_flag: pay_flag
            }, function (result) {
                layer.close(load_index);
                if (!result.status){
                    if (result.error =='nologin'){
                        window.location.href = "<?php echo url('member/login'); ?>";
                    }
                    $().wh_error_notice(result.error_desc);
                    return false;
                }
                $().wh_succ_notice('提交成功',function () {
                   window.location.reload();
                });
            },'json');
        })
    });
</script>
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