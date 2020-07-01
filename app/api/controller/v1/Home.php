<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/23
 * Time: 11:43
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


use app\BaseController;
use app\common\bussiness\Hyshop;
use app\common\lib\Show;
use app\common\lib\Status;

class Home extends BaseController
{
    /**
     * @return \think\response\Json
     * @throws \Exception
     */
    public function getHotList()
    {
        $page = $this->request->param('page', 1, 'intval');

        if (!$page || !is_numeric($page)) {
            return Show::json_show(Status::MiniProgram_error, "分页发生错误");
        }
        $lists = (new Hyshop())->getHotList($page, 10);

        return Show::json_show(Status::MiniProgram_normal, "ok", $lists);

    }

    /**
     * @return \think\response\Json
     */
    public function bannerList()
    {
        $img = [
            [
                "img_url" => "http://hypic.i185.cn/banner.jpg"
            ],[
                "img_url" => "http://hypic.i185.cn/banner1.jpg"
            ], [
                "img_url" => "http://hypic.i185.cn/banner2.jpg"
            ]
        ];

        return Show::json_show(Status::MiniProgram_normal, "ok", $img);
    }
}