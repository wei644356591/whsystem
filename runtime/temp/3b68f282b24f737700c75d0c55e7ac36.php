<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"G:\whsystem\public/../application/index\view\member\register.html";i:1507965935;s:60:"G:\whsystem\public/../application/index\view\tpl\header.html";i:1508035573;s:57:"G:\whsystem\public/../application/index\view\tpl\msg.html";i:1506260401;s:60:"G:\whsystem\public/../application/index\view\tpl\footer.html";i:1507974958;}*/ ?>
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

<style type="text/css">
    .ybc_header {
        width: 1000px;
        height: 70px;
        margin: 10px auto;
    }

    .main {
        width: 100%;
        background-color: #fff;
        min-height: 550px;
        _height: 550px;
        font-size: 12px;
        color: #666;
        font-family: "微软雅黑";
    }

    .main_box {
        width: 1000px;
        margin: 0 auto;
        min-height: 400px;
        padding: 30px;
        padding-top: 0;
        border: 1px solid #e1e1df;
        background-color: #fbfaf8;
        margin-left: 100px;
    }

    .warning {
        line-height: 24px;
        margin-bottom: 10px;
        color: #333;
        font-size: 14px;
        word-break: break-all;
        margin-top: 0px;

    }

    .warning h2 {
        height: 60px;
        line-height: 60px;
        border-bottom: 1px solid #e1e1df;
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-weight: normal;
    }

    .warning h3 {
        height: 40px;
        line-height: 40px;
        width: 100%;
        margin-top: 20px;
        color: #333;
        font-weight: normal;
    }

    .ybc_label {
        width: 380px;
        height: 30px;
        line-height: 30px;
        text-align: right;
        padding-right: 5px;
    }

    .ybc_user2 {
        margin-bottom: 20px;
        margin-top: 50px;
        height: 20px;

    }

    .ybc_user1 {
        margin-bottom: 20px;
        margin-top: 30px;

        height: 40px;

    }

    .left {
        float: left;
    }

    .ybc_text .ybc_next {
        width: 204px;
        text-align: center;
        height: 40px;
        line-height: 40px;
        background: #f70;
        color: #fff;
        font-size: 16px;
        font-family: 'Microsoft Yahei';
        border: 0;
        padding: 0;
        cursor: pointer;
    }

    .clearfix {
        zoom: 1;
    }

    .ybc_hint1 {
        height: 30px;
        line-height: 30px;
        color: #999;
        margin-left: 15px;
    }

    .tycolor {
        color: #2471cb;
        text-decoration: underline;
    }
</style>
<div class="main" id="reg-prev">
    <div class="main_box">
        <div class="warning">
            <h2>风险警示</h2>
            <?php echo $config['reg_risk_warning']; ?>
        </div>
        <div class="ybc_user2 clearfix">
            <div class="ybc_text left"><input name="agree" id="tongyi" type="checkbox" onclick="xuanzhong()"></div>
            <div class="ybc_hint left"><label for="tongyi">我已经认真阅读以上风险提示，并已同意<?php echo $config['title']; ?>服务条款，同意在自担风险，自担损失的情况下参与交易
            </label></div>
            <div class="ybc_hint left"><span id="agree"></span></div>
        </div>
        <div class="ybc_user1 clearfix">
            <div class="ybc_label left"><label>&nbsp;</label></div>
            <div class="ybc_text left">
                <input value="继续注册" id="next-btn" class="ybc_next" style="background-color:#e1e1e1; " type="submit">
            </div>
            <div class="ybc_hint1 left"><span id="agree"> <a href="<?php echo url('Index/index'); ?>" class="tycolor">取消</a></span>
            </div>
        </div>
    </div>
</div>

<div class="ybc_section" id="reg-now" style="display:none;">

    <form class="ybc_userarea" id="ttttform" method="post" action="<?php echo url('member/register'); ?>">
        <div id="step1">
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="email">电话号码</label></div>
                <div class="ybc_text left"><input name="name" id="email" class="user_phone_num" type="text"></div>
                <div class="ybc_hint left"><strong class="msg_i" id="email_msg">i</strong><span id="emailmsg">请输入您的电话号码，用于登录和找回密码</span>
                </div><!--默认 i class="msg_i"  正确class="msg_error"  错误class="msg_ok"-->
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="pwd">登录密码</label></div>
                <div class="ybc_text left"><input id="pwd" name="pass" type="password"></div>
                <div class="ybc_hint left">
                    <strong class="msg_i" id="pwd_msg">i</strong><span id="pwdmsg">密码长度6-20位</span></div>
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="repwd">重复密码</label></div>
                <div class="ybc_text left"><input id="repwd" name="repass" type="password"></div>
                <div class="ybc_hint left"><strong class="msg_i" id="repwd_msg">i</strong><span id="repwdmsg">重复输入密码，两次需要一致</span>
                </div>
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="pay_pass">交易密码</label></div>
                <div class="ybc_text left"><input id="pay_pass" name="pay_pass" type="password"></div>
                <div class="ybc_hint left"><strong class="msg_i" id="pay_pass_msg">i</strong><span id="pay_passmsg">交易密码不能与登录密码相同</span>
                </div>
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="captcha_code">验证码</label></div>
                <div class="ybc_text left"><input name="captcha_code" id="captcha_code" type="text"></div>
                <div class="left" style="line-height:30px;">
                    <span id="send_captcha_code" style="color:#FF7700; line-height:30px;cursor:pointer;">点击发送</span><span id="check_time_id" style="color:#FF7700;display: none;">60</span>
                </div>
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="pid">邀请码</label></div>
                <div class="ybc_text left"><input name="uid" id="pid" type="text"></div>
                <div class="left" style="color:#f00; line-height:30px;">选填项</div>
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label>&nbsp;</label></div>
                <div class="ybc_text left"></div>

                <div class="ybc_hint left"><span id="agree"></span></div>
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label>&nbsp;</label></div>
                <div class="ybc_text left"><input value="注 册" id="ybc_next_id" class="ybc_next" type="button"></div>
            </div>
        </div>
    </form>
</div>
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
<script src="/static/index/home/js/form.js"></script>
<script type="text/javascript">
    vali = {email: 0, pwd: 0, repwd: 0, tongyi: 1};
    valistep2 = {pwdtrade: 0, repwdtrade: 0}
    $('#ybc_next_id').click(function () {
        var email_msg = $.trim($('#email_msg').text());
        var pay_pass_msg = $.trim($('#pay_pass_msg').text());
        var pwd_msg = $.trim($('#pwd_msg').text());
        var repwd_msg = $.trim($('#repwd_msg').text());
        var captcha_code = $('#captcha_code').val();
        if (email_msg != '√' || pay_pass_msg != '√' || pwd_msg != '√' || repwd_msg != '√' || !captcha_code) {
            $(this).v_error_tips('请正确填写表单项');
            return false
        }
        $('#ttttform').submit();
        return false;
    });
    $('#email').bind('blur', function () {
        var phone = $('#email').val();
        if (!phone) {
            return false;
        }
        var path_phone = "<?php echo url('member/check_phone'); ?>";
        $.get(path_phone, {phone: phone}, function (r) {
            if (!r.status) {
                $('#email_msg').html("×");
                $('#email_msg').css('msg_error');
                validateMsg('email', r.error_desc);
                return false;
            }
            $('#email_msg').html("√");
            $('#email_msg').css('msg_ok');
            $('#emailmsg').hide();
        }, 'json');
    });

    $('#pay_pass').bind('blur', function () {
        var pLen = $(this).val().length;
        if (pLen < 6 || pLen > 20) {
            $('#pay_pass_msg').html("×");
            $('#pay_pass_msg').css('msg_error');
            return validateMsg('pay_pass', '密码长度在6-20个字符之间', 0);
        }
        if ($('#pay_pass').val() == $('#pwd').val()) {
            $('#pay_pass_msg').html("×");
            $('#pay_pass_msg').css('msg_error');
            return validateMsg('pay_pass', '交易密码不能与登录密码一致哦', 0);
        }
        $('#pay_pass_msg').html("√");
        $('#pay_pass_msg').css('msg_ok');
        $('#pay_passmsg').hide();
    });

    $('#pwd').bind('blur', function () {
        var pLen = $(this).val().length;
        if (pLen < 6 || pLen > 20) {
            $('#pwd_msg').html("×");
            $('#pwd_msg').css('msg_error');
            return validateMsg('pwd', '密码长度在6-20个字符之间', 0);
        }
        $('#pwd_msg').html("√");
        $('#pwd_msg').css('msg_ok');
        return validateMsg('pwd', '', vali.pwd = 1);
    });
    $('#repwd').bind('blur', function () {
        var pLen = $(this).val().length;
        if (pLen < 6 || pLen > 20) {
            $('#repwd_msg').html("×");
            $('#repwd_msg').css('msg_error');
            return validateMsg('repwd', '密码长度在6-20个字符之间', 0);
        }
        if ($('#pwd').val() != $('#repwd').val()) {
            $('#repwd_msg').html("×");
            $('#repwd_msg').css('msg_error');
            return validateMsg('repwd', '密码不一致，请重新输入。', 0);
        }
        $('#repwd_msg').html("√");
        $('#repwd_msg').css('msg_ok');
        return validateMsg('repwd', '', vali.repwd = 1);
    });

    $("#tongyi").bind('click', function () {
        if ($(this).val() == 1)
            $(this).val(0);
        else
            $(this).val(1);
        if ($(this).val() == 0) {
            return validateMsg('agreemsg', '需同意本网站服务条款方可进行下一步', vali.tongyi = 0);
        } else {
            return validateMsg('agreemsg', '', vali.tongyi = 1);
        }
    });

    function step1() {
        //检查第一步是否有问题
        for (var i in vali) {
            if (!vali[i]) {
                event.preventDefault();
                return false;
            }
        }
        $('#step1').hide()
        $('#step2').show();
        $('#currentpwd').addClass('current');

    }

    function step2() {
        if (valistep2.pwdtrade == 0 || valistep2.repwdtrade == 0) {
            return false;
        } else {
            return true;
        }
    }
</script>

<script>
    $('#tongyi').click(function () {
        var isAgree = $(this).attr('checked');
        if (isAgree) {
            $(this).removeAttr('checked');
            $('#next-btn').css({'background': '#e1e1e1'});
        } else {
            $(this).attr("checked", 'true');
            $('#next-btn').css({'background': '#f60'});
        }

    });
    $('#next-btn').click(function () {
        var isAgree = $('#tongyi').attr('checked');
        if (isAgree) {
            $('#reg-prev').hide();
            $('#reg-now').show();
        }
    });

    $('#send_captcha_code').click(function () {
        var self = $('#send_captcha_code');
        var user_phone_num = $('.user_phone_num').val();
        if (!user_phone_num) {
            self.v_error_tips('请先填写手机号码', '#FF7700');
            return false;
        }
        if (!(/^1[34578]\d{9}$/.test(user_phone_num))) {
            self.v_error_tips('请填写正确的手机号码', '#FF7700');
            return false;
        }
        $.post("<?php echo url('member/send_code'); ?>", {phone: user_phone_num, type: 'reg'}, function (result) {
            if (!result.status) {
                self.v_error_tips(result.error_desc, '#FF7700');
                return false;
            }
            $().wh_succ_notice('发送成功', function () {
                setInterval(check_time, 1000);
            });
        }, 'json');
    });

    function check_time() {
        var check_time = $.trim($('#check_time_id').text());
        check_time = parseInt(check_time);
        if (check_time >= 0) {
            $('#send_captcha_code').hide();
            check_time = check_time - 1;
            $('#check_time_id').text(check_time);
            $('#check_time_id').show();
        } else {
            $('#send_captcha_code').show();
            $('#check_time_id').hide();
        }
    }
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