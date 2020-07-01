<?php
/**
 * Created by PhpStorm.
 * User: PHPTAO
 * Email: 243194993@qq.com
 * Date: 2020/6/20
 * Time: 9:33
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\lib;


class Status
{
    const Status_Normal = 0;
    const Status_Error = 1;
    const Status_delete = -1;
    const Sql_normal = 1;
    const Sql_error = 0;
    const Sql_delete = -1;
    //记录session
    const Session_Login_key = "hydy_session_key_value";
    //返回小程序
    const MiniProgram_normal = 200;
    const MiniProgram_error = 300;
}