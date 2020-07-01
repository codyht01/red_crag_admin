<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/23
 * Time: 13:21
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\bussiness;


use app\common\lib\Status;
use app\common\model\mysql\Hyshop as ModelO;
use app\common\model\mysql\HyshopDetail;
use app\common\model\mysql\HyshopImg;
use think\Exception;
use think\facade\Db;
use think\facade\Log;

class Hyshop
{
    protected $modelObj = '';

    public function __construct()
    {
        $this->modelObj = new ModelO();
    }

    /**
     * @param int $page
     * @param int $limit
     * @param string $field
     * @return array|bool
     * @throws \Exception
     */
    public function getHotList($page = 1, $limit = 10, $field = 'big_image as img,id as _id,title,price,goods_unit')
    {
        try {
            $res = $this->modelObj->getHostList($page, $limit, $field);
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
     * @param int $limit
     * @param string $field
     * @return array|\think\Paginator
     * @throws \Exception
     */
    public function getListAllPage($limit = 10, $field = 'big_image as img,id as _id,title,price')
    {
        try {
            $res = $this->modelObj->getListAllPage($limit, $field);
        } catch (\Exception $e) {
            throw new \Exception("发生错误");
        }
        if ($res) {
            return $res;
        } else {
            return [];
        }
    }

    /**
     * @param int $id
     * @param string $field
     * @return array
     * @throws \Exception
     */
    public function getShopItem(int $id, string $field = '*')
    {
        try {
            $res = $this->modelObj->getShopItem($id, $field);
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
     * @return bool|\think\Collection
     * @throws Exception
     */
    public function add(array $data)
    {
        $data['status'] = Status::Sql_normal;
        if (empty($data)) {
            return false;
        }
        Log::info(json_encode($data));
        //添加主库
        $shop_data = [
            "title" => $data['title'],
            "sub_title" => $data['sub_title'],
            "price" => $data['sell_price'],
            "promotion_title" => $data['promotion_title'],
            "goods_unit" => $data['goods_unit'],
            "keywords" => $data['keywords'],
            "stock" => $data['stock'],
            "market_price" => $data['market_price'],
            "is_show_stock" => $data['is_show_stock'],
            "production_time" => $data['production_time'],
            "big_image" => $data['big_image'],
            "recommend_image" => $data['big_image'],
            "description" => "",
            "create_time" => time(),
            "update_time" => time(),
            "status" => $data['status']
        ];
        $res = $this->modelObj->add($shop_data);
        //添加轮播图片库
        if (!$res) {
            throw new \Exception("添加发生错误");
        }
        if (!is_array($data['image_banner']) || empty($data['image_banner'])) {
            throw new \Exception("请上传多上轮播图");
        }
        $img_data = [];
        foreach ($data['image_banner'] as $k => $v) {
            $img_data[] = [
                "img_url" => $v,
                "shop_id" => $res,
                "status" => $data['status']
            ];
        }
        try {
            $result = (new HyshopImg())->add($img_data);
        } catch (\Exception $e) {
            throw new \Exception("添加失败");
        }
        //添加商品详情页图片
        if (!$result) {
            throw new Exception("添加商品失败");
        }
        $detail_data = [];
        if (!empty($data['image_banner_detail'])) {
            foreach ($data['image_banner_detail'] as $k => $v) {
                $detail_data[] = [
                    "img_url" => $v,
                    "shop_id" => $res,
                    "status" => $data['status']
                ];
            }
        }
        try {
            $rr = (new HyshopDetail())->add($detail_data);
        } catch (\Exception $e) {
            throw new \Exception("添加失败");
        }
        return $rr;
    }
}