<?php
// +----------------------------------------------------------------------
// | Dingtalk.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/3/26 下午5:34
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Chinaobject\Dingtalk\Facades;

use Illuminate\Support\Facades\Facade;

class Dingtalk extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'DingtalkService';
    }
}