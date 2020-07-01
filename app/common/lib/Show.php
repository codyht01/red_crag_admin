<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/20
 * Time: 9:29
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\lib;


class Show
{
    /**
     * @param int $code
     * @param string $msg
     * @param array $data
     * @return \think\response\Json
     */
    public static function json_show(int $code = 0, string $msg = '', array $data = [])
    {
        $data = [
            "code" => $code,
            "msg" => $msg,
            "data" => $data
        ];
        return json($data);
    }

    /**
     * @param int $count
     * @param array $data
     * @param int $code
     * @param string $msg
     * @return \think\response\Json
     */
    public static function lay_show(int $count = 0, array $data, int $code = 0, string $msg = '')
    {
        $data = [
            "code" => $code,
            "msg" => $msg,
            "count" => $count,
            "data" => $data
        ];
        return json($data);
    }
}