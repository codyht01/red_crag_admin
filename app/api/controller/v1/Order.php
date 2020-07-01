<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2020/6/27
 * Time: 15:29
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


use app\BaseController;
use app\common\bussiness\HyshopCart;
use app\common\bussiness\HyshopOrder;
use app\common\lib\Chr;
use app\common\lib\Show;
use app\common\lib\Status;
use app\common\validate\Cart;

class Order extends BaseController
{
    /**
     * 添加购物车
     * @return \think\response\Json
     * @throws \Exception
     */
    public function addCart()
    {
        $data = $this->request->param();
        $Cart = new Cart();
        if (!$Cart->scene('addCart')->check($data)) {
            return Show::json_show(Status::MiniProgram_error, $Cart->getError());
        }
        $result = (new HyshopCart())->add($data);
        return Show::json_show(Status::MiniProgram_normal, "添加成功");
    }

    /**
     * @return \think\response\Json
     */
    public function cartList()
    {
        $opneid = $this->request->param('openid', '', 'trim');
        try {
            $res = (new HyshopCart())->getHyshopCartByOpenid($opneid);
        } catch (\Exception $e) {
            return Show::json_show(Status::MiniProgram_error, $e->getMessage());
        }
        return Show::json_show(Status::MiniProgram_normal, "ok", $res);
    }

    /**
     * 修改
     * @return \think\response\Json
     */
    public function editCart()
    {
        $data = $this->request->param();

        try {
            $res = (new HyshopCart())->updateCart($data['list']);
        } catch (\Exception $e) {
            return Show::json_show(Status::MiniProgram_error, $e->getMessage());
        }
        return Show::json_show(Status::MiniProgram_normal, "ok");
    }

    /**
     * @return \think\response\Json
     */
    public function delItemFun()
    {
        $id = $this->request->param('id', 0, 'intval');
        if (!$id || empty($id)) {
            return Show::json_show(Status::MiniProgram_error, "发生错误");
        }
        try {
            $res = (new HyshopCart())->delItemFun($id);
        } catch (\Exception $e) {
            return Show::json_show(Status::MiniProgram_error, $e->getMessage());
        }
        if ($res) {
            return Show::json_show(Status::MiniProgram_normal, "ok");
        } else {
            return Show::json_show(Status::MiniProgram_error, "发生错误");
        }
    }

    public function setOrder()
    {

        $data = $this->request->param();
        $order = new \app\common\validate\Order();
        if ($order->scene('create')->check($data)) {
            return Show::json_show(Status::MiniProgram_error, $order->getError());
        }
        $data['order_id'] = Chr::car_order();
        try{
            $order = (new HyshopOrder())->getHyshopOrderByCreate($data);
        }catch (\Exception $e){
            return Show::json_show(Status::MiniProgram_error, "发生错误");
        }
        halt($order);
    }
}