<?php
// +----------------------------------------------------------------------
// | Smartwork.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/3/26 下午11:29
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace ChinaObject\Dingtalk\Tools\Smartwork;

class Smartwork
{
    use Approval;

    /**
     * @var Initialize
     * It provide the basic ability of dingtalk
     */
    public $initialize;

    public function __construct(Initialize $initialize)
    {
        $this->initialize = $initialize;
    }
}