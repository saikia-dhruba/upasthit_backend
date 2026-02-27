<?php

// This is the entire content for config/permissions.php

return [

    'users' => [
        'users.create',
        'users.view',
        'users.edit',
        'users.delete',
        'users.assign_roles',
    ],
    'roles' => [
        'roles.create',
        'roles.view',
        'roles.edit',
        'roles.delete',
    ],
    'permissions' => [
        'permissions.view',
        'permissions.sync',
    ],

];
