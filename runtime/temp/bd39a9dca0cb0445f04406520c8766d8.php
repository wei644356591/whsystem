<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"G:\whsystem\public/../application/admin\view\admin\login.html";i:1507172592;s:58:"G:\whsystem\public/../application/admin\view\tpl\head.html";i:1507301026;s:57:"G:\whsystem\public/../application/admin\view\tpl\msg.html";i:1506260401;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>外汇后台</title>
    <link rel="stylesheet" href="/static/admin/css/index.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/static/admin/font/iconfont.ttf?r=asd">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
    <script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/tendina.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/common.js"></script>
    <script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/imageUploadPreview.js"></script>
    <script type="text/javascript" src="/static/admin/js/base.js"></script>
    <?php if(!empty($script_src)): foreach($script_src as $script): ?>
    <script type="text/javascript" src="<?php echo $script; ?>"></script>
    <?php endforeach; endif; if(!empty($script_cdn)): foreach($script_cdn as $script): ?>
    <script src="<?php echo $script; ?>"></script>
    <?php endforeach; endif; ?>
</head>
<body>
<link href="/static/admin/css/login.css" rel="stylesheet" type="text/css"/>
<body style="background:#00205D; ">
<div class="logintop">
</div>
<div class="loginbox">
    <form action="<?php echo url('admin/login'); ?>" method="post" name="form1" id="user_login_form">
        <ul class="logincon">
            <li class="title">外汇系统后台登陆</li>
            <li>
                <i class="username"></i>
                <input type="text" title="用户名" name="name" value="" class="inputname"
                       onfocus="this.className='inputname act'" onblur="this.className='inputname'" v-data="require">
            </li>
            <li>
                <i class="password"></i>
                <input type="password" title="密码" name="password" value="" class="inputpwd"
                       onfocus="this.className='inputpwd act'" onblur="this.className='inputpwd'" v-data="require">
            </li>
            <li>
                <i class="password"></i>
                <input type="text" title="验证码" name="captcha" style="width:150px;float:left;margin-left:49px;" value="" class="inputpwd" onfocus="this.className='inputpwd act'" onblur="this.className='inputpwd'" v-data="require">
                <img id="captcha_img" src="<?php echo captcha_src(); ?>">
            </li>
            <li>
                <input type="button" title="登录" value="登 录" class="loginbtn"/>
                <input type="reset" title="重置" value="重 置" class="loginbtn2"/>
            </li>
        </ul>
    </form>
    <div class="loginfoot">
        <p> copyright&copy;2015-2020 外汇 </p>
    </div>
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
<script type="text/javascript">
    $('#captcha_img').click(function () {
        $('#captcha_img').attr('src', "<?php echo captcha_src(); ?>");
    });
    $('.loginbtn').click(function () {
        $('#user_login_form').v_validate();
    });
</script>
</body>
</html>