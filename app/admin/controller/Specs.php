<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/22
 * Time: 16:59
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\admin\controller;


use app\BaseController;
use think\facade\View;

class Specs extends BaseController
{
    public function dialog()
    {
        $specs = (new \app\common\bussiness\Specs())->getSpecsByTitleid();

        return View::fetch('', [
            "specs" => json_encode($specs)
        ]);
    }
}