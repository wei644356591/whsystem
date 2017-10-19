<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"F:\whsystem\public/../application/index\view\safe\draw.html";i:1508408069;s:60:"F:\whsystem\public/../application/index\view\tpl\header.html";i:1508035573;s:60:"F:\whsystem\public/../application/index\view\tpl\footer.html";i:1508135442;s:57:"F:\whsystem\public/../application/index\view\tpl\msg.html";i:1506260401;}*/ ?>
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
<style>
    .pass_ybc{ min-height:400px !important;}
    .my_add{ margin-bottom:0px !important;}
</style>
<div id="main">
    <div class="main_box">
        <div class="raise clearfix" style="margin: 0 auto;">
            <div class="ybc_list">
                <div class="ybcoin">
                    <h2 class="left">CNY提现</h2>
                    <!-- <p class="right" style=" margin-top:10px; color:#333;">您可以设置多个提款地址，这样您提款到不同的银行卡、钱包或其它平台时就会更方便。</p> -->
                    <div class="clear"></div>
                </div>
            </div>
            <div class="support_ybc pass_ybc" id="verifyon">
                <!--<ul id="pass_change">
                <li class="selectTag"><a onClick="selectTag('tagContent0',this)" href="javascript:void(0)">提现到银行卡</a> </li>
                <li class="note"><a onClick="selectTag('tagContent1',this)" href="javascript:void(0)">提现到元宝理财</a></li>
                <div class="clear"></div>
                </ul>-->
                <div id="tagContent" class="passContent">
                    <div class="tagContent selectTag" id="tagContent0">
                        <h2 class="choose_one">选择一个提款地址
                            <!-- <a href="/news/detail/?id=736" style="float: right;margin-right:30px; color: red;" target="_blank">提现银行卡暂不支持邮政储蓄银行</a> -->
                        </h2>
                        <table class="my_add" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                            <tr align="center">
                                <th>银行名称</th>
                                <th>银行帐号</th>
                                <th>开户支行</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <?php foreach($txbind_list as $item): ?>
                                <thead>
                                <th><?php echo $item['name']; ?></th>
                                <th>****<?php echo $item['account']; ?></th>
                                <th><?php echo $item['branch']; ?></th>
                                <th><a class="link-del" href="<?php echo url('safe/tx_bind_del',['id'=>$item['id']]); ?>">删除</a></th>
                                </thead>
                            <?php endforeach; ?>

                        </table>
                        <table id="addNewAddr" class="add_list" border="0" cellpadding="0" cellspacing="0" style="display:none">
                            <tbody>
                            <tr>
                                <form action="<?php echo url('safe/tx_bind_account'); ?>" method="post" id="bankform">
                                    <td colspan="4" id="newAddress" style="">
                                        <div id="rmb_out_ok">
                                            <ul class="ybc_con" id="rollout" style="margin-top:10px;">
                                                <li>
                                                    <label>开户姓名：</label>
                                                    <input id="name" value="<?php if(!empty($real_name)) echo $real_name; ?>" class="loginValue" disabled="disabled" type="text">
                                                    <span class="false" id="accountmsg">与实名认证信息一致不可修改</span> </li>
                                                <li>
                                                    <label>银行名称：</label>
                                                    <select name="name" id="bank" class="loginValue" style="width:264px; border:1px solid #e1e1df;">
                                                        <option selected="selected" value="">请选择银行</option>
                                                        <option value="支付宝">支付宝</option>
                                                        <option value="工商银行">工商银行</option>
                                                        <option value="建设银行">建设银行</option>
                                                        <option value="农业银行">农业银行</option>
                                                        <option value="中国邮政储蓄银行">中国邮政储蓄银行</option>
                                                        <option value="交通银行">交通银行</option>
                                                        <option value="中国银行">中国银行</option>
                                                        <option value="光大银行">光大银行</option>
                                                        <option value="中信银行">中信银行</option>
                                                        <option value="招商银行">招商银行</option>
                                                        <option value="民生银行">民生银行</option>
                                                        <option value="兴业银行">兴业银行</option>
                                                        <option value="平安银行">平安银行</option>
                                                        <option value="广发银行">广发银行</option>
                                                        <option value="北京银行">北京银行</option>
                                                        <option value="华夏银行">华夏银行</option>
                                                        <option value="上海浦东发展银行">上海浦东发展银行</option>
                                                        <option value="渤海银行">渤海银行</option>
                                                        <option value="浙商银行">浙商银行</option>
                                                        <option value="宁波银行">宁波银行</option>
                                                        <option value="恒丰银行">恒丰银行</option>
                                                        <option value="中国农业发展银行">中国农业发展银行</option>
                                                    </select>
                                                    <span class="rePWB" id="bankmsg"></span>
                                                </li>
                                                <li><label>开户支行：</label>
                                                    <input name="branch" id="bank_branch" class="loginValue" style="font-size:14px;font-weight:bold;color:#f60;background:#fff7f2;" type="text" v-data="require">
                                                    <span class="false" id="accountmsg" style="color:#f00;">如果选择支付宝这项填“ - ”</span></li>
                                                </li>
                                                <li>
                                                    <label id="kh">银行卡号：</label>
                                                    <input onkeyup="value=value.replace(/[^\d]/g,'')" name="account" id="account" class="loginValue" style="font-size:14px;font-weight:bold;color:#f60;background:#fff7f2;" type="text" v-data="require">
                                                    <span class="false" id="accountmsg" style="color:#f00;">如果选择支付宝这项填“ 支付宝帐号 ”</span> </li>
                                                <li id="yes_add">
                                                    <label>&nbsp;</label>
                                                    <input class="addition"  id="bind_account_btn" value="确认添加" type="submit">
                                                    <span id="showMsg_address" style="color:red;">最多添加3条提款地址</span> </li>
                                            </ul>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <script type="text/javascript">
                                $('#bind_account_btn').click(function () {
                                    var bank = $('#bank').val();
                                    var bank_branch = $('#bank_branch').val();
                                    var account = $('#account').val();
                                    if (!bank){
                                        $('#bank').v_error_tips('请选择提现银行');
                                        return false;
                                    }
                                    if (!bank_branch){
                                        $('#bank_branch').v_error_tips('请填写支行');
                                        return false;
                                    }
                                    if (!account){
                                        $('#account').v_error_tips('请填写帐号');
                                        return false;
                                    }
                                    return true;
                                });
                            </script>
                            <tr style="display:none;" id="phone_alert" align="right">
                                <td colspan="4"><span style="color:#f00;">系统已拨打您的手机告知验证码，请输入验证码</span>
                                    <input class="verify_text" id="phone_code_bank" type="text">
                                    <input class="verify" id="add_bankcards" onclick="cnyOut.finaddAddress()" value="确认" type="button"></td>
                            </tr>
                            </tbody>
                        </table>


                        <center>
                            <table>
                                <tr id="addAddress_tr" align="center">
                                    <td colspan="4" class="list" align="center">
                                        <eq name="num" value="1"><a href="javascript:void(0);" id="addNewAddress" onclick="addNewAddr();">点击绑定银行卡</a>
                                            <else/>
                                    <td style="color:red;">最多添加3条提款地址</td>
                                    </eq></td>
                                </tr>
                            </table>
                        </center>
                        <script>
                            function addNewAddr(){
                                document.getElementById("addNewAddr").style.display="";//显示
                                document.getElementById("addAddress_tr").style.display="none";//隐藏
                            }
                        </script>
                        <h2 class="choose_one">输入要提款的金额<span>(可用余额：<strong>￥<?php if(!empty($online_user['can'])) echo $online_user['can']; ?></strong>)</span><span style="float:right;margin-right:20px;"><strong id="rmbout_showtips"></strong></span></h2>

                        <form action="<?php echo url('safe/withdraw'); ?>" method="post" id="drawform">
                            <table class="my_add" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="position:relative; padding-left:90px;">提款金额
                                        <input name="select_bank" id="select_bank" type="hidden">
                                        <input style="display:none">
                                        <!-- for disable autocomplete on chrome -->
                                        <input class="sum" name="money" autocomplete="off" type="text" onkeyup="value=value.replace(/[^\d]/g,'');">
                                    </td>
                                    <td>实际到帐
                                        <input class="sum" id="true_daozhang" disabled="disabled" type="text">
                                        <span style="color:#f60;"><?php echo !empty($consume['sx_money'])?'手续费'.$consume['sx_money'].'‰' : ''; ?></span></td>


                                </tr>
                                <tr>
                                    <td style=" padding-left:90px;">交易密码
                                        <input style="display:none" type="password">
                                        <!-- for disable autocomplete on chrome -->
                                        <input class="sum" name="pwdtrade" id="pwdtrade" autocomplete="off" type="password"></td>
                                    <td>短信验证
                                        <input style="display:none" type="password">
                                        <!-- for disable autocomplete on chrome -->
                                        <input class="sum" name="code" id="code" autocomplete="off" type="password">
                                        <span id="send_captcha_code" style="color:#FF7700; line-height:30px;cursor:pointer;">点击发送</span><span id="check_time_id" style="color:#FF7700;display: none;">60</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="position:relative; padding-left:90px;">
                                        选择银行
                                        <select name="bank" style="height: 40px;width:146px;>
                                            <option value="">--请选择到账银行--</option>
                                            <?php foreach($txbind_list as $item): ?>
                                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?>****<?php echo $item['account']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td><input style=" float:right; margin-right:103px;" class="confirm"  value="确认提交" type="submit"></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                        <script type="text/javascript">

                        </script>

                        <h2 class="choose_one"><?php if(!empty($art['title'])) echo $art['title']; ?></h2>
                        <div class="turns Font14">
                            <input id="cny_outfee" value="0.003" type="hidden">
                            <?php if(!empty($config['withdraw_warning'])) echo $config['withdraw_warning']; ?>
                        </div>
                    </div>
                    <div class="tagContent" id="tagContent1">

                        <form action="<?php echo url('User/withdraw'); ?>" method="post">
                            <ul class="ybc_con" id="rollout">
                                <li>
                                    <label>提现金额：</label>
                                    <input style="display:none;">
                                    <!-- for disable autocomplete on chrome -->
                                    <input style="float:left;" name="number" onkeyup="value=value.replace(/[^\d.]/g,'')" id="num2" value="0" autocomplete="off" type="text">
                                    <span class="note left" style=" height:40px; display:table-cell; vertical-align: middle;">转出金额不能小于10元</span>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label>交易密码：</label>
                                    <input style="display:none;">
                                    <!-- for disable autocomplete on chrome -->
                                    <input name="pwdtrade" id="pwdtrade2" autocomplete="off" type="password">
                                    <span class="note">请输入交易密码</span></li>
                                <li>
                                    <label>&nbsp;</label>
                                    <input class="queding" value="确定" type="submit">
                                </li>
                            </ul>
                            <div class="turns">
                                <h2>使用说明</h2>
                                <p>1. 提现到元宝理财的同名账户。</p>
                                <p>2. 及时到账。</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ybc_list">
                <div class="ybcoin">
                    <h2 class="left">提现记录</h2>
                    <div class="clear"></div>
                </div>
                <table class="raise_list" style="border:1px solid #e1e1df;" align="center" border="0" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th>提现银行</th>
                        <th>提现帐号</th>
                        <th>实际到账</th>
                        <th>操作时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cztx_list as $item): ?>
                        <tr id="btc_box" class="btc_new">
                            <td id="btc_wallet"><?php echo $item['ct_bank']; ?></td>
                            <td id="btc_number"><?php echo $item['tx_account']; ?></td>
                            <td id="btc_fee"><?php echo $item['money']; ?></td>
                            <td id="btc_created"><?php echo date('Y-m-d H:i:s',$item['pay_time']); ?></td>
                            <td class="tableEnd" id="btc_status"><?php echo $ct_status_list[$item['ct_status']]; ?></td>
                            <td><a href="javascript:void(0);"><?php echo $item['ct_status']!=2?'撤销' : '已完成'; ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <style>
            .btc_new,.btc_new td {background: #DDFFDD !important;}#cb_msg_box{background:#B50000;color:#FFF;display:none;text-align:center;padding:0px;}
        </style>
        <!--    <script type="text/javascript" src="js/tab2.js"></script>
            <script src="js/form.js"></script>
            <script src="js/city.js"></script>
            <script src="js/cnyout.js"></script> -->
        <script>
            $("document").ready(function(){
                //initProvinceCity($("#p1"),$("#c1"));
                //$('#account').inputFormat('account');
                // $('#money_rmb').inputFormat('amount');
            });
        </script>

    </div>
    <div class="clear"></div>
</div>
<script>
    $(".menu14").addClass("uc-current");

    function showTips(id,msg){
        var tips = layer.tips(msg, id, {
            tips: [1, '#fff8db'],
            area: ['400px', '35px']
        });
        $(id).on('mouseout', function(){
            layer.close(tips);
        });
    }
</script>
<script>
    function chexiao(id){
        layer.confirm(
            '确定撤销',
            {btn:['确定','取消']},
            function(){
                $.post("/Home/User/chexiaoByid",{"id":id},function(data){
                    if(data.status==0){
                        layer.msg(data['info']);
                        window.location.reload();
                    }else{
                        layer.msg(data['info']);
                        window.location.reload();
                    }
                })
            }
        ),
            function(){
                layer.msg('已取消');
            }

    }
    function sandPhone(){
        var i=120;

        var phone = $("mo").val();
        if(phone && /^1[3|4|5|8]\d{9}$/.test(phone)){
            layer.msg("请填写正确的手机号码");
        }else{
            $.post("<?php echo url('ModifyMember/ajaxSandPhone'); ?>",{phone:encodeURIComponent($("#mo").val())},
                function(d){
                    layer.msg(d.info);
                    if(d.status==1){
                        var tid2;
                        tid2=setInterval(function(){
                            if($("#msgt").attr("data-key")=='off'){
                                $("#msgt").attr("disabled",true);
                                $("#msgt").removeClass("class");
                                $("#msgt").addClass("button again");
                                i--;
                                $("#msgt").val(i+"秒后可重新发送");
                                if(i<=0){
                                    $("#msgt").removeAttr("disabled").val("重新发送验证码");
                                    $("#msgt").attr("data-key","on");
                                }
                            }
                        },1000);
                        i=120;
                        $("#msgt").attr("data-key","off");
                    }
                });
        }
    }</script>
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