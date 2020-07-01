<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2020/6/27
 * Time: 16:06
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model\mysql;


use app\common\lib\Status;
use think\Model;

class HyshopCart extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * @param string $openid
     * @param string $field
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getHyshopCartByOpenid(string $openid = '', string $field = '*')
    {
        return $this->field($field)
            ->where('openid', $openid)
            ->where('status', Status::Sql_normal)
            ->order('id desc')
            ->select();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function add(array $data = [])
    {
        $data['status'] = Status::Sql_normal;
        return $this->save($data);
    }

    /**
     * @param array $data
     * @return \think\Collection
     * @throws \Exception
     */
    public function updateCart(array $data = [])
    {
        return $this->saveAll($data);
    }

    /**
     * @param int $id
     * @return HyshopCart
     */
    public function delItemFun(int $id = 0)
    {
        return $this->where('id', $id)->update(['status' => Status::Sql_error]);
    }
}