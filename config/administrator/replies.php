<?php

use App\Models\Reply;

return [
    'title'   => 'replies',
    'single'  => 'replies',
    'model'   => Reply::class,
    
    'columns' => [
        
        'id' => [
            'title' => 'ID',
        ],
        'content' => [
            'title'    => 'Content',
            'sortable' => false,
            'output'   => function ($value, $model) {
            return '<div style="max-width:220px">' . $value . '</div>';
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
                'topic' => [
                    'title'    => 'Topic',
                    'sortable' => false,
                    'output'   => function ($value, $model) {
                    return '<div style="max-width:260px">' . model_admin_link($model->topic->title, $model->topic) . '</div>';
                    },
                    ],
                    'operation' => [
                        'title'  => 'Control',
                        'sortable' => false,
                    ],
                    ],
                    'edit_fields' => [
                        'user' => [
                            'title'              => 'User',
                            'type'               => 'relationship',
                            'name_field'         => 'name',
                            'autocomplete'       => true,
                            'search_fields'      => array("CONCAT(id, ' ', name)"),
                            'options_sort_field' => 'id',
                        ],
                        'topic' => [
                            'title'              => 'Topic',
                            'type'               => 'relationship',
                            'name_field'         => 'title',
                            'autocomplete'       => true,
                            'search_fields'      => array("CONCAT(id, ' ', title)"),
                            'options_sort_field' => 'id',
                        ],
                        'content' => [
                            'title'    => 'Replies contest',
                            'type'     => 'textarea',
                        ],
                    ],
                    'filters' => [
                        'user' => [
                            'title'              => 'Author',
                            'type'               => 'relationship',
                            'name_field'         => 'name',
                            'autocomplete'       => true,
                            'search_fields'      => array("CONCAT(id, ' ', name)"),
                            'options_sort_field' => 'id',
                        ],
                        'topic' => [
                            'title'              => 'Topic',
                            'type'               => 'relationship',
                            'name_field'         => 'title',
                            'autocomplete'       => true,
                            'search_fields'      => array("CONCAT(id, ' ', title)"),
                            'options_sort_field' => 'id',
                        ],
                        'content' => [
                            'title'    => 'Replies content',
                        ],
                    ],
                    'rules'   => [
                        'content' => 'required'
                    ],
                    'messages' => [
                        'content.required' => 'Please enter replies content ',
                    ],
                    ];