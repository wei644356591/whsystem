<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"F:\whsystem\public/../application/index\view\safe\auth.html";i:1508142690;s:60:"F:\whsystem\public/../application/index\view\tpl\header.html";i:1508035573;s:60:"F:\whsystem\public/../application/index\view\tpl\footer.html";i:1508135442;s:57:"F:\whsystem\public/../application/index\view\tpl\msg.html";i:1506260401;}*/ ?>
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
<script type="text/javascript" src="/static/index/home/js/imageuploadpreview.js"></script>
<!--top end-->
<div class="ybc_section">
    <div class="ybc_warn Font18">为了确保您的资金安全，请实名认证</div>
    <form id="member_auth_form" method="post" action="<?php echo url('safe/auth'); ?>" enctype="multipart/form-data">
        <div class="ybc_userarea ybc_userarea2" style="margin-bottom:50px;">
            <!--<div class="ybc_user clearfix">-->
                <!--<div class="ybc_label left"><label for="nick">昵称</label></div>-->
                <!--<div class="ybc_text left"><input name="nick" id="nick" value="" type="text"></div>-->
                <!--<div class="ybc_hint left"><strong class="msg_i">i</strong><span id="nickmsg"><font style="color:red">请输入您的昵称</font></span></div>-->
            <!--</div>-->
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="name">真实姓名</label></div>
                <div class="ybc_text left"><input name="real_name" id="name" value="" v-data="require" autocomplete="off" maxlength="8" type="text" v-msg="请填写真实姓名"></div>
                <!--<div class="ybc_hint left"><strong class="msg_i">i</strong><span id="namemsg">真实姓名设置后不能修改，并且与提现账户名相同</span></div>-->
            </div>
            <!--<div class="ybc_user clearfix">-->
                <!--<div class="ybc_label left"><label for="cardtype">证件类型</label></div>-->
                <!--<div class="ybc_text left">-->
                    <!--<select id="cardtype" name="cardtype">-->
                        <!--<option value="1" selected="selected">身份证</option>-->
                        <!--<option value="2">护照</option>-->
                        <!--<option value="3">军官证</option>-->
                        <!--<option value="4">其它</option>-->
                    <!--</select>-->
                <!--</div>-->
            <!--</div>-->
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="idcard">身份证号码</label></div>
                <div class="ybc_text left"><input name="identity" id="idcard" value="" type="text" v-data="identity" v-msg="请填写身份证号码"></div>
                <!--<div class="ybc_hint left"><strong class="msg_i">i</strong><span id="idcardmsg">证件号码注册后不能修改</span></div>-->
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="idcard">身份证正面</label></div>
                <div class="ybc_text left"><img id="identity_zm_click" src="<?php echo !empty($auth['identity_zm'])?$auth['identity_zm'] : '/static/index/home/images/empty_img.png'; ?>" width="160px" height="160px"></div>
                <input name="identity_zm" id="identity_zm" type="file" style="display: none;" v-data="require" v-msg="请上传身份证正面">
                <!--<div class="ybc_hint left"><strong class="msg_i">i</strong><span id="identity_zm_msg">请上传身份证正面</span></div>-->
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="idcard">身份证反面</label></div>
                <div class="ybc_text left"><img id="identity_fm_click" src="<?php echo !empty($auth['identity_fm'])?$auth['identity_fm'] : '/static/index/home/images/empty_img.png'; ?>" width="160px" height="160px"></div>
                <input name="identity_fm" id="identity_fm" type="file" style="display: none;" v-data="require" v-msg="请上传身份证反面">
                <!--<div class="ybc_hint left"><strong class="msg_i">i</strong><span id="identity_zm_msg">请上传身份证正面</span></div>-->
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="idcard">身份证手持</label></div>
                <div class="ybc_text left"><img id="identity_sc_click" src="<?php echo !empty($auth['identity_sc'])?$auth['identity_sc'] : '/static/index/home/images/empty_img.png'; ?>" width="160px" height="160px"></div>
                <input name="identity_sc" id="identity_sc" type="file" style="display: none;" v-data="require" v-msg="请上传手持身份证">
                <!--<div class="ybc_hint left"><strong class="msg_i">i</strong><span id="identity_zm_msg">请上传身份证正面</span></div>-->
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="phone">手机号码</label></div>
                <div class="ybc_text left" style=" line-height:30px; width:209px;">
                    <input name="phone" id="phone" value="<?php echo $online_user['name']; ?>" readonly type="text" v-data="phone">
                </div>
                <!--<div class="ybc_hint left">-->
                    <!--<strong class="msg_i">i</strong>-->
                    <!--<span id="momsg">请输入您的手机号码</span>-->
                <!--</div>-->
            </div>
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label for="code">验证码</label></div>
                <div class="ybc_text left"><input name="code" id="code" value="" type="text" v-data="number" v-msg="手机验证码只能是数字"></div>
                <div class="ybc_hint left"><span id="send_captcha_code" style="color:#FF7700; line-height:30px;cursor:pointer;">点击发送</span><span id="check_time_id" style="color:#FF7700;display: none;">60</span></div>
            </div>
            <!--<input id="avatar" name="avatar" value="/images/ulogodefault.jpg" type="hidden">-->
            <div class="ybc_user clearfix">
                <div class="ybc_label left"><label>&nbsp;</label></div>
                <div class="ybc_text left"><input value="提交" class="ybc_next" id="member_auth_btn" type="button"></div>
            </div>
        </div>
        <div style="font-size:14px; padding-left:180px; line-height:24px; color:#666; margin-bottom:30px;">
            <p>1.真实姓名经实名认证后将不能够更改，请如实填写。</p>
            <p>2.<?php echo (isset($config['title']) && ($config['title'] !== '')?$config['title']:'本网站'); ?>只接受实名充值，提现时银行等姓名信息必须与您的认证姓名一致。</p>
            <p>3.<?php echo (isset($config['title']) && ($config['title'] !== '')?$config['title']:'本网站'); ?>有合理的理由怀疑用户提供虚假身份信息时，有权拒绝注册或者冻结、注销已经注册的账户及资产。</p>
        </div>
    </form>
</div>
<script type="text/javascript" src="/static/index/home/js/city.js"></script>
<script type="text/javascript">
    $("document").ready(function(){
        initProvinceCity($("#p1"),$("#c1"));
    });
</script>
<script type="text/javascript" src="/static/index/home/js/ajaxfileupload.js"></script>
<script charset="utf-8" src="/static/index/home/js/kindeditor-min.js"></script>
<script charset="utf-8" src="/static/index/home/js/zh_CN.js"></script>
<script src="/static/index/home/js/form.js"></script>
<script type="text/javascript">
    $('#send_captcha_code').click(function () {
        var self = $('#send_captcha_code');
        var user_phone_num = $('#phone').val();
        if (!user_phone_num) {
            self.v_error_tips('请先填写手机号码', '#FF7700');
            return false;
        }
        if (!(/^1[34578]\d{9}$/.test(user_phone_num))) {
            self.v_error_tips('请填写正确的手机号码', '#FF7700');
            return false;
        }
        $.post("<?php echo url('member/send_code'); ?>", {phone: user_phone_num, type: 'auth'}, function (result) {
            if (!result.status) {
                self.v_error_tips(result.error_desc, '#FF7700');
                return false;
            }
            $().wh_succ_notice('发送成功', function () {
                setInterval(check_time, 1000);
            });
        }, 'json');
    });
    $('#identity_zm_click').click(function () {
        $('#identity_zm').trigger('click');
    });
    $('#identity_fm_click').click(function () {
        $('#identity_fm').trigger('click');
    });
    $('#identity_sc_click').click(function () {
        $('#identity_sc').trigger('click');
    });
    $('#identity_zm').uploadPreview({
        Img: 'identity_zm_click',
        Width: 100,
        Height: 80,
        ImgType: ['gif', 'jpeg', 'jpg', 'bmp', 'png'],
        Callback: function () {

        }
    });
    $('#identity_fm').uploadPreview({
        Img: 'identity_fm_click',
        Width: 100,
        Height: 80,
        ImgType: ['gif', 'jpeg', 'jpg', 'bmp', 'png'],
        Callback: function () {

        }
    });
    $('#identity_sc').uploadPreview({
        Img: 'identity_sc_click',
        Width: 100,
        Height: 80,
        ImgType: ['gif', 'jpeg', 'jpg', 'bmp', 'png'],
        Callback: function () {

        }
    });
    $('#member_auth_btn').click(function () {
        $('#member_auth_form').v_validate('form',{},'#member_auth_btn');
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


<!--  暂时不用 手机验证 -->
<!---<script type="text/javascript" src="/static/index/home/js/phonecode.js"></script>-->
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
<script type="text/javascript" src="/static/index/home/js/downList.js"></script>
<script type="text/javascript" src="/static/index/home/js/sdmenu.js"></script>