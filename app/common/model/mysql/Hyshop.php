<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/23
 * Time: 13:21
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model\mysql;


use app\common\lib\Status;
use think\Model;

class Hyshop extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * @param int $page
     * @param int $limit
     * @param string $field
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getHostList(int $page, int $limit, string $field = '*')
    {
        return $this->field($field)
            ->where('status', Status::Sql_normal)
            ->order('listorder desc,id desc')
            ->page($page, $limit)->select();
    }

    /**
     * @param int $limit
     * @param string $field
     * @return \think\Paginator
     * @throws \think\db\exception\DbException
     */
    public function getListAllPage(int $limit = 0, string $field = '*')
    {
        return $this->field($field)
            ->where('status', '<>', Status::Sql_delete)
            ->order('listorder desc,id desc')
            ->paginate($limit)->each(function ($item, $key) {
                $item['uid'] = $key + 1;
                return $item;
            });
    }

    /**
     * @param int $id
     * @param string $field
     * @return array|Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getShopItem(int $id, string $field = "*")
    {
        $res_shop = $this->field($field)
            ->where('id', $id)
            ->where('status', Status::Sql_normal)
            ->find();
        if ($res_shop) {
            $res_shop['img'] = (new HyshopImg())->getShopItemByShopId($res_shop['id']);
            $res_shop['detail'] = (new HyshopDetail())->getShopItemByShopId($res_shop['id']);
        }
        return $res_shop;
    }

    /**
     * @param array $data
     * @return int|string
     */
    public function add(array $data = [])
    {
        return $this->insertGetId($data);
    }
}