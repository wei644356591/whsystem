/**
 * 自动验证插件
 * @type {number}
 */
var public_min_len = false;
var public_max_len = false;
var public_msg_color = '#fa4655'; //弹出颜色
var alert_msg_position = 'left' //弹出位置  down left right
var alert_msg_val = 0;

switch (alert_msg_position) {
    case 'down':
        alert_msg_val = 1;
        break;
    case 'right':
        alert_msg_val = 2;
        break;
    case 'left':
        alert_msg_val = 4;
        break;
    default:
        alert_msg_val = 1;
        break;
}

$.fn.wh_succ_notice = function (msg, callback) {
    layer.msg(msg, {icon: 1}, callback);
}

$.fn.wh_error_notice = function (msg) {
    layer.msg(msg, {icon: 5});
}

$.fn.v_error_tips = function (msg, color) {
    color = !color ? public_msg_color : color;
    layer.tips(msg, $(this), {tips: [alert_msg_val, color]});
}
$.fn.str_format = function (num) {
    if (!num) {
        num = 6;
    }
    var content = $.trim($(this).text());
    if (content.length > num) {
        $(this).text(content.substr(0, num) + '...');
    }
}
/**
 * 验证器使用说明
 * 1.需要在input表单中加入
 * v-data="require"验证输入是否合法,email：邮箱，phone：电话,identity:身份证
 * v-min="3" 验证最小输入长度
 * v-max="4" 验证最大输入长度
 * v-mag='错误提示语' 验证不通过时的提示语
 * 2.需要在回调中出发该验证器
 * $('btn').click(function(){
 *      $('form').v_validate();
 * });
 * @returns {boolean}
 */

$.fn.v_validate = function (method, callback, selector) {
    var flag = true;
    $(this).find('input').each(function (i, v) {
        var self = $(v);
        if (self.attr('type') == 'hidden') {
            return true;
        }
        var inputval = $.trim(self.val());
        var check_data = self.attr('v-data');
        var notice = self.attr('v-msg');
        var min_len = self.attr('v-min');
        var max_len = self.attr('v-max');
        min_len = !min_len ? public_min_len : min_len;
        max_len = !max_len ? public_max_len : max_len;
        if (selector) {
            var v_jquery_selector = $(selector);
        } else {
            var v_jquery_selector = self;
        }
        if (min_len) {
            if (inputval.length < min_len) {
                notice = !notice ? '输入长度不能小于' + public_min_len : notice;
                v_jquery_selector.v_error_tips(notice);
                flag = false;
                return false;
            }
        }
        if (max_len) {
            if (inputval.length > max_len) {
                notice = !notice ? '输入长度不能大于' + public_max_len : notice;
                v_jquery_selector.v_error_tips(notice);
                flag = false;
                return false;
            }
        }
        switch (check_data) {
            case 'require':
                notice = !notice ? '此项为必填' : notice;
                if (!inputval) {
                    v_jquery_selector.v_error_tips(notice);
                    flag = false;
                }
                break;
            case 'email':
                notice = !notice ? '请输入正确的邮箱' : notice;
                if (!(/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/.test(inputval))) {
                    v_jquery_selector.v_error_tips(notice);
                    flag = false;
                }
                break;
            case 'phone':
                notice = !notice ? '请输入正确的手机号码' : notice;
                if (!(/^1[34578]\d{9}$/.test(inputval))) {
                    v_jquery_selector.v_error_tips(notice);
                    flag = false;
                }
                break;
            case 'identity':
                notice = !notice ? '请输入正确的身份证号码' : notice;
                if (!(/^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/.test(inputval))) {
                    v_jquery_selector.v_error_tips(notice);
                    flag = false;
                }
                break;
            case 'number':
                notice = !notice ? '只能填写数字' : notice;
                if (isNaN(inputval) || !inputval) {
                    v_jquery_selector.v_error_tips(notice);
                    flag = false;
                }
                break;
            default:
                break;
        }
        if (!flag) {
            return false;
        }
    });
    if (!flag) {
        return false;
    }
    if (!method) {
        method = 'form';
    }
    if (method == 'form') {
        $(this).submit();
        return false;
    }
    if (method == 'ajax') {
        if (typeof(callback) == 'function') {
            callback();
        }
    }

}