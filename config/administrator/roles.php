<?php

use Spatie\Permission\Models\Role;

return [
    'title'   => 'Roles',
    'single'  => 'Roles',
    'model'   => Role::class,
    
    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
},

'columns' => [
    'id' => [
        'title' => 'ID',
    ],
    'name' => [
        'title' => 'Mark'
    ],
    'permissions' => [
        'title'  => 'Authentication',
        'output' => function ($value, $model) {
        $model->load('permissions');
        $result = [];
        foreach ($model->permissions as $permission) {
            $result[] = $permission->name;
        }
        
        return empty($result) ? 'N/A' : implode($result, ' | ');
        },
        'sortable' => false,
        ],
        'operation' => [
            'title'  => 'Control',
            'output' => function ($value, $model) {
            return $value;
            },
            'sortable' => false,
            ],
            ],
            
            'edit_fields' => [
                'name' => [
                    'title' => 'Mark',
                ],
                'permissions' => [
                    'type' => 'relationship',
                    'title' => 'Authentication',
                    'name_field' => 'name',
                ],
            ],
            
            'filters' => [
                'id' => [
                    'title' => 'ID',
                ],
                'name' => [
                    'title' => 'Mark',
                ]
            ],
            
            // form filling rule
                'rules' => [
                    'name' => 'required|max:15|unique:roles,name',
                ],
                
                // form incorrection info warning
                'messages' => [
                    'name.required' => 'Mark can not be none',
                    'name.unique' => 'mark existed',
                ]
                ];