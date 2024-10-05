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
    'theme' => 'taildash',

    /**
     * stater kids that's are available
     *
     * breeze, ....upcoming
     */
    'stater_kids' => 'breeze',

    'asset_build' => true,

];
