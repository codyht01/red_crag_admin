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


use app\common\model\mysql\Hycategory as ModelO;

class Category
{
    protected $modelObj = '';

    public function __construct()
    {
        $this->modelObj = new ModelO();
    }

    /**
     * @param int $pid
     * @param string $field
     * @return array|\think\Collection
     */
    public function getNormalByPid($pid = 0 , $field = "id, name, pid") {
        //$field = "id,name,pid";
        try {
            $res = $this->modelObj->getNormalByPid($pid, $field);
        }catch (\Exception $e) {
            // 记得记录日志。
            return [];
        }
        $res = $res->toArray();

        return $res;
    }
}