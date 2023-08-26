<?php declare(strict_types=1);

return [
    'title' => 'Roles',
    'table' => [
        'columns' => [
            'id' => 'Id',
            'name' => 'Name',
            'created_at' => 'Created at'
        ],
        'empty' => 'There are no roles',
    ],
    'buttons' => [
        'create' => 'Create a role'
    ],
    'form' => [
        'fields' => [
            'name' => 'Name',
            'permissions' => 'Permissions',
        ],
        'buttons' => [
            'create' => 'Create',
            'update' => 'Update'
        ]
    ],
    'messages' => [
        'created' => 'Role has been created',
        'updated' => 'Role has been updated',
        'deleted' => 'Role has been deleted',
    ]
];
