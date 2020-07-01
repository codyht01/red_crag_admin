<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2020/6/29
 * Time: 16:07
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\validate;


use think\Validate;

class Order extends Validate
{
    protected $rule = [
        "title" => "require",
        "shop_id" => "require|integer",
        "price" => "require",
        "num" => "require|integer",
        "price_unit" => "require|integer",
        "img_url" => "require|max:256",
    ];
    protected $message = [
        "title.require" => "商品标题不能为空",
        "shop_id.require" => "商品id发生错误",
        "shop_id.integer" => "商品ID发生错误",
        "price.require" => "商品id发生错误",
        "num.require" => "商品内部发生错误",
        "num.integer" => "商品内部发生错误",
        "price_unit.require" => "商品内部发生错误",
        "price_unit.integer" => "商品内部发生错误",
        "img_url.integer" => "商品内部发生错误",
        "img_url.max" => "商品内部发生错误",

    ];
    protected $scene = [
        "create" => ['title', 'shop_id', 'price', 'num', 'price_unit', 'img_url']
    ];
}