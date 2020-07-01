<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/22
 * Time: 17:13
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\admin\controller;


use app\BaseController;
use app\common\bussiness\HyshopValue;
use app\common\lib\Show;
use app\common\lib\Status;
use think\Exception;

class SpecsValue extends BaseController
{
    public function index()
    {

    }

    /**
     * @return \think\response\Json
     */
    public function save()
    {
        $specs_id = $this->request->param('specs_id', 0, 'intval');
        $name = $this->request->param('name', '', 'trim');
        if (!$specs_id) {
            return Show::json_show(Status::Status_Error, "发生未知错误！请重试");
        }
        if (!$name || empty($name)) {
            return Show::json_show(Status::Status_Error, "请输入规格名称后回车");
        }
        $data = [
            "name" => $name,
            "specs_id" => $specs_id
        ];

        try {
            $res = (new HyshopValue())->add($data);
        } catch (\Exception $e) {
            return Show::json_show(Status::Status_Error, $e->getMessage());
        }
        if ($res) {
            return Show::json_show(Status::Status_Normal, "添加成功", ['id' => $res]);
        } else {
            return Show::json_show(Status::Status_Error, "添加失败");
        }

    }

    public function getBySpecsId()
    {
        $specs_id = $this->request->param('specs_id', 0, 'intval');
        if (!$specs_id || !is_numeric($specs_id)) {
            return Show::json_show(Status::Status_Error, "发生错误");
        }
        try {
            $specs = (new HyshopValue())->getBySpecsId($specs_id);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
        return Show::json_show(Status::Status_Normal, "ok", $specs);
    }
}