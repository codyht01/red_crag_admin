<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/24
 * Time: 9:37
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


use app\BaseController;
use app\common\bussiness\Hyshop;
use app\common\lib\Show;
use app\common\lib\Status;

class Details extends BaseController
{
    /**
     * 订单详情
     * @return \think\response\Json
     */
    public function getShopItem()
    {
        $id = $this->request->param('id', 0, 'intval');
        if (empty($id) || !$id) {
            return Show::json_show(Status::MiniProgram_error, "发生错误");
        }
        try {
            $shop = (new Hyshop())->getShopItem($id);
        } catch (\Exception $e) {
            return Show::json_show(Status::MiniProgram_error, "发生错误");
        }
        return Show::json_show(Status::MiniProgram_normal, 'Ok', $shop);

    }
}