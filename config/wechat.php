<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/23
 * Time: 11:52
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

return [
    'app_id' => 'wxf88fb800bc976346',
    'secret' => '9d745e44147f12ca8e156567e04b0d76',

    // 下面为可选项
    // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
    'response_type' => 'array',

    'log' => [
        'level' => 'debug',
        'file' => runtime_path().'/wechat.log',
    ],
];