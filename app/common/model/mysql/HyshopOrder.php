<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2020/6/29
 * Time: 17:20
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model\mysql;


use app\common\lib\Status;
use think\Model;

class HyshopOrder extends Model
{
    protected $autoWriteTimestamp = true;

    public function getHyshopOrderByCreate(array $data = [])
    {
        $data['status'] = Status::Sql_normal;
        return $this->insertGetId($data);
    }
}