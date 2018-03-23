<?php
// +----------------------------------------------------------------------
// | Initialize.php
// +----------------------------------------------------------------------
// | Description: 钉钉服务类
// +----------------------------------------------------------------------
// | Time: 2018/3/26 下午5:43
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace ChinaObject\Dingtalk\Tools;

use ChinaObject\Dingtalk\Exceptions\AccessTokenInitException;
use Illuminate\Support\Facades\Cache;

class Initialize
{

    /**
     * @var The corp id of dingtalk , you will get it at the http://open-dev.dingtalk.com
     */
    private $corp_id;

    /**
     * @var The corp secret of dingtalk , you will get it at the http://open-dev.dingtalk.com.
     */
    private $corp_secret;

    /**
     * @var The sso secret of dingtalk , you will get it at the http://open-dev.dingtalk.com.
     */
    private $sso_secret;

    /**
     * @var The channel secret of dingtalk , you will get it at the http://open-dev.dingtalk.com.
     */
    private $channel_secret;

    /**
     * @var The life cycle of the access token , it will be expired after {$minutes} minutes later.
     */
    private $minutes;

    /**
     * Initialize constructor.
     * It will initialize the configure of dingtalk.
     */
    public function __construct()
    {
        $this->corp_id = config('dingtalk.corp_id');
        $this->corp_secret = config('dingtalk.corp_secret');
        $this->sso_secret = config('dingtalk.sso_secret');
        $this->channel_secret = config('dingtalk.channel_secret');
        $this->minutes = config('dingtalk.expire_minutes');
    }

    /**
     * It will return the company's acess_token by cache or dingtalk api.
     * @return string | access_token
     */
    public function getCompanyAccessToken()
    {
        return Cache::remember('dingtalk_company_access_token', $this->minutes, function () {
            $data = file_get_contents("https://oapi.dingtalk.com/gettoken?corpid={$this->corp_id}&corpsecret={$this->corp_secret}");
            $data = json_decode($data, true);
            throw_if(
                $data['errcode'] != 0,
                AccessTokenInitException::class,
                '400',
                "获取access_token出错：{$data['errmsg']}"
            );

            return $data['access_token'];
        });
    }

    /**
     * It will return the isv's acess_token by cache or dingtalk api.
     * @return string | access_token
     */
    public function getISVAccessToken()
    {
        // TODO
    }

    /**
     * It will return the provider's acess_token by cache or dingtalk api.
     * @return string | access_token
     */
    public function getProviderAccessToken()
    {
        // TODO
    }

    /**
     * @return string | corp_id
     */
    public function getCorpId()
    {
        return $this->corp_id;
    }

    /**
     * @return string | corp_secret
     */
    public function getCorpSecret()
    {
        return $this->corp_secret;
    }

    /**
     * @return string | sso_secret
     */
    public function getSsoSecret()
    {
        return $this->sso_secret;
    }

    /**
     * @return string | channel_secret
     */
    public function getChannelSecret()
    {
        return $this->channel_secret;
    }
}