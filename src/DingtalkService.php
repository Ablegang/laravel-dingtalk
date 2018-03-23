<?php
// +----------------------------------------------------------------------
// | DingtalkService.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/3/26 下午10:34
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Chinaobject\Dingtalk;

use Chinaobject\Dingtalk\Tools\Initialize;

class DingtalkService
{

    /**
     * @var Initialize
     * It provide the basic ability of dingtalk
     */
    public $initialize;

    public function __construct(Initialize $initialize)
    {
        $this->initialize = $initialize;
    }

    /**
     * It will return the "noLogin" object
     * and "noLogin" will work for implicit login.
     */
    public function noLogin()
    {

    }

    /**
     * It will return the "department" object
     * and "department" will work for the departmental function of dingtalk.
     */
    public function department()
    {

    }

    /**
     * It will return the "user" object
     * and "user" will work for the user function of dingtalk.
     */
    public function user()
    {

    }

    /**
     * It will return the "role" object
     * adn "role" will work for the role function of dingtalk.
     */
    public function role()
    {

    }

    /**
     * It will return the "microapp" object
     * and "microapp" will work for the microapp function of dingtalk.
     */
    public function microapp()
    {

    }

    /**
     * It will return the "auth" object
     * and "auth" will work for the auth function of dingtalk.
     */
    public function auth()
    {

    }

    /**
     * It will return the "media" object
     * and "media" will work for the media function of dingtalk.
     */
    public function media()
    {

    }

    /**
     * It will return the "message" object.
     * and "message" will work for the message function of dingtalk.
     */
    public function message()
    {

    }

    /**
     * It will return the "robot" object.
     * and "robot" will work for the robot function of dingtalk.
     */
    public function robot()
    {

    }

    /**
     * It will return the "chat" object.
     * and "chat" will work for the chat function of dingtalk.
     */
    public function chat()
    {

    }

    /**
     * It will return the "callback" object.
     * and "callback" will work for the callback function of dingtalk.
     */
    public function callback()
    {

    }

    /**
     * It will return the "cspace" object.
     * and "cspace" will work for the cspace function of dingtalk.
     */
    public function cspace()
    {

    }

    /**
     * It will return the "file" object.
     * and "file" will work for the file function of dingtalk.
     */
    public function file()
    {

    }

    /**
     * It will return the "ext" object.
     * and "ext" will work for the ext function of dingtalk.
     */
    public function ext()
    {

    }

    /**
     * It will return the "sso" object.
     * and "sso" will work for the sso function of dingtalk.
     */
    public function sso()
    {

    }

    /**
     * It will return the "sns" object.
     * and "sns" will work for the sns function of dingtalk.
     */
    public function sns()
    {

    }

    /**
     * It will return the "smartwork" object.
     * and "smartwork" will work for the smartwork function of dingtalk.
     */
    public function smartwork()
    {
        return new Tools\Smartwork\Smartwork($this->initialize);
    }

    /**
     * It will return the "attendance" object.
     * and "attendance" will work for the attendance function of dingtalk.
     */
    public function attendance()
    {

    }

    /**
     * It will return the "checkin" object.
     * and "checkin" will work for the checkin function of dingtalk.
     */
    public function checkin()
    {

    }

    /**
     * It will return the "data" object.
     * and "data" will work for the data function of dingtalk.
     */
    public function data()
    {

    }

    /**
     * It will return the "jsapi" object.
     * and "jsapi" will work for the jsapi function of dingtalk.
     */
    public function jsapi()
    {

    }

    /**
     * It will return the "service" object.
     * and "service" will work for the service function of dingtalk.
     */
    public function service()
    {

    }

    /**
     * It will return the "channel" object.
     * and "channel" will work for the channel function of dingtalk.
     */
    public function channel()
    {

    }
}