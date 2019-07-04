<?php

use Spatie\Permission\Models\Permission;

return [
    'title'   => 'permissions',
    'single'  => 'permissions',
    'model'   => Permission::class,
    
    'permission' => function () {
    return Auth::user()->can('manage_users');
    },
    

    'action_permissions' => [
        // 控制『新建按钮』的显示
        'create' => function ($model) {
        return true;
        },
        // 允许更新
        'update' => function ($model) {
        return true;
        },
        // 不允许删除
        'delete' => function ($model) {
        return false;
        },
        // 允许查看
        'view' => function ($model) {
        return true;
        },
        ],
        
        'columns' => [
            'id' => [
                'title' => 'ID',
            ],
            'name' => [
                'title'    => 'Mark',
            ],
            'operation' => [
                'title'    => 'Control',
                'sortable' => false,
            ],
        ],
        
        'edit_fields' => [
            'name' => [
                'title' => 'Mark',
                
                // warnning info because edit the fields will broke user coding
                'hint' => 'in case not breaking code please consider this behavior'
            ],
            'roles' => [
                'type' => 'relationship',
                'title' => 'user',
                'name_field' => 'name',
            ],
        ],
        
        'filters' => [
            'name' => [
                'title' => 'Mark',
            ],
        ],
        ];