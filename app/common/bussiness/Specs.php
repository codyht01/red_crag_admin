<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/22
 * Time: 16:16
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\bussiness;


use app\common\model\mysql\HyshopSpecs as ModelO;

class Specs
{
    protected $modelObj = '';

    public function __construct()
    {
        $this->modelObj = new ModelO();
    }

    /**
     * @param string $field
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getSpecsByTitleid(string $field = 'id,title as name')
    {
        $res = $this->modelObj->getHyShopByTitleId($field);
        if (empty($res)) {
            return [];
        }
        return $res->toArray();
    }
}