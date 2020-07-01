<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2020/6/27
 * Time: 16:24
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\bussiness;


use app\common\model\mysql\HyshopCart as ModelO;
use think\Exception;

class HyshopCart
{
    protected $modelObj = '';

    public function __construct()
    {
        $this->modelObj = new ModelO();
    }

    /**
     * @param string $openid
     * @param string $field
     * @return array
     * @throws \Exception
     */
    public function getHyshopCartByOpenid(string $openid = '', string $field = 'id,shop_id,openid,num,price,img,title,unit')
    {
        if (empty($openid)) {
            return [];
        }
        try {
            $res = $this->modelObj->getHyshopCartByOpenid($openid, $field);
        } catch (\Exception $e) {
            throw new \Exception("发生错误");
        }

        if ($res) {
            return $res->toArray();
        } else {
            return [];
        }
    }

    /**
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    public function add(array $data)
    {
        if (empty($data)) {
            return false;
        }
        try {
            $res = $this->modelObj->add($data);
        } catch (\Exception $e) {
            throw new \Exception("发生错误");
        }
        return $res;
    }

    /**
     * @param array $data
     * @return bool|\think\Collection
     * @throws Exception
     */
    public function updateCart(array $data = [])
    {
        if (empty($data)) {
            return false;
        }
        try {
            $res = $this->modelObj->updateCart($data);
        } catch (\Exception $e) {
            throw new Exception("发生错误");
        }
        return $res;
    }

    /**
     * @param int $id
     * @return ModelO
     * @throws Exception
     */
    public function delItemFun(int $id = 0)
    {
        try {
            $res = $this->modelObj->delItemFun($id);
        } catch (\Exception $e) {
            throw new Exception("发生错误");
        }
        return $res;
    }
}