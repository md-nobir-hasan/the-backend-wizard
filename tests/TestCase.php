<?php

namespace Nobir\TheBackendWizard\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nobir\TheBackendWizard\TheBackendWizardServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Nobir\\TheBackendWizard\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            TheBackendWizardServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_the-backend-wizard_table.php.stub';
        $migration->up();
        */
    }
}
