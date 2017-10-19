<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"G:\whsystem\public/../application/admin\view\admin\index.html";i:1507305185;s:58:"G:\whsystem\public/../application/admin\view\tpl\head.html";i:1507301026;s:57:"G:\whsystem\public/../application/admin\view\tpl\top.html";i:1507301200;s:60:"G:\whsystem\public/../application/admin\view\tpl\bottom.html";i:1506267694;}*/ ?>
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
<!--顶部-->
<div class="layout_top_header">
    <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">外汇后台管理</h1></span></div>
    <div id="ad_setting" class="ad_setting">
        <a class="ad_setting_a" href="javascript:; ">
            <span><?php if(!empty($online_user['name'])) echo $online_user['name']; ?></span>
        </a>
        <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
            <li class="ad_setting_ul_li"><a href="javascript:;">
            <li class="ad_setting_ul_li">
                <a href="<?php echo url('admin/logout'); ?>">
                    <span class="font-bold">退出</span> </a></li>
        </ul>
    </div>
</div>
<!--菜单-->
<div class="layout_left_menu">
    <ul id="menu">
        <li class="childUlLi">
            <a href="main.html" target="menuFrame"><i class="glyphicon glyphicon-star"></i>后台用户管理</a>
            <ul>
                <li><a href="<?php echo url('user/add'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>后台用户添加</a></li>
                <li><a href="<?php echo url('user/lists'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>后台用户列表</a></li>
            </ul>
        </li>
        <li class="childUlLi">
            <a href="member.html" target="menuFrame"> <i class="glyphicon glyphicon-user"></i>前台用户管理</a>
            <ul>
                <li><a href="<?php echo url('member/auth'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>实名认证</a>
                </li>
                <li><a href="<?php echo url('member/lists'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>用户列表</a>
                </li>
            </ul>
        </li>
        <li class="childUlLi">
            <a href="user.html" target="menuFrame"> <i class="glyphicon glyphicon-tint"></i>金融管理</a>
            <ul>
                <li><a href="<?php echo url('information/set_trend'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>数据设置</a></li>
                <li><a href="<?php echo url('information/get_info'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>数据采集</a></li>
            </ul>
        </li>
        <li class="childUlLi">
            <a href="role.html" target="menuFrame"> <i class="glyphicon glyphicon-usd"></i>资金管理</a>
            <ul>
                <li><a href="<?php echo url('fund/charge'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>充值设置</a></li>
                <li><a href="<?php echo url('fund/consume'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>提现设置</a></li>
            </ul>
        </li>
        <li class="childUlLi">
            <a href="#"> <i class="glyphicon glyphicon-ruble"></i>交易管理</a>
            <ul>
                <li><a href="<?php echo url('jymanage/cztx_action'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>充值提现</a></li>
                <li><a href="<?php echo url('jymanage/jy_action'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>交易记录</a>
                </li>
            </ul>
        </li>
        <li class="childUlLi">
            <a href="#"> <i class="glyphicon glyphicon-wrench"></i>系统管理</a>
            <ul>
                <li><a href="<?php echo url('tools/set_menu'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>设置菜单</a></li>
                <li><a href="<?php echo url('tools/set_content'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>设置内容</a></li>
                <li><a href="<?php echo url('tools/set_bigimg'); ?>" target="menuFrame"><i class="glyphicon glyphicon-share-alt"></i>设置图片</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--菜单-->
<div id="layout_right_content" class="layout_right_content">

    <div class="route_bg">
        <a href="#">主页</a> >
        <a href="#">操作中心</a>
    </div>
    <div class="mian_content">
        <div id="page_content">
            <iframe id="menuFrame" name="menuFrame" src="" style="overflow:visible;" scrolling="yes" frameborder="no" width="100%" height="100%">
            </iframe>
        </div>
    </div>
</div>
</body>
</html>