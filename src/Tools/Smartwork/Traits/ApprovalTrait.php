<?php
// +----------------------------------------------------------------------
// | Approval.php
// +----------------------------------------------------------------------
// | Description: Approval
// +----------------------------------------------------------------------
// | Time: 2018/3/26 下午11:34
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Chinaobject\Dingtalk\Tools\Smartwork\Traits;

use Chinaobject\Dingtalk\Tools\Smartwork\Models\ApprovalModel;

trait ApprovalTrait
{
    public function createApproval(ApprovalModel $model)
    {
        return $model
            ->eco($this->config)
            ->setSession($this->config->getCompanyAccessToken())
            ->setMethod()
            ->send();
    }
}