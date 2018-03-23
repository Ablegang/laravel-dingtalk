<?php
// +----------------------------------------------------------------------
// | ApprovalModel.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/3/27 上午11:35
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Chinaobject\Dingtalk\Tools\Smartwork\Models;

use Chinaobject\Dingtalk\BaseModel;

class ApprovalModel extends BaseModel
{
    protected $agent_id;
    protected $process_code;
    protected $originator_user_id;
    protected $dept_id;
    protected $approvers;
    protected $cc_list;
    protected $cc_position;
    protected $form_component_values;

    /**
     * @param $method
     * @return $this
     */
    public function setMethod()
    {
        $this->method = 'dingtalk.smartwork.bpms.processinstance.create';
        return $this;
    }

    public function check()
    {
        parent::check();
        throw_if(!is_string($this->process_code),ParameterErrorException::class,'400',"参数错误：表单模板不能为空");
        throw_if(!is_string($this->originator_user_id),ParameterErrorException::class,'400',"参数错误：发起人id不能为空");
        throw_if(!is_int($this->dept_id),ParameterErrorException::class,'400',"参数错误：发起人所在部门id不能为空");
        throw_if(!is_array($this->approvers),ParameterErrorException::class,'400',"参数错误：审批人user_id不能为空");
    }
}