<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/19
 * Time: 19:28
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\admin\controller;


use app\BaseController;
use app\common\bussiness\Hy;
use app\common\lib\Show;
use app\common\lib\Status;
use think\captcha\facade\Captcha;
use think\facade\Session;
use think\facade\View;

class Login extends BaseController
{
    public function index()
    {
        $getUser = Session::get(Status::Session_Login_key);
        if($getUser){
            return redirect('index/index');
        }
        return View::fetch();
    }

    public function verify()
    {
        return Captcha::create('login');
    }

    public function dologin()
    {
        $hyname = $this->request->param('hyname', '', 'trim');
        $hypwd = $this->request->param('hypwd', '', 'trim');
        $hycode = $this->request->param('hycode', '', 'trim');
        $data = [
            "hyname" => $hyname,
            'hypwd' => $hypwd,
            'hycode' => $hycode
        ];
        $validate = new \app\common\validate\Login();
        if (!$validate->check($data)) {
            return Show::json_show(Status::Sql_error, $validate->getError());
        }
        //进行登录操作
        try {
            $res = (new Hy())->getHyByHyName($data);
        } catch (\Exception $e) {
            return Show::json_show(Status::Status_Error, $e->getMessage());
        }
        if ($res) {
            return Show::json_show(Status::Status_Normal, "登录成功");
        } else {
            return Show::json_show(Status::Status_Error, "登录失败");
        }

    }
}