<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/23
 * Time: 9:20
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\admin\middleware;


use app\common\lib\Status;

class Auth
{
    public function handle($request, \Closure $next)
    {
        if (empty(session(Status::Session_Login_key)) && !preg_match("/login/", $request->pathinfo())) {
            return redirect((string)url('login/index'));
        }
        $response = $next($request);
        return $response;
    }
}