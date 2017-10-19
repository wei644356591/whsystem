<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"G:\whsystem\public/../application/admin\view\member\auth.html";i:1507001760;s:58:"G:\whsystem\public/../application/admin\view\tpl\head.html";i:1507301026;s:57:"G:\whsystem\public/../application/admin\view\tpl\msg.html";i:1506260401;}*/ ?>
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
<style type="text/css">
    .ytg {
        color: green;
        font-size: 21px;
        margin-left: 1em;
    }

    .wtg {
        color: indianred;
        font-size: 21px;
        margin-left: 1em;
    }

    .drz {
        color: deepskyblue;
        font-size: 21px;
    }
    .shenhe{
        cursor: pointer;
    }
</style>
<span id="sh-drz" class="glyphicon glyphicon-question-sign drz shenhe">查看待认证</span>
<span id="sh-wtg" class="glyphicon glyphicon-remove-sign wtg shenhe">查看未通过</span>
<span id="sh-ytg" class="glyphicon glyphicon-ok-sign ytg shenhe">查看已通过</span>
<form class="form-inline" action="<?php echo url('member/auth'); ?>" method="post" id="sub_search_form" role="form" style="margin-top: 1em">
    <div class="form-group">
        <label class="sr-only" for="name">名称</label>
        <input type="text" name="member_user" class="form-control" id="name" placeholder="请输入昵称" v-data="require">
    </div>
    <button type="button" class="btn btn-default sub_btn_search">搜索</button>
</form>
<table class="table table-hover">
    <tr>
        <th>用户名</th>
        <th>提交认证时间</th>
        <th>身份证正面</th>
        <th>身份证反面</th>
        <th>手持身份证</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    <?php foreach($data as $row): ?>
    <tr>
        <td>
            <input type="hidden" name="auth_id" value="<?php echo $row['id']; ?>">
            <?php echo $row['member_user']; ?>
        </td>
        <td>
            <?php echo date("Y-m-d H:i:s",$row['auth_time']); ?>
        </td>
        <td id="identity_zm_td">
            <img id="identity_zm" src="<?php echo $row['identity_zm']; ?>" height="50" class="shenhe">
        </td>
        <td id="identity_fm_td">
            <img id="identity_fm" src="<?php echo $row['identity_fm']; ?>" height="50" class="shenhe">
        </td>
        <td id="identity_sc_td">
            <img id="identity_sc" src="<?php echo $row['identity_sc']; ?>" height="50" class="shenhe">
        </td>
        <td>
            <span class="glyphicon glyphicon-<?php echo $status_list[$row['id']]; ?>"></span>
        </td>
        <td>
            <?php if($row['status'] == 1): ?>
            <a href="#" class="btn btn-success shenhe-tg">审核通过</a>
            <a href="#" class="btn btn-danger shenhe-wtg">审核不通过</a>
            <?php elseif($row['status'] == 2): ?>
            <a href="#" class="btn btn-success disabled">已通过</a>
            <?php else: ?>
            <a href="#" class="btn btn-danger disabled">未通过</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<div>
    <?php echo $data->render(); ?>
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
    $('.shenhe-tg').click(function () {
        if (!confirm('是否确定审核为通过')){
            return false;
        }
        var id = $('input[name="auth_id"]').val();
        if (!id){
            return false;
        }
        $.get("<?php echo url('member/do_auth'); ?>",{status:2,id:id},function (result) {
            if (!result.status){
                $().wh_error_notice(result.error_desc);
                return false;
            }
            $().wh_succ_notice(result.succ_desc,function () {
                window.location.reload();
            });

        },'json');
    });
    $('.shenhe-wtg').click(function () {
        if (!confirm('是否确定审核为未通过')){
            return false;
        }
        var id = $('input[name="auth_id"]').val();
        if (!id){
            return false;
        }
        $.get("<?php echo url('member/do_auth'); ?>",{status:3,id:id},function (result) {
            if (!result.status){
                $().wh_error_notice(result.error_desc);
                return false;
            }
            $().wh_succ_notice(result.succ_desc,function () {
                window.location.reload();
            });

        },'json');
    });
    $('#identity_zm').click(function () {
        layer.photos({
            photos: '#identity_zm_td',
            closeBtn: 1,
            shade: 0,
            isOutAnim: false,
            anim: 5,
            cancel: function (index, layero) {
                layer.close(index);
            }
        });
    });
    $('#identity_fm').click(function () {
        layer.photos({
            photos: '#identity_fm_td',
            closeBtn: 1,
            shade: 0,
            isOutAnim: false,
            anim: 5,
            cancel: function (index, layero) {
                layer.close(index);
            }
        });
    });
    $('#identity_sc').click(function () {
        layer.photos({
            photos: '#identity_sc_td',
            closeBtn: 1,
            shade: 0,
            isOutAnim: false,
            anim: 5,
            cancel: function (index, layero) {
                layer.close(index);
            }
        });
    });
    $('#sh-drz').click(function () {
        window.location.href = '/admin/member/auth/status/1';
    });
    $('#sh-ytg').click(function () {
        window.location.href = '/admin/member/auth/status/2';
    });
    $('#sh-wtg').click(function () {
        window.location.href = '/admin/member/auth/status/3';
    });
    $('.sub_btn_search').click(function () {
        $('#sub_search_form').v_validate();
    });
</script>