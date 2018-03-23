<?php
// +----------------------------------------------------------------------
// | dingtalk.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/3/26 下午5:04
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

return [
    // the corpid
    'corp_id' => env('DINGTALK_CORP_ID',''),

    // dingtalk corpsecret
    'corp_secret' => env('DINGTALK_CORP_SECRET',''),

    'sso_secret' => env('DINGTALK_SSO_SECRET',''),

    'channel_secret' => env('DINGTALK_CHANNEL_SECRET',''),

    'expire_minutes' => env('DINGTALK_EXPIRE_MINUTES',120),

    'open_api' => env('OPEN_API_URL','https://oapi.dingtalk.com/'),

    'eco_api' => env('ECO_API_URL','https://eco.taobao.com/router/rest'),
];