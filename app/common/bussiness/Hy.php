<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/20
 * Time: 15:06
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\bussiness;

use app\common\lib\Chr;
use app\common\lib\Status;
use \app\common\model\mysql\Hy as ModelO;
use think\Exception;
use think\facade\Cache;
use think\facade\Session;

class Hy
{
    protected $modelObj = '';

    public function __construct()
    {
        $this->modelObj = new ModelO();
    }

    public function getHyByHyName(array $data = [])
    {
        try {
            $res = $this->modelObj->getHyByHyname($data['hyname'], 'id,hyname,hypwd,hycode');
        } catch (\Exception $e) {
            throw new \Exception("发生错误");
        }
        if (!$res) {
            throw new Exception("用户信息不存在");
        }
        //判断密码是否正确
        $rpwd = md5($data['hypwd'] . $res['hycode']);
        if ($rpwd != $res['hypwd']) {
            throw new \Exception("用户名和密码不正确");
        }
        //$token = Chr::makeRand(128);

        //登录日志  todo 后期记录
        Session::set(Status::Session_Login_key, $res);
        return true;
    }
}