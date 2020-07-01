<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/23
 * Time: 11:52
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


use app\BaseController;
use app\common\lib\Show;
use app\common\lib\Status;
use EasyWeChat\Factory;
use think\App;

class Wx extends BaseController
{
    protected $miniProgram = null;

    public function __construct(App $app)
    {
        $config = config('wechat');
        $this->miniProgram = Factory::miniProgram($config);
        parent::__construct($app);
    }

    public function getUser()
    {
        $code = $this->request->param('code', '', 'trim');
        $session = $this->miniProgram->auth->session($code);
        $session['mobile'] = "15213501376";
        return Show::json_show(Status::MiniProgram_normal,"ok",$session);
    }
}