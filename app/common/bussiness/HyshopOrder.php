<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2020/6/29
 * Time: 17:26
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\bussiness;


use app\common\model\mysql\HyshopOrder as ModelO;

class HyshopOrder
{
    protected $modelObj = '';

    public function __construct()
    {
        $this->modelObj = new ModelO();
    }

    public function getHyshopOrderByCreate(array $data = [])
    {
        if (empty($data)) {
            return false;
        }
        $data['create_time'] = time();
        $data['update_time'] = time();
        try {
            $res = $this->modelObj->getHyshopOrderByCreate($data);
        } catch (\Exception $e) {
            throw new \Exception("发生错误");
        }
        return $res;
    }
}