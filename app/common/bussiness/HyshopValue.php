<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/22
 * Time: 17:33
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\bussiness;


use app\common\model\mysql\HyshopValue as ModelO;
use think\Exception;

class HyshopValue
{
    protected $modelObj = '';

    public function __construct()
    {
        $this->modelObj = new ModelO();
    }

    /**
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    public function add(array $data = [])
    {
        try {
            $res = $this->modelObj->add($data);
        } catch (\Exception $e) {
            throw new \Exception("发生错误");
        }
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    /**
     * @param int $specs_id
     * @param string $field
     * @return array
     * @throws Exception
     */
    public function getBySpecsId(int $specs_id = 0, string $field = 'id,name')
    {
        try {
            $res = $this->modelObj->getBySpecsId($specs_id, $field);
        } catch (\Exception $e) {
            throw new Exception("发生错误");
        }
        return $res->toArray();
    }
}