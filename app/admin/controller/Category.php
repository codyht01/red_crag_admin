<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/22
 * Time: 16:03
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\admin\controller;


use app\BaseController;
use app\common\lib\Show;
use app\common\lib\Status;
use think\facade\View;

class Category extends BaseController
{
    public function index(){
        return View::fetch();
    }
    public function dialog()
    {
        return View::fetch();
    }
    public function add() {
        return View::fetch();
    }

    /**
     * @return \think\response\Json
     */
    public function getByPid()
    {
        $pid = input("param.pid", 0, "intval");
        $categorys = (new \app\common\bussiness\Category())->getNormalByPid($pid);
        return Show::json_show(Status::Status_Normal, "ok", $categorys);
    }
}