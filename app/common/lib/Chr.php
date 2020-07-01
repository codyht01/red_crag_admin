<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/20
 * Time: 20:08
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\lib;


class Chr
{
    /**
     * 生成随机字符串
     * @param int $num
     * @return string
     */
    public static function makeRand($num = 8)
    {
        $strand = time() . (double)microtime() * 1000000;
        if (strlen($strand) < $num) {
            $strand = md5(str_pad($strand, $num, "0", STR_PAD_LEFT) . time());
        }
        if ($num > 30) {
            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str_rand = '';
            for ($i = $num; $i > 0; $i--) {
                $str_rand .= $char[mt_rand(0, strlen($char) - 1)];
            }
            $string = $strand . $str_rand;
        } else {
            $string = $strand;
        }
        return mb_substr($string, 0, $num);
    }
    public static function car_order(){
        @date_default_timezone_set("PRC");
        $order_id_main = date('YmdHis') . rand(10000000, 99999999);
        //订单号码主体长度
        $order_id_len = strlen($order_id_main);
        $order_id_sum = 0;
        for ($i = 0; $i < $order_id_len; $i++) {
            $order_id_sum += (int)(substr($order_id_main, $i, 1));
        }
        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        $osn = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100, 2, '0', STR_PAD_LEFT); //生成唯一订单号
        return $osn;
    }
}