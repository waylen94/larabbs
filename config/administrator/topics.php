<?php

use App\Models\Topic;

return [
    'title'   => 'Topics',
    'single'  => 'Topics',
    'model'   => Topic::class,
    
    'columns' => [
        
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'Topics',
            'sortable' => false,
            'output'   => function ($value, $model) {
            return '<div style="max-width:260px">' . model_link($value, $model) . '</div>';
            },
            ],
            'user' => [
                'title'    => 'Author',
                'sortable' => false,
                'output'   => function ($value, $model) {
                $avatar = $model->user->avatar;
                $value = empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" style="height:22px;width:22px"> ' . $model->user->name;
                return model_link($value, $model->user);
                },
                ],
                'category' => [
                    'title'    => 'categories',
                    'sortable' => false,
                    'output'   => function ($value, $model) {
                    return model_admin_link($model->category->name, $model->category);
                    },
                    ],
                    'reply_count' => [
                        'title'    => 'replies',
                    ],
                    'operation' => [
                        'title'  => 'Control',
                        'sortable' => false,
                    ],
                    ],
                    'edit_fields' => [
                        'title' => [
                            'title'    => 'title',
                        ],
                        'user' => [
                            'title'              => 'user',
                            'type'               => 'relationship',
                            'name_field'         => 'name',
                            
                            // 自动补全，对于大数据量的对应关系，推荐开启自动补全，
                            // 可防止一次性加载对系统造成负担
                            'autocomplete'       => true,
                            
                            // 自动补全的搜索字段
                            'search_fields'      => ["CONCAT(id, ' ', name)"],
                            
                            // 自动补全排序
                            'options_sort_field' => 'id',
                        ],
                        'category' => [
                            'title'              => 'categories',
                            'type'               => 'relationship',
                            'name_field'         => 'name',
                            'search_fields'      => ["CONCAT(id, ' ', name)"],
                            'options_sort_field' => 'id',
                        ],
                        'reply_count' => [
                            'title'    => 'replies',
                        ],
                        'view_count' => [
                            'title'    => 'views',
                        ],
                    ],
                    'filters' => [
                        'id' => [
                            'title' => 'ID',
                        ],
                        'user' => [
                            'title'              => 'user',
                            'type'               => 'relationship',
                            'name_field'         => 'name',
                            'autocomplete'       => true,
                            'search_fields'      => array("CONCAT(id, ' ', name)"),
                            'options_sort_field' => 'id',
                        ],
                        'category' => [
                            'title'              => 'categories',
                            'type'               => 'relationship',
                            'name_field'         => 'name',
                            'search_fields'      => array("CONCAT(id, ' ', name)"),
                            'options_sort_field' => 'id',
                        ],
                    ],
                    'rules'   => [
                        'title' => 'required'
                    ],
                    'messages' => [
                        'title.required' => 'please enter tiele properly',
                    ],
                    ];