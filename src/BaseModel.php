<?php
// +----------------------------------------------------------------------
// | BaseModel.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/3/27 上午11:37
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Chinaobject\Dingtalk;

use Chinaobject\Dingtalk\Exceptions\ParameterErrorException;
use Chinaobject\Dingtalk\Exceptions\RequestErrorException;
use Chinaobject\Dingtalk\Tools\DingConfig;
use GuzzleHttp\Client;

class BaseModel
{
    /**
     * @var string|required|API's name
     */
    protected $method;

    /**
     * @var string|required|access_token
     */
    protected $session;

    /**
     * @var string|required|yyyy-MM-dd HH:mm:ss|GMT+8|最大误差不可超过10分钟（与淘宝的误差）
     */
    protected $timestamp;

    /**
     * @var string|sometimes|xml or json
     */
    protected $format = 'json';

    /**
     * @var string|required|API's version|2.0
     */
    protected $v = '2.0';

    /**
     * @var string|sometimes|partner's id。
     */
    protected $partner_id;

    /**
     * @var boolean|sometimes|    是否采用精简JSON返回格式，仅当format=json时有效，默认值为：false。
     */
    protected $simplify;

    /**
     * @var
     */
    protected $api;

    /**
     * BaseModel constructor.
     * @param array $params
     */
    public function __construct(Array $params)
    {
        foreach ($params as $k => $v) {
            $this->$k = $v;
        }
    }

    /**
     * @return $this
     */
    public function eco(DingConfig $config)
    {
        $this->api = $config->getBaseApi(false);
        $this->timestamp = date('Y-m-d H:i:s');
        return $this;
    }

    /**
     * @param DingConfig $config
     * @return $this
     */
    public function ding(DingConfig $config)
    {
        $this->api = $config->getBaseApi();
        return $this;
    }

    /**
     * @param string $format
     * @return $this
     */
    public function setFormat($format = 'json')
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @param $access_token
     * @return $this
     */
    public function setSession($access_token)
    {
        $this->session = $access_token;
        return $this;
    }

    /**
     * @param float $v
     * @return $this
     */
    public function setVersion($v = 2.0)
    {
        $this->v = $v;
        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setPartnerId($id)
    {
        $this->partner_id = $id;
        return $this;
    }

    /**
     * @param bool $flag
     * @return $this
     */
    public function setSimplify($flag = false)
    {
        $this->simplify = $flag;
        return $this;
    }

    /**
     * 发送请求
     */
    public function send()
    {
        $this->check();
        $client = new Client();
        $result = $client->request('POST',$this->api,[
            'headers'=>[],
            'form_params' =>$this->toArray()
        ]);
        $result = (string)$result->getBody();
        $result_data = json_decode($result,true);
        throw_unless(
            $result_data,
            RequestErrorException::class,
            '400',
            "请求错误：{$result}"
        );

        if (isset($result_data['error_response'])){
            throw RequestErrorException(400,"请求错误：{$result_data['error_response']['msg']} 错误码：{$result_data['error_response']['code']}");
        }

        return $result;
    }

    /**
     * 设置请求接口
     */
    public function setMethod()
    {

    }

    /**
     * 检查数据是否完整
     */
    public function check()
    {
        throw_if(is_null($this->method), ParameterErrorException::class, '400', "参数错误：请求接口不能为空");
        throw_if(is_null($this->session), ParameterErrorException::class, '400', "参数错误：access_token不能为空");
        throw_if(is_null($this->timestamp), ParameterErrorException::class, '400', "参数错误：时间戳不能为空");
        throw_if(is_null($this->v), ParameterErrorException::class, '400', "参数错误：版本号不能为空");
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [];
        foreach (get_object_vars($this) as $k => $v) {
            if (!is_null($v)) {
                $data[$k] = $v;
            }
        }

        return $data;
    }
}