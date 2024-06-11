<?php

namespace Nobir\TheBackendWizard;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Nobir\TheBackendWizard\Commands\TheBackendWizardCommand;

class TheBackendWizardServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('the-backend-wizard')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_the-backend-wizard_table')
            ->hasCommand(TheBackendWizardCommand::class);
    }
}
