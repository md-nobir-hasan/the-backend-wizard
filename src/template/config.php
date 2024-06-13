<?php

return [
    'asset_path' => public_path('assets/backend'),
    'view_path' => resource_path('views/backend'),
    'migration_path' => database_path('migrations/Backend'),
    'seeder_path' => database_path('seeders/Backend'),
    'controller_path' => app_path('Http/Controllers/Backend'),
    'service_class_path' => app_path('Services/Backend'),
    'requests_path' => app_path('Http/Requests/Backend'),
    'factory_path' => database_path('factories/Backend'),
    'route_path' => base_path('routes'),
];
