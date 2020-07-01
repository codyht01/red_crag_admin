<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/23
 * Time: 11:25
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


use app\BaseController;

class Index extends BaseController
{
    public function index(){
        halt("home-v1");
    }
}