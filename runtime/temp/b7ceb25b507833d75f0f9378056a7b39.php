<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"G:\whsystem\public/../application/admin\view\member\lists.html";i:1506267548;s:58:"G:\whsystem\public/../application/admin\view\tpl\head.html";i:1507301026;s:57:"G:\whsystem\public/../application/admin\view\tpl\msg.html";i:1506260401;}*/ ?>
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
    .green{
        color: green;
    }
    .red{
        color: indianred;
    }
</style>
<table class="table table-hover">
    <tr>
        <th>用户名</th>
        <th>注册时间</th>
        <th>登陆时间</th>
        <th>剩余金额</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    <?php foreach($data as $row): ?>
    <tr>
        <td>
            <?php echo $row['name']; ?>
        </td>
        <td>
            <?php echo date("Y-m-d H:i:s",$row['reg_time']); ?>
        </td>
        <td>
            <?php echo date("Y-m-d H:i:s",$row['log_time']); ?>
        </td>
        <td>
            ￥<?php echo $row['money']; ?>
        </td>
        <td>
            <span class="glyphicon glyphicon-<?php echo $row['status']==1?'ok green':'remove red'; ?>"></span>
        </td>
        <td>
            <a href="<?php echo url('member/edit',['id'=>$row['id']]); ?>" onclick="var msg = '<?php echo $row['status']==2?'启用': '禁用'; ?>';if (!confirm('是否'+msg+'该用户'))return false;" type="button" class="glyphicon glyphicon-pencil"></a>
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
