<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"F:\whsystem\public/../application/admin\view\tools\bigimg.html";i:1507304165;s:58:"F:\whsystem\public/../application/admin\view\tpl\head.html";i:1507301026;s:57:"F:\whsystem\public/../application/admin\view\tpl\msg.html";i:1506260401;}*/ ?>
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
<div class="div_from_aoto" style="text-align:center;width: 100%;height: 100%;overflow-y:scroll;">
    <form action="<?php echo url('tools/set_bigimg'); ?>" method="post" id="user_add_form" enctype="multipart/form-data">
        <div class="control-group">
            <label class="laber_from">上传logo(必填):</label>
            <div class="form-group">
                <input name="logo" id="logo_img" style="margin-left:32%;" type="file" placeholder="请上传图片" v-data="require">
                <P class=help-block></P></div>
            <img src="<?php echo $data['logo']; ?>" id="img_0" width="200" height="200">
        </div>
        <div class="control-group">
            <label class="laber_from">上传轮播大图1(选填):</label>
            <div class="form-group">
                <input name="big_img1" id="big_img_1" style="margin-left:32%;" type="file" placeholder="请上传图片" v-data="require">
                <P class=help-block></P></div>
            <img src="<?php echo $data['big_img1']; ?>" id="img_1" width="400" height="200">
        </div>
        <div class="control-group">
            <label class="laber_from">上传轮播大图2(选填):</label>
            <div class="form-group">
                <input name="big_img2" id="big_img_2" style="margin-left:32%;" type="file" placeholder="请输入密码" v-data="require">
                <P class=help-block></P></div>
            <img src="<?php echo $data['big_img2']; ?>" id="img_2" width="400" height="200">
        </div>
        <div class="control-group">
            <label class="laber_from">上传轮播大图3(选填):</label>
            <div class="form-group">
                <input name="big_img3" id="big_img_3" style="margin-left:32%;" type="file" placeholder="请输入密码" v-data="require">
                <P class=help-block></P></div>
            <img src="<?php echo $data['big_img3']; ?>" id="img_3" width="400" height="200">
        </div>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="form-group">
                <button type="button" onclick="window.location.reload()" class="btn btn-primary" style="width:120px;">重置</button>
                <button type="button" id="sub_btn_form" class="btn btn-success" style="width:120px;">确认</button>
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
<script type="text/javascript">
    $('#logo_img').uploadPreview({
        Img: 'img_0',
        ImgType: ['gif', 'jpeg', 'jpg', 'bmp', 'png'],
        Callback: function () {

        }
    });
    $('#big_img_1').uploadPreview({
        Img: 'img_1',
        ImgType: ['gif', 'jpeg', 'jpg', 'bmp', 'png'],
        Callback: function () {

        }
    });
    $('#big_img_2').uploadPreview({
        Img: 'img_2',
        ImgType: ['gif', 'jpeg', 'jpg', 'bmp', 'png'],
        Callback: function () {

        }
    });
    $('#big_img_3').uploadPreview({
        Img: 'img_3',
        ImgType: ['gif', 'jpeg', 'jpg', 'bmp', 'png'],
        Callback: function () {

        }
    });
    $('#sub_btn_form').click(function () {
        $('#user_add_form').submit();
    });
</script>