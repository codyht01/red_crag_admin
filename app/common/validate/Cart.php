<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2020/6/29
 * Time: 12:06
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\validate;


use think\Validate;

class Cart extends Validate
{
    /**
     * @var array
     */
    protected $rule = [
        "shop_id" => "require|integer",
        "openid" => "require",
        "num" => "require|integer",
        "price" => "require",
        "img" => "require|max:256",
        "title" => "require|max:256",
        "unit" => "require"
    ];
    /**
     * @var array
     */
    protected $message = [
        "shop_id.require" => "商品id是必须的！请联系管理员",
        "shop_id.integer" => "商品发生错误",
        "openid.require" => "系统发生错误！请联系管理员",
        "num.require" => "系统内部发生错误！请联系管理员",
        "num.integer" => "系统内部发生错误！请联系管理员",
        "price.require" => "系统内部发生错误！请联系管理员",
        "img.require" => "系统内部发生错误！请联系管理员",
        "img.max" => "系统内部发生错误！请联系管理员",
        "title.require" => "系统内部发生错误！请联系管理员",
        "title.max" => "系统内部发生错误！请联系管理员",
        "nuit.require" => "系统内部发生错误！请联系管理员",
    ];
    /**
     * @var array
     */
    protected $scene = [
        "addCart" => ['shop_id', 'openid', 'num', 'price', 'img', 'title', 'unit']
    ];
}