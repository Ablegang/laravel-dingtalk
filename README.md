# laravel-dingtalk
This is a dingtalk extension of laravel.

## 审批提交
```
Dingtalk::smartwork()->createApproval(new ApprovalModel([
    ''
]));
```


```
php artisan vendor:publish --provider="Chinaobject\Dingtalk\DingtalkProvider"

```

```
return Dingtalk::smartwork()->createApproval(new ApprovalModel([
        'process_code' => '审批模板id',
        'originator_user_id' => '申请人userid',
        'dept_id' => '部门id',
        'approvers' => '审批人1,审批人2,审批人3',
        'form_component_values' => json_encode([
            ['name' => '订单编号', 'value' => '123test'],
            ['name' => '退款金额', 'value' => '1000000'],
            ['name' => '退款类目', 'value' => '订金'],
            ['name' => '发起部门', 'value' => '测试部'],
            ['name' => '客户', 'value' => '吕帅哥'],
            [
                'name' => '资金信息',
                'value' => [
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                ]
            ],
            ['name' => '资金总计', 'value' => '4000000 '],
            [
                'name' => '实付信息',
                'value' => [
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                ]
            ],
            ['name' => '实付总计', 'value' => '4000000 '],
            [
                'name' => '订单日志',
                'value' => [
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                    [['name' => '内容', 'value' => '']],
                ]
            ]
        ])
    ]));
```

审批表单目前仅支持三种元素