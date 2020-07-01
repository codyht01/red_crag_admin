<?php
/**
 *Created by tp6
 * @author:phptao
 * @since:2020/6/22
 * @Time:21:24
 * @email:243194993@qq.com
 */

namespace app\admin\controller;


use app\BaseController;
use app\common\lib\Show;
use app\common\lib\Status;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use think\facade\Filesystem;

class Upload extends BaseController
{
    /**
     * @return \think\response\Json
     */
    public function image()
    {
        $file = $this->request->file('image');
        if (empty($file)) {
            return Show::json_show(Status::Status_Error, "选择上传文件");
        }
        $savename = Filesystem::disk('public')->putFile('', $file);

        if ($savename === false) {
            return Show::json_show(Status::Status_Error, "发生错误");
        }
        $qiniu = config('qiniu');
        $auth = new Auth($qiniu['ak'], $qiniu['sk']);

        $token = $auth->uploadToken($qiniu['bucket']);

        $uploadMgr = new UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $savename, public_path() . "public/image/" . $savename);
        if ($err !== null) {
            return Show::json_show(Status::Status_Error, "文件上传失败");
        } else {
            return Show::json_show(Status::Status_Normal, "上传成功", ["src"=>$ret['key']]);
        }
    }

    /**
     * layedit 文件上传
     * @return \think\response\Json
     */
    public function layedit()
    {
        $file = $this->request->file('file');
        if (empty($file)) {
            return Show::json_show(Status::Status_Error, "选择上传文件");
        }
        $savename = Filesystem::disk('public')->putFile('', $file);

        if ($savename === false) {
            return Show::json_show(Status::Status_Error, "发生错误");
        }
        $qiniu = config('qiniu');
        $auth = new Auth($qiniu['ak'], $qiniu['sk']);

        $token = $auth->uploadToken($qiniu['bucket']);

        $uploadMgr = new UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $savename, public_path() . "public/image/" . $savename);
        if ($err !== null) {
            return Show::json_show(Status::Status_Error, "文件上传失败");
        } else {
            $re = [
                "src" => $qiniu['picimag_url'] . $ret['key'],
                "title" => "可橙"
            ];
            return Show::json_show(0, "上传成功",$re);
        }
    }
}