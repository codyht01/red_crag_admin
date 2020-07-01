<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/20
 * Time: 9:14
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\validate;


use think\Validate;

class Login extends Validate
{
    protected $rule = [
        "hyname" => "require|max:32",
        "hypwd" => "require",
        "hycode" => "require|captcha"
    ];
    protected $message = [
        "hyname.require" => "请输入用户名",
        "hyname.max" => "用户名太长了",
        "hypwd.require" => "请输入密码",
        "hycode.require" => "验证码输入为空",
        "hycode.captcha" => "验证码输入错误"
    ];
    protected $scene = [];
}