<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"G:\whsystem\public/../application/admin\view\jymanage\cztx.html";i:1507017586;s:58:"G:\whsystem\public/../application/admin\view\tpl\head.html";i:1507171628;s:57:"G:\whsystem\public/../application/admin\view\tpl\msg.html";i:1506260401;}*/ ?>
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
    <script type="text/javascript" src="/static/admin/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="/static/admin/js/bootstrap-chinese-region.js"></script>
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
    .dtx {
        color: green;
        font-size: 21px;
        margin-left: 1em;
        cursor: pointer;
    }

    .dcz {
        color: #EFA63E;
        font-size: 21px;
        cursor: pointer;
    }
</style>
<span id="look_dcz" class="glyphicon glyphicon-question-sign dcz">查看待充值</span>
<span id="look_dtx" class="glyphicon glyphicon-question-sign dtx">查看待提现</span>
<form class="form-inline" action="<?php echo url('jymanage/cztx_action'); ?>" method="post" id="sub_search_form" role="form"
      style="margin-top: 1em">
    <div class="form-group">
        <label class="sr-only" for="name">名称</label>
        <input type="text" name="member_username" class="form-control" id="name" placeholder="请输入昵称" v-data="require">
    </div>
    <button type="button" class="btn btn-default sub_btn_search">搜索</button>
</form>
<table class="table table-hover">
    <tr>
        <th>用户名</th>
        <th>金额</th>
        <th>申请时间</th>
        <th>收款帐号</th>
        <th>收款方式</th>
        <th>类型</th>
        <th>操作</th>
    </tr>
    <?php foreach($data as $row): ?>
    <tr>
        <td>
            <?php echo $row['member_username']; ?>
        </td>
        <td>
            ￥<?php echo $row['money']; ?>元
        </td>
        <td>
            <?php echo date("Y-m-d H:i:s",$row['pay_time']); ?>
        </td>
        <td>
            <?php echo $row['status']==1?'-' : $row['tx_account']; ?>
        </td>
        <td>
            <?php echo $row['status']==1?'-' : $sk_type[$row['account_type']]; ?>
        </td>
        <td>
            <?php if($row['status'] == 1): ?>
            <label>充值</label>
            <?php else: ?>
            <label>提现</label>
            <?php endif; ?>
        </td>
        <td>
            <?php if($row['ct_status'] == 1): if($row['status'] == 1): ?>
            <button type="button" cztx_id="<?php echo $row['id']; ?>" money="<?php echo $row['money']; ?>" class="btn btn-warning cz_btn">充值</button>
            <?php else: ?>
            <button type="button" cztx_id="<?php echo $row['id']; ?>" money="<?php echo $row['money']; ?>" class="btn btn-success tx_btn">提现</button>
            <?php endif; else: if($row['status'] == 1): ?>
            <button type="button" class="btn btn-warning disabled">充值</button>
            <?php else: ?>
            <button type="button" class="btn btn-success disabled">提现</button>
            <?php endif; endif; ?>

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
    $('.cz_btn').click(function () {
        var money = $(this).attr('money');
        var cztx_id = $(this).attr('cztx_id');
        if (!cztx_id) {
            return false;
        }
        if (!confirm('请查看是否成功收到金额￥' + money + '元')) {
            return false;
        }
        $.post("<?php echo url('jymanage/cz_action'); ?>", {cztx_id: cztx_id}, function (r) {
            if (!r.status) {
                $().wh_error_notice(r.error_desc);
                return false;
            }
            $().wh_succ_notice(r.succ_msg,function () {
                window.location.href = "<?php echo url('jymanage/cztx_action'); ?>";
            });
        },'json');
    });

    $('.tx_btn').click(function () {
        var money = $(this).attr('money');
        var cztx_id = $(this).attr('cztx_id');
        if (!confirm('请确定是否成功转款￥' + money + '元')) {
            return false;
        }
        $.post("<?php echo url('jymanage/cz_action'); ?>", {cztx_id: cztx_id}, function (r) {
            if (!r.status) {
                $().wh_error_notice(r.error_desc);
                return false;
            }
            $().wh_succ_notice(r.succ_msg,function () {
                window.location.href = "<?php echo url('jymanage/cztx_action'); ?>";
            });
        },'json');
    });
    $('.sub_btn_search').click(function () {
        $('#sub_search_form').v_validate();
    });
    $('#look_dcz').click(function () {
        window.location.href = "<?php echo url('jymanage/cztx_action',['status'=>1]); ?>";
    });
    $('#look_dtx').click(function () {
        window.location.href = "<?php echo url('jymanage/cztx_action',['status'=>2]); ?>";
    });
</script>