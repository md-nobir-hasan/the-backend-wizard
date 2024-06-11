<?php

namespace Nobir\TheBackendWizard;

use Nobir\TheBackendWizard\Commands\TheBackendWizardCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
