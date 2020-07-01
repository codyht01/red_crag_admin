<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/19
 * Time: 19:14
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\admin\controller;


use app\BaseController;
use think\facade\View;

class Index extends BaseController
{
    public function index(){
        return View::fetch();
    }
    public function welcome(){
        halt("123");
    }
}