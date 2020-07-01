<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/24
 * Time: 11:29
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model\mysql;


use app\common\lib\Status;
use think\Model;

class HyshopImg extends Model
{
    protected $autoWriteTimestamp = true;

    public function add($data)
    {
        return $this->saveAll($data);
    }

    /**
     * @param int $shop_id
     * @return \think\Paginator
     * @throws \think\db\exception\DbException
     */
    public function getShopItemByShopId(int $shop_id)
    {
        return $this->where('shop_id', $shop_id)
            ->where('status', Status::Sql_normal)
            ->order('id asc')
            ->select();
    }

    /**
     * @param $value
     * @return string
     */
    public function getImgUrlAttr(string $value)
    {
        $qiniu = config('qiniu');
        return $qiniu['picimag_url'] . $value;
    }
}