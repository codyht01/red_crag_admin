<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/20
 * Time: 9:42
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model\mysql;


use app\common\lib\Status;
use think\Model;

class Hy extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * @param string $name
     * @param string $field
     * @return array|bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getHyByHyname(string $name = '', string $field = '*')
    {
        $res = $this->field($field)
            ->where('hyname', $name)
            ->where('status', Status::Sql_normal)
            ->find();
        if ($res) {
            return $res->toArray();
        } else {
            return false;
        }
    }
}