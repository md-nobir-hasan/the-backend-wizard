<?php

use Nobir\TheBackendWizard\HelperClass\CommandName;

/** Array defining rules
 *
 * at first  admin name
 * second command name
 * then command, publish, content_replace, content_mofify
 * command array structure:
 *  command => [
 *      [
 *          'code'='require laravel/breeze --dev', // don't write composer/ npm
 *          'type'=composer/artisan/npm,
 *           'first' => true/false, //
 *      ],
 *  ]
 *
 * 'content_modify'=>[
 *      [
 *          "pakage_path"=> '',
 *          'app_path'=>'',
 *          'replace'=>'..'
 *          'replace_msg'=>'..'
 *      ]
 *  ]
 *
 * publish => [ //When you assign this it will allow to run revesre command
 *      'pakage_path' => 'app_path'
 * ]
 * 'content_replace' =>[
 *      'pakage_path' => 'app_path'
 * ]
 *
 * Use the array which are necessery
 * */

return [
    'taildash' => [
        CommandName::SETUP => [
            'with_role_permission' => [
                'commands' => [
                    ['code' => 'require laravel/breeze --dev', 'type' => 'composer', 'first' => true],
                    ['code' => 'run build', 'type' => 'npm', 'first' => false],
                    ['code' => 'migrate:fresh --seed', 'type' => 'artisan', 'first' => false],
                ],
                'content_replace' => [
                    CommandName::content_replace_path(CommandName::SETUP).'/0001_01_01_000000_create_users_table.php' => database_path('migrations/0001_01_01_000000_create_users_table.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/AppServiceProvider.php' => app_path('providers/AppServiceProvider.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/boot-app.php' => base_path('bootstrap/app.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/DatabaseSeeder.php' => database_path('seeders/DatabaseSeeder.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/ProfileController.php' => app_path('Http/Controllers/ProfileController.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/User.php' => app_path('Models/User.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/web.php' => base_path('routes/web.php'),
                ],
            ],
            'without_role_permission' => [
                'commands' => [
                    ['code' => 'require laravel/breeze --dev', 'type' => 'composer', 'first' => true],
                    ['code' => 'run build', 'type' => 'npm', 'first' => false],
                    ['code' => 'migrate:fresh --seed', 'type' => 'artisan', 'first' => false],
                ],
                'content_replace' => [
                    CommandName::content_replace_path(CommandName::SETUP).'/0001_01_01_000000_create_users_table.php' => database_path('migrations/0001_01_01_000000_create_users_table.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/AppServiceProvider.php' => app_path('providers/AppServiceProvider.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/boot-app.php' => base_path('bootstrap/app.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/DatabaseSeeder.php' => database_path('seeders/DatabaseSeeder.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/ProfileController.php' => app_path('Http/Controllers/ProfileController.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/User.php' => app_path('Models/User.php'),
                    CommandName::content_replace_path(CommandName::SETUP).'/web.php' => base_path('routes/web.php'),
                ],
            ],

        ],
    ],
];
