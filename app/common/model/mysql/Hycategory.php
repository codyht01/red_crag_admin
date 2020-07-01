<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/22
 * Time: 16:16
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model\mysql;


use app\common\lib\Status;
use think\Model;

class Hycategory extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * @param int $pid
     * @param string $field
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getNormalByPid($pid = 0, $field = "*")
    {
        $where = [
            "pid" => $pid,
            "status" => Status::Sql_normal,
        ];
        $order = [
            "listorder" => "desc",
            "id" => "desc"
        ];

        return $this->where($where)
            ->field($field)
            ->order($order)
            ->select();
    }
}