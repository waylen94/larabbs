<?php

use App\Models\Category;

return [
    'title'   => 'Categories',
    'single'  => 'Categories',
    'model'   => Category::class,
    

    'action_permissions' => [

        'delete' => function () {
        // only founder can delete corresponded content
return Auth::user()->hasRole('Founder');
        },
        ],
        
        'columns' => [
            'id' => [
                'title' => 'ID',
            ],
            'name' => [
                'title'    => 'Name',
                'sortable' => false,
            ],
            'description' => [
                'title'    => 'description',
                'sortable' => false,
            ],
            'operation' => [
                'title'  => 'management',
                'sortable' => false,
            ],
        ],
        'edit_fields' => [
            'name' => [
                'title' => 'Name',
            ],
            'description' => [
                'title' => 'Description',
                'type'  => 'textarea',
            ],
        ],
        'filters' => [
            'id' => [
                'title' => 'ID',
            ],
            'name' => [
                'title' => 'name',
            ],
            'description' => [
                'title' => 'description',
            ],
        ],
        'rules'   => [
            'name' => 'required|min:1|unique:categories'
        ],
        'messages' => [
            'name.unique'   => 'name existed please choose another one',
            'name.required' => 'name format incorrect',
        ],
        ];