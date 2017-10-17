<?php
//提现到账类型
function account_type_list(){
    return [
        '1'=>'支付宝',
        '2'=>'微信',
        '3'=>'银行卡'
    ];
}

function currency_list(){
    return [
        'AUDCAD'=>'澳加',
        'AUDCHF'=>'澳瑞',
        'AUDEUR'=>'澳欧',
        'AUDHKD'=>'澳港'
    ];
}