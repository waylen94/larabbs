<?php

use App\Models\User;

return [
    // administrator user page title
    'title'   => 'user',
    
    // for creating user model
    'single'  => 'user',
    
    // the model
    'model'   => User::class,
    
    // setting current page visit permission
    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
},

// column represent statistics
'columns' => [
    
    'id',
    
    'avatar' => [
        'title'  => 'avatar',
        
        'output' => function ($avatar, $model) {
        return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
        },
        
        'sortable' => false,
        ],
        
        'name' => [
            'title'    => 'User Name',
            'sortable' => false,
            'output' => function ($name, $model) {
            return '<a href="/users/'.$model->id.'" target=_blank>'.$name.'</a>';
            },
            ],
            
            'email' => [
                'title' => 'Email',
            ],
            
            'operation' => [
                'title'  => 'Control',
                'sortable' => false,
            ],
            ],
            
            'edit_fields' => [
                'name' => [
                    'title' => 'UserName',
                ],
                'email' => [
                    'title' => 'Email',
                ],
                'password' => [
                    'title' => 'Password',
                    
                    'type' => 'password',
                ],
                'avatar' => [
                    'title' => 'User Avatar',
                    
 
                    'type' => 'image',
                    
 
                    'location' => public_path() . '/uploads/images/avatars/',
                ],
                'roles' => [
                    'title'      => 'User Name',
                    
     
                    'type'       => 'relationship',
                    

                    'name_field' => 'name',
                ],
            ],
            

'filters' => [
 'id' => [
                                

        'title' => 'User ID',
        ],
        'name' => [
        'title' => 'User Name',
                    ],
        'email' => [
        'title' => 'Email',
                ],
                ],
                ];