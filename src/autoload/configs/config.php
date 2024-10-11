<?php

return [

    /**
     * below path array is not working now. this is upcoming features
     */
    'paths' => [
        'service_class_path' => app_path('Http/Service'),
        'view_path' => 'backend',
        'asset_path' => 'assets/backend',
        // 'component_class_path' => 'Backend',
        'view_component_path' => 'backend',
    ],

    /**  Available theme are :-
     *
     * taildash,
     *
     * upcoming more
     */
    'admin_name' => 'taildash',

    /**
     * code slightly change in case of role permission
     *HEre you can set role permission is set or not to the admin panel
     */
    'role_parmission' => true,

];
