<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/22
 * Time: 17:35
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model\mysql;


use app\common\lib\Status;
use think\Model;

class HyshopValue extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * @param array $data
     * @return int|string
     */
    public function add(array $data = [])
    {
        $data['status'] = Status::Sql_normal;
        return $this->insertGetId($data);
    }

    /**
     * @param int $specs_id
     * @param string $field
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getBySpecsId(int $specs_id = 0, string $field = '*')
    {

        return $this->field($field)->where('status', Status::Sql_normal)
            ->where('specs_id', $specs_id)->select();
    }
}