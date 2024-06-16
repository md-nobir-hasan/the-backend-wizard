<?php

return [
    'route_path' => base_path('routes'),
    'model_path' => app_path('models/Backend'),
    'migration_path' => database_path('migrations/Backend'),
    'seeder_path' => database_path('seeders/Backend'),
    'factory_path' => database_path('factories/Backend'),
    'controller_path' => app_path('Http/Controllers/Backend'),
    'requests_path' => app_path('Http/Requests/Backend'),
    'service_class_path' => app_path('Services/Backend'),
    'view_path' => resource_path('views/backend'),
    'asset_path' => public_path('assets/backend'),
    'app_service_provider_path' => app_path('Providers/AppServiceProvider.php'),
    'component_class_path' => app_path('View/Components'),
    'view_component_path' => resource_path('views/components'),
];
