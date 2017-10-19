<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"F:\whsystem\public/../application/admin\view\tools\menucontent.html";i:1507169639;s:58:"F:\whsystem\public/../application/admin\view\tpl\head.html";i:1507301026;s:57:"F:\whsystem\public/../application/admin\view\tpl\msg.html";i:1506260401;}*/ ?>
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
<div class="div_from_aoto" style="margin: 0 auto;width: 100%;height:100%;overflow-y:scroll;overflow-x:hidden">
    <form action="<?php echo url('tools/set_content'); ?>" method="post" id="user_add_form">
        <div class="control-group">
            <label class="laber_from">内容标题(必填):</label>
            <div class="form-group">
                <input class="form-control" name="title" type=text placeholder="请输入内容标题" v-min="2" v-max="8">
                <P class=help-block></P></div>
        </div>
        <div class="control-group">
            <label class="laber_from">菜单名称(必填):</label>
            <div class="form-group">
                <select name="menu_id" id="select_menu_id" class="form-control">
                    <?php foreach($menu as $item): ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <P class=help-block></P></div>
        </div>
        <script id="container" name="content" type="text/plain"></script>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="form-group">
                <button type="button" onclick="window.location.reload()" class="btn btn-primary" style="width:120px;">
                    重置
                </button>
                <button type="button" id="sub_btn_form" class="btn btn-success" style="width:120px;">确认</button>
            </div>
        </div>
    </form>
    <table class="table table-hover">
        <tr>
            <th>内容标题</th>
            <th>菜单名称</th>
            <th>操作</th>
        </tr>
        <?php foreach($data as $row): ?>
        <tr>
            <td>
                <?php echo $row['title']; ?>
            </td>
            <td>
                <?php echo $row['menu_name']; ?>
            </td>
            <td>
                <a href="<?php echo url('tools/look_content',['id'=>$row['id']]); ?>"  type="button" class="glyphicon glyphicon-search"></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div>
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
<script type="text/javascript" src="/static/admin/uedit/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/uedit/ueditor.all.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('container');
    $('#sub_btn_form').click(function () {
        if (ue.getContent() == ''){
            $().wh_error_notice('请填写编辑器内容');
            return false;
        }
        $('#user_add_form').v_validate();
    });
</script>