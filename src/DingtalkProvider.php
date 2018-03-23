<?php
// +----------------------------------------------------------------------
// | ServiceProvider.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/3/26 下午5:11
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace ChinaObject\Dingtalk;

use ChinaObject\Dingtalk\Tools\Initialize;
use Illuminate\Support\ServiceProvider;

class DingtalkProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            './config/dingtalk.php'
        );

        $this->app->singleton('DingtalkService', function () {
            return new DingtalkService(new Initialize());
        });
    }

    public function boot()
    {
        $this->publishes([
            './config/dingtalk.php' => config_path('dingtalk.php')
        ]);
    }
}