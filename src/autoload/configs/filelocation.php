<?php
use Nobir\TheBackendWizard\HelperClass\CommandName;
/** Array defining rules
 *
 * at first command name then publish array or/both content_replace(cp) array
 *
 * */


return [
    "taildash" => [
        CommandName::SETUP => [
            'publish' => [],
            'cp' => [
                CommandName::content_replace_path(CommandName::SETUP) . '/0001_01_01_000000_create_users_table.php' => database_path('migrations/0001_01_01_000000_create_users_table.php'),
                CommandName::content_replace_path(CommandName::SETUP) . '/AppServiceProvider.php' => app_path('providers/AppServiceProvider.php'),
                CommandName::content_replace_path(CommandName::SETUP) . '/boot-app.php' => base_path('bootstrap/app.php'),
                CommandName::content_replace_path(CommandName::SETUP) . '/DatabaseSeeder.php' => database_path('seeders/DatabaseSeeder.php'),
                CommandName::content_replace_path(CommandName::SETUP) . '/ProfileController.php' => app_path('Http/Controllers/ProfileController.php'),
                CommandName::content_replace_path(CommandName::SETUP) . '/User.php' => app_path('Models/User.php'),
                CommandName::content_replace_path(CommandName::SETUP) . '/web.php' => base_path('routes/web.php'),
            ]
        ]
    ]
];
