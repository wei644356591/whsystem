<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"F:\whsystem\public/../application/admin\view\information\set.html";i:1507169574;s:58:"F:\whsystem\public/../application/admin\view\tpl\head.html";i:1507301026;s:57:"F:\whsystem\public/../application/admin\view\tpl\msg.html";i:1506260401;}*/ ?>
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
<div class="div_from_aoto" style="margin: 0 auto;width: 100%;height: 100%;overflow-y:scroll;">
    <form action="<?php echo url('information/set_trend'); ?>" method="post" id="user_add_form1">
        <div class="control-group">
            <label class="laber_from">采集的外汇种类(提示：尽量不要超过9个，采集数据时间较长):</label>
            <div class="form-group">
                <table class="table table-hover">
                        <?php foreach($data as $row): ?>
                    <tr>
                        <?php foreach($row as $key=>$item): ?>
                        <td><input type="checkbox" class="check_sel_input1" name="currency[]" <?php echo $item[1]; ?> value="<?php echo $key; ?>"><?php echo $item[0]; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <P class=help-block></P></div>
        </div>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="form-group">
                <button type="button" onclick="window.location.reload()" class="btn btn-primary" style="width:120px;">
                    重置
                </button>
                <button type="button" id="sub_btn_form1" class="btn btn-success" style="width:120px;">选择种类</button>
            </div>
        </div>
    </form>
    <?php if(!empty($set_data)): ?>
    <form action="<?php echo url('information/adjust'); ?>" method="post" id="user_add_form2">
        <div class="control-group">
            <label class="laber_from">需要设置金额波动的种类(如果要设置波动，请至少选择一个种类):</label>
            <div class="form-group">
                <table class="table table-hover">
                    <?php foreach($set_data as $row): ?>
                    <tr>
                        <?php foreach($row as $key=>$item): ?>
                        <td><input type="checkbox" class="check_sel_input2" name="currency[]" value="<?php echo $key; ?>"><?php echo $item; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <P class=help-block></P></div>
        </div>
        <div class="control-group">
            <label class="laber_from">设置波动金额(提示：设置波动金额后，开盘的数据将再+或-上你设置的金额):</label>
            <div class="form-group">
                <select name="compute">
                    <option value="1">+</option>
                    <option value="2">-</option>
                </select>
                <input name="money" id="set_money" type=text placeholder="设置波动金额">
                <P class=help-block></P></div>
        </div>

        <div class="control-group">
            <label class="laber_from"></label>
            <div class="form-group">
                <button type="button" onclick="window.location.reload()" class="btn btn-primary" style="width:120px;">
                    重置
                </button>
                <button type="button" id="sub_btn_form2" class="btn btn-success" style="width:120px;">确认</button>
            </div>
        </div>
    </form>
    <table class="table table-hover">
        <tr>
        <th>已设置波动的外汇</th>
        <th>计算方式</th>
        <th>已设置波动金额</th>
        </tr>
        <?php foreach($adjust_data as $item): ?>
        <tr>
            <td><?php echo $item['currency']; ?></td>
            <td><?php echo $item['compute']==1?'加' : '减'; ?></td>
            <td><?php echo $item['money']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
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
    $('#sub_btn_form1').click(function () {
        if ($('.check_sel_input1:checked').length==0){
            $().wh_error_notice('请至少选择一个外汇种类');
            return false;
        }
        $('#user_add_form1').submit();
    });
    $('#sub_btn_form2').click(function () {
        if ($('.check_sel_input2:checked').length==0){
            $().wh_error_notice('在采集的外汇种类当中至少选择一个');
            return false;
        }
        var set_money = $('#set_money').val();
        if (!set_money){
            $('#set_money').v_error_tips('请填写金额');
            return false;
        }
        $('#user_add_form2').submit();
    });
</script>
