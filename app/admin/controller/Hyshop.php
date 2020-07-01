<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/22
 * Time: 12:01
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\admin\controller;


use app\BaseController;
use app\common\lib\Show;
use app\common\lib\Status;
use think\facade\View;

class Hyshop extends BaseController
{
    /**
     * @return string|\think\response\Json
     * @throws \Exception
     */
    public function index()
    {
        if ($this->request->isAjax()) {
            $limit = $this->request->param('limit', 10, 'intval');
            $page = $this->request->param('page', 1, 'intval');
            $data = (new \app\common\bussiness\Hyshop())->getListAllPage($limit, 'id,title,price,goods_unit,stock,keywords,market_price,create_time');

            return Show::lay_show($data->total(), $data->items());
        }
        return View::fetch();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function add()
    {
        $pic_url = config('qiniu');

        return View::fetch('',[
            'picimag_url'=>$pic_url['picimag_url']
        ]);
    }

    /**
     * @return \think\response\Json
     */
    public function save()
    {
        $param = $this->request->param();
        //halt($param);
        try {
            $res = (new \app\common\bussiness\Hyshop())->add($param);
        } catch (\Exception $e) {
            return Show::json_show(Status::Status_Normal, $e->getMessage());
        }
        if ($res) {
            return Show::json_show(Status::Status_Normal, "添加成功");
        } else {
            return Show::json_show(Status::Status_Error, '添加失败');
        }
    }
}